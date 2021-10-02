<?php

/*
Plugin Name: WP Eloquent
Plugin URI: https://github.com/doefom/wp-eloquent
Description: This plugin is meant to provide a quick start template for anyone who would like to use the Eloquent query builder (https://github.com/illuminate/database) known from the Laravel framework in a WordPress plugin.
Version: 1.0
Author: doefom
Author URI: https://github.com/doefom
License: MIT License
*/

use WPEloquent\App;

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
require_once plugin_dir_path(__FILE__) . 'App.php';

$app = new App();
$app->initEloquent();

// You may use Eloquent from here

// ----------------------------------------------------------------
// Example: Get all posts from table 'wp_posts'
// ----------------------------------------------------------------
//
// $posts = \WPEloquent\Models\WPPost::all();
