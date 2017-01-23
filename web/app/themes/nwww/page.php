<?php

global $app;
get_header(); ?>
<?php
if ( have_posts() ) : ?>


    <?php

    while ( have_posts() ) : the_post(); ?>
    <section class="padded section container c__w" id="content">

        <div class="row">
            <div class="col-md-3 campaign__cats">

                <div class="c__r">

                    <?php

                    $children =  $app->get_children($post->ID);

                    $title = get_the_title($post);



                    if ($app->has_parent($post)) {
                        $parentid = $app->has_parent($post);
                        $children =  $app->get_children($parentid);
                        $title = get_the_title($parentid);
                    }


                    echo sprintf('<header><h1 class="h2 side__title">%s</h1></header>', $title);

                    if ($children) {
                        foreach ($children as $c) {
                            $app->render('link', [
                                'text' => $c['name'],
                                'link' => $c['link'],

                            ]);
                        }
                    }



                      ?>

                </div>
            </div>

            <div class="col-md-9 about__page"  role="main">

                <div class="row">

                        <article class="col-md-12 campaign__in__list">
                            <header>
                                <h1><?php  the_title(); ?></h1>
                            </header>
                            <?php  the_content(); ?>

                        </article>



                </div>
            </div>
        </div>
    </section><!-- #primary -->
                    <?php endwhile;

    the_posts_navigation();

else :



endif; ?>
<?php

get_footer();
