<div class="col-sm-6 col-md-8 col-lg-8 posts__loop">
    <div class="c__w container__inner">

<?php global $app;
if (have_posts()) :
while (have_posts()) : the_post(); ?>
    <article>
        <h1 class="h3"> <a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>


<?php the_content(); ?>
    <div class="row">
        <div class="col-md-8">
            <time class="micro"> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' temu'; ?></time>
            <?php $campaign_id = get_field('campaign_id', $post->ID); ?>
            <?php $app->render('link',[
                    'link' => get_post_permalink($campaign_id),
                    'text' => acf_get_post_title($campaign_id),
                    'classes' => 'micro'
            ]); ?>


        </div>
        <div class="col-md-4 text-right">
            <?php if (!is_single()) : ?>
            <a href="<?php the_permalink();?>" class="micro readmore">Więcej</a>
            <?php endif; ?>
        </div>
    </div>
    </article>
<?php endwhile; ?>
    <div class="row">
    <div class="col-md-12">
        <a class="micro" href="<?php echo get_next_posts_page_link( ); ?>"> więcej wpisów  </a>
    </div>
    </div>
<?php endif; ?>

</div>
</div>
