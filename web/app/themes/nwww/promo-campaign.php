<?php
global $app;
$campaign = $app->get_promo_campaign();

if ( $campaign ) {
  foreach ($campaign as $campost) {
    $speakout = $app->get_speakout_info($campost->ID);
    $app->render('campaign-promo', [
        'signed' => $app->calc_perc($speakout),
        'title' => get_the_title($campost->ID),
        'excerpt' => $app->excerpt_by_id($campost->ID),
        'link' => get_post_permalink($campost->ID),
        'img' => get_the_post_thumbnail($campost->ID, 'large')
    ]);
  }
    wp_reset_postdata();
}

 ?>
