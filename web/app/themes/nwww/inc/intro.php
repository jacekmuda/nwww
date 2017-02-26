<?php global $app; ?>
<?php $data = $app->intro_data(); ?>
<?php $first = $app->intro_data(true); ?>
<script>

    var intro_content = JSON.parse('<?php echo $data; ?>');
</script>
<section class="intro__section">
    <div class="intro__inner">
        <h1><span class="c__w"><?php echo $first['lead']; ?></span></h1>
        <img src="<?php echo $first['photos']; ?>">
    </div>
</section>