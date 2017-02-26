<?php

namespace AkcjaDemokracja;

class App
{
    use Assets;
    private $twig = NULL;

    function __construct()
    {

        global $adm;
        $adm = new Admin();

        add_action('init', [$this, 'register_campaigns'], 0);
        add_action('init', [$this, 'register_menus'], 0);
        add_action('init', [$this, 'unregister_taxonomies'], 0);

        add_action('after_setup_theme', [$this, 'theme_support'], 0);
        add_action('save_post', [$this, 'set_transient'], 0);
        add_filter('the_content_more_link', [$this, 'modify_read_more_link']);
        add_action('wp_enqueue_scripts', [$this, 'do_assets']);
        add_action('pre_get_posts', [$this, 'pre']);


    }

    function do_assets()
    {

        wp_enqueue_script('app', $this->_assetUrl('js/main.js'), [], random_int(111, 222), true);

        if (is_page(get_option('page_on_front'))) {
            wp_enqueue_script('intro', $this->_assetUrl('js/intro.js'), [], random_int(111, 222), true);

        }

        wp_enqueue_style('app', $this->_assetUrl('css/main.css'), [], random_int(111, 222));
        wp_localize_script('app', 'app', ['ajax_url' => admin_url('admin-ajax.php')]);
    }

    function load_twig()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../templates/');

        $this->twig = new \Twig_Environment($loader, array(// 'cache' => __DIR__.'/../cache',
        ));
    }

    function render($template, $params = array())
    {
        if ($this->twig == NULL) {
            $this->load_twig();
        }

        echo $this->twig->render($template . '.twig', array_merge(['app' => $this], $params));
    }

    function register_campaigns()
    {

        include(get_template_directory() . '/functions/register_campaign.php');

    }

    function register_menus()
    {
        register_nav_menus(
            ['top-nav' => 'Top Navigation']
        );
        register_nav_menus(
            ['bottom-nav' => 'Bottom Navigation']
        );
    }

    function theme_support()
    {
        add_theme_support('post-thumbnails', ['post', 'page', 'campaign']);
        add_image_size('mid', 400, 300, true);
        add_image_size('semi', 600, 400, false);
    }

    function unregister_taxonomies()
    {
        unregister_taxonomy_for_object_type('post_tag', 'post');
        // unregister_taxonomy_for_object_type('category', 'post');
    }

    function modify_read_more_link()
    {
        return '';
    }

    function cats($id)
    {
        $arr = get_the_category($id);

        return array_map(function ($c) {

            return [
                'link' => get_category_link($c->term_id),
                'name' => $c->name,
                'slug' => $c->slug,
            ];
        }, $arr);

    }

    function get_social()
    {
        $this->render('social-button', [
            'img' => file_get_contents($this->_imgr('twitter.svg')),
            'link' => 'https://twitter.com/AkcjaDemokracja',
        ]);

        $this->render('social-button', [
            'img' => file_get_contents($this->_imgr('facebook.svg')),
            'link' => 'https://www.facebook.com/AkcjaDemokracja',
        ]);
    }

    function get_promo_campaign()
    {
        $args = [
            'post_status' => 'publish',
            'post_type' => 'campaign',
            'posts_per_page' => 1,
            'meta_key' => 'promo',
            'meta_value' => 1

        ];
        return get_posts($args)[0];
    }

    public function excerpt_by_id($post_id)
    {
        global $post;
        $post = get_post($post_id);
        setup_postdata($post);
        $the_excerpt = get_the_excerpt();
        wp_reset_postdata();
        return $the_excerpt;
    }

    public function set_transient($id)
    {
        $jsonurl = get_field('json', $id);
        if (!$jsonurl) return false;
        $json = file_get_contents($jsonurl);
        set_transient('speakout_' . $id, $json, 60 * 60);

    }

    public function get_speakout_info($id)
    {


        $json = get_transient('speakout_' . $id);

        if (strlen($json) < 10) {


            $this->set_transient($id);
            $json = get_transient('speakout_' . $id);
        }


        $speakout = json_decode($json);


        return $speakout;


    }

    public function calc_perc($speakout)
    {

        if (!$speakout) return false;

        $signed = (int)$speakout->uniquersigns;
        $goal = (int)$speakout->goal;

        return [
            'signed' => $signed,
            'perc' => $signed / $goal * 100
        ];
    }

    public function has_parent($post)
    {
        return $post->post_parent;
    }

    public function has_children($post)
    {

        return count(get_posts(['post_parent' => $post->ID, 'post_type' => $post->post_type]));
    }

    public function get_children($id)
    {
        $args = [
            'post_parent' => $id,
            'post_type' => get_post($id)->post_type,
            'numberposts' => -1,
            'post_status' => 'publish'
        ];
        $children = get_children($args);

        $r = [];

        foreach ($children as $c) {
            $r[] = [
                'name' => get_the_title($c->ID),
                'link' => get_permalink($c->ID),
                'img' => get_the_post_thumbnail($c->ID, 'mid'),
                'ID' => $c->ID
            ];
        }

        return $r;
    }

    public function pre($query)
    {
        if ($query->is_post_type_archive('campaign') && $query->is_main_query()) {
            $query->set('post_parent', 0);
            $query->set('posts_per_page', 26);

        }
        if ($query->is_home() && $query->is_main_query()) {
            $query->set('posts_per_page', 6);
        }
        if (is_category()) {
            $post_type = get_query_var('post_type');
            if ($post_type)
                $post_type = $post_type;
            else
                $post_type = array('nav_menu_item', 'post', 'campaign'); // don't forget nav_menu_item to allow menus to work!
            $query->set('post_type', $post_type);
            return $query;
        }

    }

    public function get_child_if_no_content($post)
    {
        $no_content = $post->post_content < 10;
        $has_child = $this->has_children($post);
        if ($no_content && $has_child) {
            $children = $this->get_children($post->ID);
            return $children[0];
        }

    }


    public function get_signed($id)
    {
        $speakout = $this->get_speakout_info($id);
        return $this->calc_perc($speakout);
    }

    public function get_campaign_fields($id)
    {

        return [
            'signed' => $this->get_signed($id),
            'title' => get_the_title($id),
            'excerpt' => $this->excerpt_by_id($id),
            'link' => get_post_permalink($id),
            'img' => get_the_post_thumbnail($id, 'large'),
            'children' => $this->get_children($id)
        ];
    }

    public function content_by_id($id)
    {
        $content_post = get_post($id);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }

    public function cat_link($id)
    {

        $cat = get_the_category($id);
        if ($cat) {
            $this->render('link', [
                'link' => get_category_link($cat[0]->term_id),
                'text' => $cat[0]->name,
                'classes' => 'micro'
            ]);
        }

    }

    public function intro_data($first = false)
    {
        $id = get_option('page_on_front');

        $photos = get_field('photos', $id);
        $lead = get_field('lead', $id);

        $photos = array_map(function ($c) {
            return [
                'full' => $c['url'],
                'small' => $c['sizes']['medium'],
            ];
        }, $photos);
        if ($first) {
            return [
                'photos' => $photos[0]['full'],
                'lead' => $lead[0]['content']
            ];


        } else {
            return json_encode([
                'photos' => $photos,
                'lead' => $lead
            ]);
        }


    }

    public function get_placeholder()
    {
        return sprintf('<img class="placeholder" src="%s">', $this->_img('placeholders/' . random_int(0, 2) . '.png'));
    }

    public function big_lead()
    {

        global $post;
        return get_field('przerywnik', $post->id);
    }
}


