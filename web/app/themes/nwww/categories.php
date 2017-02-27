<div class="col-md-12 campaign__cats h4">


    <header>
        <h1>Kampanie</h1>
    </header>
    <?php

    global $app;


    $categories = get_categories(array(
        'orderby' => 'name',
        'order' => 'ASC',
        'posts_per_page' => -1
    ));

    $active = get_query_var('cat');


    foreach ($categories as $category) {

        $classes = 'cat__link';
        if ($active) {
            $c = get_category($active);
            if ($category->term_id == $c->cat_ID) {
                $classes .= ' active';
            }
        }


        $app->render('link', [
            'link' => get_category_link($category->term_id),
            'text' => $category->name . ' (' . $category->count . ')',
            'classes' => $classes
        ]);
    }
    $app->render('link', [
        'link' => get_post_type_archive_link('campaign'),
        'text' => 'Wszystkie',
        'classes' => 'cat__link show__all'
    ]);


    ?>


</div>