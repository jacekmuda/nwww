<?php


get_header(); ?>

    <section class="padded section container c__w" id="content" role="main">

    <div class="row">

        <?php get_template_part('categories'); ?>

        <div class="col-md-9 campaign__list">
		<?php
		if ( have_posts() ) : ?>
            <div class="row">


			<?php

			while ( have_posts() ) : the_post(); ?>
                <article class="col-md-12 campaign__in__list">

<?php

        global $app;

        $speakout = $app->get_speakout_info($post->ID);
        $app->render('big-campaign', [
            'signed' => $app->calc_perc($speakout),
            'title' => get_the_title($post->ID),
            'excerpt' => $app->excerpt_by_id($post->ID),
            'link' => get_post_permalink($post->ID),
            'img' => get_the_post_thumbnail($post->ID, 'mid'),
          //   'children' => $app->get_children($post)
        ]);

?>

                </article>

			<?php endwhile;

			the_posts_navigation();

		else :



		endif; ?>

		</div>
		</div>
		</div>
	</section><!-- #primary -->

<?php

get_footer();
