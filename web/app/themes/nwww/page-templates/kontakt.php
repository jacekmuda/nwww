<?php
/**
 * Template name: Kontakt
 */

get_header();

if (have_posts()) while (have_posts()) : the_post();
    if( have_rows('columns') ):

        ?>
        <footer class="page__footer container c__w" id="footer">
        <div class="page__footer__inner container__inner c__g">
<div class="row">
<?php

        while ( have_rows('columns') ) : the_row(); ?>
            <div class="col-md-6 text-center">

         <h1 class="h3">  <?php the_sub_field('title'); ?> </h1>
           <?php  the_sub_field('content'); ?>

            </div>

            <?php

        endwhile;?></div>
        </div>
        </footer>
        <?php endif;
endwhile;


get_footer();
