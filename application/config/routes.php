<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['default_controller'] = 'welcome';
$route['posts/postslist'] = 'posts/postslist';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';

$route['posts'] = 'posts/index';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/post/(:any)'] = 'categories/post/$1';
$route['comments/create/(:any)'] = 'comments/create/$1';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['(:any)'] = 'pages/view/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
