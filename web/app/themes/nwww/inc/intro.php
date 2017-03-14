<?php global $app; ?>
<?php $data = $app->intro_data(); ?>
<?php $first = $app->intro_data(true); ?>
<script>
    var intro_content = JSON.parse('<?php echo $data; ?>');
</script>

<section class="intro__section">
    <div class="intro__inner">
        <?php $app->render('intro-logo'); ?>
        <h1><span class="c__w"><?php echo $first['lead']; ?></span></h1>
        <img src="<?php echo $first['photos']; ?>" class="animated intro__img fade-in">
        <div class="pointer">
            <?php $app->render('pointer'); ?>
        </div>


    </div>
</section>