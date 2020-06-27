<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';

$route['about-us'] ='welcome/about_us';
$route['sicksearch'] = 'sickness/search';
$route['remedysearch'] = 'remedies/search';
$route['article-detail/(:any)'] ='article/detail_page/$1';
$route['sickness-articles/(:any)'] ='article/sickness_article_list/$1';
$route['updatetrendingsearch'] = 'sickness/updatetrendingsearch';
$route['condition-list'] = 'sickness/sicknesslist';
$route['condition-list/(:num)'] = 'sickness/sicknesslist';
$route['remedies-list'] = 'remedies/remedylist';
$route['remedies-list/(:num)'] = 'remedies/remedylist';
$route['remedy-articles/(:any)'] ='article/remedy_article_list/$1';
$route['article-list'] = 'article/articlelist';
$route['article-list/(:num)'] = 'article/articlelist';


$route['sickness-testimony/(:any)'] ='testimonial/testimony_for_sickness/$1';
$route['remedy-testimony/(:any)'] ='testimonial/testimony_for_remedy/$1';

$route['sign-up'] ='login/sign_up';
$route['save-data'] ='login/save_sign_up';
$route['profile'] ='login/update_profile';
$route['check_email'] ='login/check_email';
$route['check_username'] ='login/check_username';
$route['update-user'] = 'login/update_user';

$route['login'] ='login/index';
$route['logout'] ='login/logout';
$route['check_login'] ='login/check_login';

$route['rate-article'] = 'article/rateArticle';

$route['testimonial'] = 'testimonial/add_testimony';
$route['save-testimony'] = 'testimonial/save_testimony';
