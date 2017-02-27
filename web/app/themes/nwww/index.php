<?php get_header(); ?>
<?php global $app; ?>
    <section class="section section__posts">
        <div class="container">
            <div class="row">


                <?php
                if (have_posts()) : ?>

                    <header class="page-header col-xs-12 text-center">
                        <h1 class="h2 page-title">Aktualności</h1>
                    </header>

                    <?php

                    while (have_posts()) : the_post();


                        $app->render('post', [
                            'categories' => $app->cats($post->ID),
                            'img' => (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'mid') : $app->get_placeholder(),
                            'title' => get_the_title($post->ID),
                            'content' => get_the_content(),
                            'link' => get_post_permalink($post->ID),
                            'time' => human_time_diff(get_post_time('U', $post->ID), current_time('timestamp')) . ' temu'

                        ]);

                    endwhile;


                    ?>

                    <div class="col-xs-12 text-left">

                        <?php $app->numeric_posts_nav(); ?>
                    </div>
                    <?php

                endif;
                ?>

            </div>
        </div>
    </section>

<?php get_footer();