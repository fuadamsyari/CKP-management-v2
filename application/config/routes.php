<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Dashboard';
// bulan service
$route['service/bulan/(:any)/tambah/(:any)'] = 'service/tambah/$1/$2';
$route['service/bulan/(:any)/hapus/(:any)'] = 'service/hapus/$1/$2';
$route['service/bulan/(:any)/ubah/(:any)'] = 'service/ubah/$1/$2';
// bulan tinta
$route['tinta/bulan/(:any)/tambah/(:any)'] = 'tinta/tambah/$1/$2';
$route['tinta/bulan/(:any)/hapus/(:any)'] = 'tinta/hapus/$1/$2';
$route['tinta/bulan/(:any)/ubah/(:any)'] = 'tinta/ubah/$1/$2';
// show po
$route['potinta/show/(:any)/tambah/(:any)'] = 'potinta/tambah/$1/$2';
$route['potinta/show/(:any)/hapus/(:any)'] = 'potinta/hapus/$1/$2';
$route['potinta/show/(:any)/ubah/(:any)'] = 'potinta/ubah/$1/$2';
// show belanja
$route['belanja/bulan/(:any)/tambah/(:any)'] = 'belanja/tambah/$1/$2';
$route['belanja/bulan/(:any)/hapus/(:any)'] = 'belanja/hapus/$1/$2';
$route['belanja/bulan/(:any)/ubah/(:any)'] = 'belanja/ubah/$1/$2';
// pengaturan

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
