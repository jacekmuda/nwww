<?php get_header(); ?>
    <section class="section post__content padded container c__y" id="content" role="main">

        <div class="row">

        <?php get_template_part('post-loop'); ?>


            <div class=" col-sm-6 col-md-4 col-lg-4">

                <?php
                global $app;
                $campaign = get_post(get_field('campaign_id', $post->ID));
                $speakout = $app->get_speakout_info($campaign->ID);
                $app->render('campaign', [
                    'signed' => $app->calc_perc($speakout),
                    'title' => get_the_title($campaign->ID),
                    'excerpt' => $app->excerpt_by_id($campaign->ID),
                    'link' => get_post_permalink($campaign->ID),
                    'img' => get_the_post_thumbnail($campaign->ID, 'mid')
                ]);  ?>

            </div>
        </div>

    </section>


<?php get_footer();
