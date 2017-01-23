<?php /**
 * Template name: Main
 */ ?>
<?php get_header(); ?>
<?php global $app; ?>
    <div class="section page__content padded container c__y" id="content" role="main">

        <div class="row">
    <div class="col-sm-6 col-md-8 col-lg-8 posts__loop">
        <div class="c__w container__inner">
        <div class="row">
<?php



    $args = [
            'post_type' => 'post',
        'posts_per_page' => 5,
        'post_status'=> 'publish'
    ];

    $posts = get_posts($args);

    foreach ($posts as $post) {
        setup_postdata($post);
        $app->render('post', [


                'title' => get_the_title($post->ID),
                'content' => get_the_content(),
                'link' => get_post_permalink($post->ID),
                'time' => human_time_diff( get_post_time('U', $post->ID), current_time('timestamp') ) . ' temu'

        ]);
        wp_reset_postdata();
    }

?>
          <div class="col-sm-12">
              <?php
              $app->render('link', [
                  'link' =>  get_post_type_archive_link( 'post' ),
                  'text' => 'Wszytskie aktualnosci',
                  'classes' => 'micro',
              ]);
              ?>

          </div>

        </div>
        </div>
        </div>
<?php get_template_part('promo-campaign'); ?>
<?php get_template_part('last-actions'); ?>
        </div>

    </div>

<?php get_template_part('sign'); ?>

<section class="section padded container c__b">
    <div class="row is-flex">
        <div class="col-md-4">
            <?php $img = get_field('img')['sizes']['mid']; ?>
            <img src="<?php echo $img; ?>">
        </div>
        <div class="col-md-8">
            <div class="c__w padded exp">
                <span class="h4">O ruchu</span>
                <h1><?php the_field('title'); ?></h1>

                    <?php the_field('content'); ?>

            </div>
        </div>

    </div>
</section>
    <section class="section padded container c__r">
        <div class="row">
        <div class="col-md-12">
        <div class="c__w padded">
            <?php the_field('tekst'); ?>
            <a href="<?php the_field('link'); ?>" class="btn-primary btn-lg btn"><span><?php the_field('link_txt'); ?></span></a>
         </div>
         </div>
         </div>
    </section>

<?php get_footer(); ?>
