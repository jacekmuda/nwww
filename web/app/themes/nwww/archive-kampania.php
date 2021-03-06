<?php
global $app;

get_header(); ?>

    <section class=" section campaign__list  c__w" id="content" role="main">
        <div class="container">
            <div class="row">


                <?php
                if (have_posts()) : ?>
                    <?php get_template_part('categories'); ?>

                    <?php

                    while (have_posts()) : the_post();


                        $speakout = $app->get_speakout_info($post->ID);
                        $suf_link = get_field('json');
                        $su_link = substr($suf_link, 0, -5);
                        $maincampaign = get_field( 'maincampaign');

                        if( get_field('maincampaign') ):
                          $linkc = get_post_permalink($post->ID);
                        else:
                          $linkc = $su_link;
                        endif;

                        $app->render('big-campaign', [
                            'categories' => $app->cats($post->ID),
                            'signed' => $app->calc_perc($speakout),
                            'title' => get_the_title($post->ID),
                            'excerpt' => $app->excerpt_by_id($post->ID),
                            'link' => $linkc,
                            'img' => (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'mid') : $app->get_placeholder(),
                            'classes' => ($app->has_children($post) ? 'has__children' : '')
                        ]);

                    endwhile;

                    the_posts_navigation();


                endif; ?>


            </div>
        </div>

    </section>

<?php

get_footer();
