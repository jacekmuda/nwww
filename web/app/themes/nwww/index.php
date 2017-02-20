<?php get_header(); ?>
<?php global $app; ?>
    <section class="section page__content  container" id="content" role="main">

        <div class="row no-gutter">

            <?php get_template_part('post-loop'); ?>
            <div class=" col-sm-12 col-md-12 col-lg-4">
                <div class="padded c__w small-center">
                    <span class="t__r micro">Promowana kampania</span>
                </div>
                <?php get_template_part('promo-campaign'); ?>
                <?php get_template_part('last-actions'); ?>
            </div>
        </div>
    </section>
<?php get_footer();