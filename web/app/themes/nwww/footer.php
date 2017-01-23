<?php
global $app;


    ?>
    <footer class="page__footer padded container c__w" id="footer">
        <div class="page__footer__inner container__inner c__g">
            <div class="row is-flex items-center ">
                <?php
                if( have_rows('columns', 90) ):
                while ( have_rows('columns', 90) ) : the_row(); ?>
                    <div class="col-md-6 col-sm-6 col-xs-12 text-center">

                        <h1 class="h3">  <?php the_sub_field('title', 90); ?> </h1>
                        <?php  the_sub_field('content', 90); ?>

                    </div>

                    <?php

                endwhile;
                endif;
                ?>


            </div>
        </div>
        <div class="page__footer__social container__inner c__b ">
            <div class="row ">
                <div class="col-md-12 text-center">
            <?php $app->get_social(); ?>

        </div>
                <div class="col-md-12 text-center">
                    <?php wp_nav_menu([
                        'menu' => 'Bottom',
                        'menu_class' => 'footer__menu',
                        'container' => false
                    ]); ?>

                </div>
        </div>
        </div>

    </footer>
<?php

?>
<?php wp_footer(); ?>

</body>
</html>
