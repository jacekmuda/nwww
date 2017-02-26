<?php
global $app;


?>
<?php get_template_part('sign'); ?>
<footer class="page__footer  c__w" id="footer">
    <div class="page__footer__inner  container">
        <div class="row is-flex padded items-center ">
            <div class="col-md-2  footer_col footer__logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php $app->_eImg('logo-footer.png'); ?>">
                </a>
            </div>
            <?php
            if (have_rows('columns', 90)):
                while (have_rows('columns', 90)) : the_row(); ?>
                    <div class="col-md-3 footer_col col-sm-4 col-xs-12 text-left">

                        <h1 class="h3">  <?php the_sub_field('title', 90); ?> </h1>
                        <?php the_sub_field('content', 90); ?>

                    </div>

                    <?php

                endwhile;
            endif;
            ?>
            <div class="col-md-4 footer_col footer_social text-right">
                <?php $app->get_social(); ?>

            </div>

        </div>
    </div>
    <div class="footer__menu t__w padded ">
        <div class="container">
            <div class="row is-flex items-center">
                <div class="col-md-9">
                    <?php wp_nav_menu([
                        'menu' => 'Bottom',
                        'menu_class' => 'footer__menu main__menu',
                        'container' => false
                    ]); ?>
                </div>
                <div class="col-md-3 text-right">
                    [szukajka]
                </div>
            </div>
        </div>
    </div>
</footer>
<?php

?>
<?php wp_footer(); ?>

</body>
</html>
