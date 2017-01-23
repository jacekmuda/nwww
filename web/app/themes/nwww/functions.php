<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'AkcjaDemokracja/Assets.php';
require 'AkcjaDemokracja/App.php';

global $app;
$app = new AkcjaDemokracja\App();