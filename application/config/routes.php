<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = 'errors';
$route['admin/genres/edit/:num'] = "admin/genres_edit/$1";
$route['mainonline'] = "mainitems";
$route['search'] = "home/search";
$route['alphabet/:any'] = "home/alphabet/$1";
$route['goods/:num'] = "mainitems/index/$2";
$route['order/:num'] = "mainitems/order/$2";
$route['r'] = "home/r";
$route['p'] = "home/p";
$route['warranty'] = "home/warranty";
$route['discounts'] = "home/discounts";
$route['reviews'] = "home/reviews";
$route['main/allgoods'] = "mainitems/items";
$route['main/items/page/:num'] = "mainitems/items/page/$1";
$route['main/items/page'] = "mainitems/items/page";
$route['genres/:any'] = "mainitems/by_genre";
$route['genres/:any/page'] = "mainitems/by_genre/page/";
$route['genres/:any/page/:num'] = "mainitems/by_genre/page/$1";
$route['platform/:any'] = "mainitems/platform";
$route['platform/:any/page'] = "mainitems/platform/page/";
$route['platform/:any/page/:num'] = "mainitems/platform/page/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */