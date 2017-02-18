<?php

global $app;
get_header(); ?>
<?php
if (have_posts()) : $children = $app->get_children($post->ID);
    $child_page = $app->get_child_if_no_content($post);

    $title = get_the_title($post);

    while (have_posts()) : the_post(); ?>
        <section class="padded section container c__w" id="content">

            <div class="row">
                <div class="col-md-9 about__page" role="main">

                    <div class="row">

                        <article class="col-md-12 padded">

                            <?php

                            if ($child_page) :
                                $post = get_post($child_page['ID']);
                                setup_postdata($post);
                            endif; ?>

                            <header>
                                <h1><?php the_title(); ?></h1>
                            </header>

                            <?php the_content(); ?>

                        </article>


                    </div>
                </div>
                <div class="col-md-3 campaign__cats">

                    <div class="c__g">

                        <?php


                        if ($app->has_parent($post)) {
                            $parentid = $app->has_parent($post);
                            $children = $app->get_children($parentid);
                            $title = get_the_title($parentid);
                        }

                        echo sprintf('<header><h1 class="h3 side__title">%s</h1></header>', $title);

                        if ($children) {


                            foreach ($children as $c) {

                                $classes = 'cat__link';
                                if ($child_page['ID'] == $c['ID']) {
                                    $classes .= ' active';
                                }

                                $app->render('link', [
                                    'text' => $c['name'],
                                    'link' => $c['link'],
                                    'classes' => $classes
                                ]);
                            }
                        }


                        ?>

                    </div>
                </div>


            </div>
        </section><!-- #primary -->
    <?php endwhile;
endif; ?>
<?php

get_footer();
