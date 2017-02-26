<?php
$args = [
    'post_type' => 'post',
    'posts_per_page' => 4,
    'post_status' => 'publish'
];

$posts = get_posts($args);

foreach ($posts as $post) {
    setup_postdata($post);
    $app->render('post', [


        'title' => get_the_title($post->ID),
        'content' => get_the_content(),
        'link' => get_post_permalink($post->ID),
        'time' => human_time_diff(get_post_time('U', $post->ID), current_time('timestamp')) . ' temu'

    ]);
    wp_reset_postdata();
}

?>