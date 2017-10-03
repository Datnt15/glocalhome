<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route["vi/book/(:num)"] = "book/index/$1";
$route["en/book/(:num)"] = "book/index/$1";
$route["book/(:num)"] = "book/index/$1";
$route['translate_uri_dashes'] = TRUE;
$route['(\w{2})/(.*)'] = '$2';
$route['(\w{2})'] = $route['default_controller'];
