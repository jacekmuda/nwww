<div class=" col-sm-6 col-md-6 col-lg-6">

    <?php
    global $app;
    $campaign = $app->get_promo_campaign();
    $speakout = $app->get_speakout_info($campaign->ID);
    $app->render('campaign', [
        'signed' => $app->calc_perc($speakout),
        'title' => get_the_title($campaign->ID),
        'excerpt' => $app->excerpt_by_id($campaign->ID),
        'link' => get_post_permalink($campaign->ID),
        'img' => get_the_post_thumbnail($campaign->ID, 'large')
    ]);  ?>

</div>