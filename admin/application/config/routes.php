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

$route['default_controller'] = "admin";
$route['404_override'] = '';

#ADMIN
$route['admin/login|admin'] = 'admin/index';
$route['admin/logout'] = 'admin/logout';

#ADMIN DASHBORAD

$route['admin/dashboard'] = 'dashboard/';


#User
$route['admin/users'] = 'users/';
$route['admin/users/(:num)'] = "users/index/$1";
$route['admin/users/create'] = "users/create";
$route['admin/users/edit/(:num)'] = "users/admin/edit/$1";
$route['admin/users/delete/(:num)'] = 'users/delete/$1';
$route['admin/users/profile'] = "users/profile";


#SETTINGS
$route['admin/settings'] = 'settings/admin';
$route['admin/settings/(:num)'] = "settings/admin/index/";

#Plans 
$route['admin/plans'] = 'plans/';
$route['admin/plans/(:num)'] = "plans/index/$1";
$route['admin/plans/create'] = "plans/create";
$route['admin/plans/edit/(:num)'] = "plans/edit/$1";
$route['admin/plans/delete/(:num)'] = 'plans/delete/$1';

#Plan Type
$route['admin/plantype'] = 'plantype/';
$route['admin/plantype/(:num)'] = "plantype/index/$1";
$route['admin/plantype/create'] = "plantype/create";
$route['admin/plantype/edit/(:num)'] = "plantype/edit/$1";
$route['admin/plantype/delete/(:num)'] = 'plantype/delete/$1';



#CMS 
$route['admin/cms'] = 'cms/';
$route['admin/cms/(:num)'] = "cms/admin/index/$1";
$route['admin/cms/create'] = "cms/admin/create";
$route['admin/cms/edit/(:num)'] = "cms/admin/edit/$1";
$route['admin/cms/delete/(:num)'] = 'cms/admin/delete/$1';
/* End of file routes.php */
/* Location: ./application/config/routes.php */