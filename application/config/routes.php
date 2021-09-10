<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Halaman Utama
$route['dashboard-musisi'] = 'dashboard/dashboardMusisi';
$route['dashboard-musisi/editSubmission/(:any)'] = 'dashboard/editSubmission/$1';
$route['dashboard-musisi/tambahCover/(:any)'] = 'dashboard/tambahCover/$1';
$route['dashboard-musisi/hapusSubmission/(:any)'] = 'dashboard/hapusSubmission/$1';
$route['dashboard-admin/rejectSubmission/(:any)'] ='dashboard/rejectSubmission/$1';
$route['dashboard-admin/approveSubmission/(:any)'] ='dashboard/approveSubmission/$1';
$route['dashboard-musisi/submission'] = 'dashboard/submission';
$route['dashboard-musisi/bandProfile/(:any)'] = 'dashboard/bandProfile/$1';
$route['dashboard-admin'] = 'dashboard/dashboardAdmin';
$route['dashboard-admin/approval'] = 'dashboard/approval';
$route['dashboard-admin/upload'] = 'dashboard/upload';
$route['login'] = 'auth/login';
$route['submission'] = 'music';
$route['auth/autentikasi'] = 'auth/autentikasi';
$route['about'] = 'about';
//Halaman Artist
$route['artist'] = 'artist';
//Halaman Release
$route['release'] = 'release';
$route['default_controller'] = 'web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


