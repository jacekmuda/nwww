<?php global $app; ?>
<div id="preloader"><?php $app->render('header-logo'); ?></div>
<?php if (have_rows('slides_ad')): ?>
    <section class="hero__section">
      <div class="swiper-container swipe1">
         <div class="swiper-wrapper">
            <?php
                while (have_rows('slides_ad')) : the_row();
                // Check for static slides
                  if (get_row_layout() == 'static'):
                        ?>
                          <!-- Static slide begin -->
                          <div class="swiper-slide static-container" style="background-image:url(<?php the_sub_field('slide_pic') ?>);">

                            <!-- Check if logo layer is enabled -->
                            <?php if( get_sub_field('warstwa_logo') == 'true' ): $app->render('intro-logo'); ?>
                            <?php endif; ?>

                            <!-- Print mobile logo -->
                            <?php $app->render('header-logo'); ?>

                            <!-- Check for lead  -->
                            <?php if( get_sub_field('slide_lead')): ?>

                            <!-- If lead exist check if link  -->
                            <?php if (get_sub_field('slide_link')) : ?><a href="<?php the_sub_field('slide_link'); ?>">
                              <?php endif; ?>

                            <!-- Print lead -->
                            <h1><span class="c__w"><?php the_sub_field('slide_lead')?></span></h1>

                            <!-- Close link -->
                            <?php if (get_sub_field('slide_link')) : ?></a>
                              <?php endif; ?>

                              <!-- Close static slide -->
                            <?php endif; ?>

                          </div>


                          <?php

                          elseif (get_row_layout() == 'video'): ?>

                          <!-- If video slide exist -->
                          <div class="swiper-slide video-container">

                          <!-- Check for logo layer and render -->
                          <?php if( get_sub_field('warstwa_logo') == 'true' ): ?>
                            <?php $app->render('intro-logo'); ?>
                          <?php endif; ?>

                          <!-- Print mobile logo -->
                          <?php $app->render('header-logo'); ?>

                          <!-- Check for lead -->
                          <?php if( get_sub_field('lead')): ?>

                          <!-- Check for link if lead exist -->
                          <?php if (get_sub_field('vslide_url')) : ?><a href="<?php the_sub_field('vslide_url'); ?>">
                            <?php endif; ?>

                          <!-- Print lead.. -->
                          <h1><span class="c__w"><?php the_sub_field('lead')?></span></h1>

                          <!-- Close link  -->
                          <?php if (get_sub_field('vslide_url')) : ?></a>
                            <?php endif; ?>

                          <!-- Close whole if-->
                          <?php endif; ?>

                          <?php if( get_sub_field('slide_lead')): ?>
                          <h1><span class="c__w"><?php the_sub_field('slide_lead')?></span></h1>
                          <?php endif; ?>
                          <video class="slider-video" width="100%" preload="auto" loop="" autoplay="" style="visibility: visible;">

                          <?php if(get_sub_field("mp4_url")): ?>
                          <source type="video/mp4" src="<?php get_sub_field('mp4_url') ?>">
                          <source src="<?php the_sub_field('mp4_url')[0] ?>" type="video/mp4">
                          <?php endif; ?>

                          <?php if(get_sub_field("webm_url")): ?>
                          <source src="<?php the_sub_field('webm_url') ?>" type="video/webm">
                          <?php endif; ?>

                          <?php if(get_sub_field("ogg_url")): ?>
                          <source src="<?php the_sub_field('ogg_url') ?>" type="video/ogg">
                          <?php endif; ?>

                          </video>

                          </div>
                    <?php endif;
                endwhile;

            endif;
                ?>
              </div>
            </div>
            <div class="pointer">
              <?php $app->render('pointer'); ?>
            </div>

    </section>
