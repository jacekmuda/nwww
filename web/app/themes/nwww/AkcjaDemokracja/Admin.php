<?php
namespace AkcjaDemokracja;
class Admin
{
    use Assets;


    function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'load_styles']);

    }

    function load_styles()
    {
        wp_register_style('admin_css', $this->_assetUrl('css/admin.css'), false, false);
        wp_enqueue_style('admin_css');
    }
}