<?php /**
 * Template name: Main
 */ ?>
<?php get_header(); ?>
<?php global $app; ?>

<?php get_template_part('inc/intro'); ?>
<div class="section page__content container " id="content" role="main">

    <div class="row">
        <div class="col-sm-12 col-md-8">

            <?php get_template_part('promo-campaign'); ?>
        </div>
        <div class="col-sm-12 col-md-4">
            <?php get_template_part('last-actions'); ?>


        </div>
    </div>


</div>
<div class="separator"></div>


<section class="section container ">
    <div class="row no-gutter is-flex items-center">
        <div class="col-md-6 about__img exp">
            <div class="padded c__r ">
                <?php $img = get_field('img')['sizes']['large']; ?>
                <img src="<?php echo $img; ?>">
            </div>
        </div>
        <div class="col-md-6 exp">
            <div class="c__w padded ">
                <div class="c__w padded ">

                    <h1><?php the_field('title'); ?></h1>
                    <div class="lead">
                        <?php the_field('content'); ?>
                    </div>
                    <div class=" text-right">
                        <?php
                        $app->render('link', [
                            'link' => '',
                            'text' => 'Więcej',
                            'classes' => 'micro small-center ellipsis',
                        ]);
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-gutter ">
        <div class="col-md-4 col-md-offset-1 ">
            <?php get_template_part('sign'); ?>
        </div>
        <div class="col-md-7 ">

            <div class="c__g padded">
                <div class="c__w padded">
                    <?php the_field('tekst'); ?>

                    <div class="row is-flex items-center">

                        <div class="col-xs-12 col-md-6">

                            <?php
                            $app->render('link', [
                                'link' => '',
                                'text' => 'Regulamin darowizn',
                                'classes' => 'micro small-center ',
                            ]);
                            ?>


                        </div>
                        <div class="text-right col-md-6 col-xs-12">
                            <a href="<?php the_field('link'); ?>" class="btn-primary c__y t__r btn-lg btn">
                                <span><?php the_field('link_txt'); ?></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div>
</section>


<?php get_footer(); ?>
