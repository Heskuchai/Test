<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
$route['card/(:num)'] = 'card/index/$1';
$route['case/(:num)'] = 'cases/index/$1';
$route['user/(:num)'] = 'user/index/$1';
$route['admin/wins/p/(:num)'] = 'admin/wins/index/$1';
$route['admin/wins/p'] = 'admin/wins/index/';
$route['admin/moneyexit/p/(:num)'] = 'admin/moneyexit/index/$1';
$route['admin/moneyexit/p'] = 'admin/moneyexit/index/';
$route['admin/users/p/(:num)'] = 'admin/users/index/$1';
$route['admin/users/p'] = 'admin/users/index/';
