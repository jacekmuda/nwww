<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'AkcjaDemokracja/Assets.php';
require 'AkcjaDemokracja/Admin.php';
require 'AkcjaDemokracja/LocalFields.php';
require 'AkcjaDemokracja/App.php';

global $app;
$app = new AkcjaDemokracja\App();

function my_flush_rewrite_rules()
{

    flush_rewrite_rules();

}

add_action('after_switch_theme', 'my_flush_rewrite_rules');
