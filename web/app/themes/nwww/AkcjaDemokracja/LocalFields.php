<?php
namespace AkcjaDemokracja;

class LocalFields
{
    function __construct()
    {

    }

    public function register()
    {
        if (function_exists('acf_add_options_page')) {

            acf_add_options_page(array(
                'page_title' => 'Intro',
                'menu_title' => 'Intro',
                'position' => 2,
                'icon_url' => 'dashicons-images-alt2',
                'menu_slug' => 'nwww_intro',
                'post_id' => 'nwww_intro',
                'capability' => 'edit_posts',
                'redirect' => false
            ));


        }
    }
}