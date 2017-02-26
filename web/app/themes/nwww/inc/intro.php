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
        <div class="pointer">
            <svg version="1.1" class="arrow" xmlns="http://www.w3.org/2000/svg"
                 x="0px" y="0px"
                 width="100px" height="50px" viewBox="0 0 100 50" enable-background="new 0 0 100 50"
                 xml:space="preserve">
<polygon fill="#FFFFFF" points="0,0 50,50 100,0 "/>
</svg>
        </div>


    </div>
</section>