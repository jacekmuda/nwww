<?php get_header(); ?>
<?php
global $app;


if (have_posts()) while (have_posts()) : the_post(); ?>
    <section class="campaign__header section  " id="content" role="main">

        <div class="container ">
            <div class="row ">

                <div class=" col-sm-8 col-md-6 col-lg-6 ">


                    <?php

                    echo get_the_post_thumbnail($post->ID, 'large');

                    $speakout = $app->get_speakout_info($post->ID);

                    ?>


                </div>
                <div class="col-sm-4 col-md-6 col-lg-6 ">
                    <article class="c__w  exp">

                        <?php $app->cat_link($post->ID); ?>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                        <?php
                        if ($speakout) :
                            $app->render('campaign-signed', [
                                'signed' => $app->calc_perc($speakout),

                            ]);
                        endif;
                        ?>

                        <div class="lead"><br> <?php the_excerpt(); ?></div>
                        <?php if( get_field('call_to_ad_action') ): ?>
                          <a href="<?php the_field('call_to_ad_action'); ?>" class="btn-md call-to-action btn btn-primary c__r t__w"><?php the_field('call_to_ad_action_text'); ?></a>
                        <?php endif; ?>

                        <div class="smallpointer">
                          <?php $app->render('smallpointer'); ?>
                        </div>
                    </article>
                </div>

            </div>
        </div>


    </section>
    <?php $app->insert_interlude(); ?>
    <section class="section campaign__desc">
        <div class="container">
            <div class="row is-flex">
                <div class="col-sm-12 col-md-8 col-lg-8 campaingn__longtext text-justify">
                    <?php the_content(); ?>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 ">
                  <?php
                    if (have_rows('actions')):
                        echo '    <div class=" ">';
                        while (have_rows('actions')) : the_row();

                            if (get_row_layout() == 'campaign'):
                                $campaign_id = get_sub_field('id_camp');


                                $speakout = $app->get_speakout_info($campaign_id);
                                $app->render('campaign-bar', [
                                    'signed' => $app->calc_perc($speakout),
                                    'title' => get_the_title($campaign_id),
                                    'excerpt' => false,
                                    'link' => get_post_permalink($campaign_id)
                                ]);

                                //  $app->render('campaign', ['signed' => $app->get_signed($campaign_id)]);
                                //  echo sprintf('<h1 class="padded side__title c__w h3"><a href="%s">%s</a></h1>', get_post_permalink($campaign_id), get_the_title($campaign_id));

                            endif;
                        endwhile;
                        echo '</div>';
                    endif;

                    ?>
                </div>
            </div>

    </section>
    <?php

    if (have_rows('actions')):
        $app->render('big-lead', [
            'classes' => 'c__y',
            'text' => sprintf('%s: nasze działania', get_the_title($post))
        ]);
        ?>
        <section class="children__campaigns  section  c__w">
            <div class=" campaign__list container">
                <div class="row">


                    <?php


                    while (have_rows('actions')) : the_row();

                        if (get_row_layout() == 'campaign'):

                            ?>
                            <article class="col-md-4 ">
                                <?php

                                $campaign_id = get_sub_field('id_camp');

                                $speakout = $app->get_speakout_info($campaign_id);
                                $app->render('campaign', [
                                    'signed' => $app->calc_perc($speakout),
                                    'title' => get_the_title($campaign_id),
                                    'excerpt' => false,
                                    'link' => get_post_permalink($campaign_id),
                                    'img' => get_the_post_thumbnail($campaign_id, array(400, 300))
                                ]);
                                ?>
                            </article>
                            <?php

                        elseif (get_row_layout() == 'post'):

                            $post_id = get_sub_field('id_post');

                            $app->render('post', [
                                'width' => 4,
                                'title' => get_the_title($post_id),
                                //  'content' => get_the_excerpt($post_id),
                                'content' => false,
                                'img' => (has_post_thumbnail($post_id)) ? get_the_post_thumbnail($post_id, 'mid') : $app->get_placeholder(),
                                'link' => get_post_permalink($post_id),
                                'time' => human_time_diff(get_post_time('U', $id), current_time('timestamp')) . ' temu'
                            ]);


                        elseif (get_row_layout() == 'custom'):

                            $app->render('post', [
                                'width' => 4,
                                'title' => get_sub_field('title'),

                                'content' => get_sub_field('content'),
                                'img' => sprintf('<img src="%s">', get_sub_field('img')['sizes']['mid'])
                            ]);


                        endif;


                    endwhile;


                    ?>


                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; ?>

<?php get_footer();
