<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Halaman Utama
$route['news/(:any)'] = 'news/view/$1';
$route['about'] = 'about';
$route['login'] = 'auth';
$route['logout'] = 'auth/logout';
//Halaman Artist
$route['artist'] = 'artist';
//Halaman Release
$route['release'] = 'release';
//Halaman News
$route['news'] = 'news';
$route['default_controller'] = 'web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
