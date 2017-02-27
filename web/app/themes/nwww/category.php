<?php


get_header(); ?>

    <section class=" section  section__cat" id="content" role="main">

        <div class="container">
            <div class="row">


                <?php get_template_part('categories'); ?>

                <?php
                if (have_posts()) : ?>


                    <?php

                    while (have_posts()) : the_post(); ?>


                        <?php

                        global $app;

                        $speakout = $app->get_speakout_info($post->ID);
                        $app->render('big-campaign', [
                            'categories' => $app->cats($post->ID),
                            'signed' => $app->calc_perc($speakout),
                            'title' => get_the_title($post->ID),
                            'excerpt' => $app->excerpt_by_id($post->ID),
                            'link' => get_post_permalink($post->ID),
                            'img' => (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'mid') : $app->get_placeholder(),
                            //   'children' => $app->get_children($post)
                        ]);

                        ?>


                    <?php endwhile;

                    the_posts_navigation();


                endif; ?>


            </div>
        </div>
    </section><!-- #primary -->

<?php

get_footer();
