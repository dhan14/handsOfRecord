<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Halaman Utama
$route['dashboard'] = 'dashboard';
$route['login'] = 'auth';
//Halaman Artist
$route['artist'] = 'artist';
//Halaman Release
$route['release'] = 'release';
//Halaman News
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
