<?php get_header(); ?>
<?php global $app; ?>
    <section class="section page__content padded container c__y" id="content" role="main">

        <div class="row">

            <?php get_template_part('post-loop'); ?>
            <?php get_template_part('promo-campaign'); ?>
            <?php get_template_part('last-actions'); ?>
        </div>
    </section>
<?php get_footer();