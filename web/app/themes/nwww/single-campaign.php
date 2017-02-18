<?php get_header(); ?>
<?php global $app;
if (have_posts()) while (have_posts()) : the_post(); ?>
    <section class="padded section container " id="content" role="main">

        <div class="row  is-flex">
            <div class="col-sm-6 col-md-6 col-lg-6 ">
                <article class="c__w  exp">


                    <?php $app->cat_link($post->ID); ?>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <div class="lead">  <?php the_excerpt(); ?></div>
                    <a class="btn c__g t__w scroll__link" href="#dzialania">Nasze działania</a>

                </article>

            </div>
            <div class=" col-sm-6 col-md-6 col-lg-6 ">


                <?php
                global $app;

                $speakout = $app->get_speakout_info($post->ID);

                $app->render('campaign', [
                    'signed' => $app->calc_perc($speakout),
                    'link' => false,
                    'img' => get_the_post_thumbnail($post->ID, 'large')
                ]); ?>


            </div>


        </div>
        <div class="separator"></div>
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
                            $campaign_id = get_sub_field('id');

                            $speakout = $app->get_speakout_info($campaign_id);
                            $app->render('campaign', [
                                'signed' => $app->calc_perc($speakout),
                                'title' => get_the_title($campaign_id),
                                'excerpt' => false,
                                'link' => false,
                                'img' => get_the_post_thumbnail($campaign_id, 'semi')
                            ]);
                            echo '<br>';

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
    if (have_rows('actions')): ?>
        <section class="children__campaigns padded section container c__w">
            <div class=" campaign__list c__w">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="side__title padded" id="dzialania">Nasze działania</h1>
                    </div>
                    <div class="col-md-12">
                        <div class="row">

                            <?php


                            while (have_rows('actions')) : the_row();

                                if (get_row_layout() == 'campaign'):

                                    ?>
                                    <article class="col-md-4 ">
                                        <?php

                                        $campaign_id = get_sub_field('id');


                                        $speakout = $app->get_speakout_info($campaign_id);
                                        $app->render('campaign', [
                                            'signed' => $app->calc_perc($speakout),
                                            'title' => get_the_title($campaign_id),
                                            'excerpt' => false,
                                            'link' => get_post_permalink($campaign_id),
                                            'img' => get_the_post_thumbnail($campaign_id, 'medium')
                                        ]);
                                        ?>
                                    </article>
                                    <?php

                                elseif (get_row_layout() == 'post'):

                                    $post_id = get_sub_field('id');

                                    $app->render('post', [
                                        'width' => 4,
                                        'title' => get_the_title($post_id),
                                        'content' => get_the_excerpt($id),
                                        'classes' => 'padded',
                                        'link' => get_post_permalink($post_id),
                                        'time' => human_time_diff(get_post_time('U', $id), current_time('timestamp')) . ' temu'
                                    ]);


                                elseif (get_row_layout() == 'custom'):

                                    $app->render('post', [
                                        'width' => 4,
                                        'title' => get_sub_field('title'),
                                        'classes' => 'padded',
                                        'content' => get_sub_field('content'),
                                        'img' => get_sub_field('img')['sizes']['mid']
                                    ]);


                                endif;


                            endwhile;


                            ?>


                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; ?>

<?php get_footer();