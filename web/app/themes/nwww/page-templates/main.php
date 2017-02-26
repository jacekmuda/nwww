<?php /**
 * Template name: Main
 */ ?>
<?php get_header(); ?>
<?php global $app; ?>
<?php $big_lead = $app->big_lead(); ?>

<?php get_template_part('inc/intro'); ?>
<div class="section page__content container " id="content" role="main">

    <div class="row flex_row">
        <div class="col-sm-12 col-md-8">

            <?php get_template_part('promo-campaign'); ?>
        </div>
        <div class="col-sm-12 col-md-4">
            <?php get_template_part('last-actions'); ?>


        </div>
    </div>

</div>


<?php
if ($big_lead) :

    $app->render('big-lead', [
        'classes' => 'c__b t__w',
        'text' => $big_lead[0]['content']
    ]);

endif; ?>



<?php get_footer(); ?>
