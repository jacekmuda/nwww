<?php get_header(); ?>
<?php global $app; ?>
<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <section class="section post__content  " id="content" role="main">

            <div class="container">
                <div class="row">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class=" col-sm-12 col-lg-6">
                            <?php echo get_the_post_thumbnail($post->ID, 'semi'); ?>

                        </div>
                    <?php endif; ?>
                    <div class=" col-sm-12 col-md-6 ">

                        <?php $app->render('categories', ['categories' => $app->cats($post->ID)]); ?>

                        <h1 class="h1 text-left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                        <div class="text-justify">
                            <?php the_excerpt(); ?>
                            <time class="h4 t__g"> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' temu'; ?></time>

                        </div>
                    </div>

                </div>

            </div>

        </section>
        <section class="section section__">
            <div class="container">
                <div class="row">
                    <div class=" col-sm-12 col-lg-8">

                        <div class="text-justify">
                            <?php the_content(); ?>

                        </div>
                    </div>
                    <div class=" col-sm-12 col-lg-4">
                        <?php

                        $campaign = get_post(get_field('campaign_id', $post->ID));
                        $speakout = $app->get_speakout_info($campaign->ID);

                        $app->render('campaign', [
                            'signed' => $app->calc_perc($speakout),
                            'title' => get_the_title($campaign->ID),
                            'excerpt' => false,
                            'link' => get_post_permalink($campaign->ID),
                            'img' => get_the_post_thumbnail($campaign->ID, 'mid')
                        ]); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<section>


</section>
<?php get_footer(); ?>
