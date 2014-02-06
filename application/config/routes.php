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
$route['admin/regcodes'] = 'admin/regcodes';
$route['admin/regcodes/(:any)'] = 'admin/regcodes/$1';
$route['admin/controlPanel'] = 'admin/controlPanel';
$route['search/properties'] = 'search/properties';
$route['contact/form'] = 'pages/contactform';
$route['message/delete'] = 'message/delete';
$route['message/read'] = 'message/read';
$route['message/inbox'] = 'message/inbox';
$route['message/send'] = 'message/send';
$route['message/compose'] = 'message/compose';
$route['property/update_lease_term/(:any)'] = 'property/update_lease_term/$1';
$route['property/update_unit/(:any)'] = 'property/update_unit/$1';
$route['property/add_unit'] = 'property/add_unit';
$route['property/manage'] = 'property/manage';
$route['locator/viewUnit/(:any)'] = 'locator/viewUnit/$1';
$route['locator/searchProperties'] = 'locator/searchProperties';
$route['locator/viewProperty/(:any)'] = 'locator/viewProperty/$1';
$route['locator/browseProperties'] = 'locator/browseProperties';
$route['users/edit'] = 'users/edit';
$route['pages/register'] = 'pages/register';
$route['users/register_locator'] = 'users/register_locator';
$route['users/register_property'] = 'users/register_property';
$route['users/login'] = 'users/login';
$route['users/logout'] = 'users/logout';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = "pages/view";


/* End of file routes.php */
/* Location: ./application/config/routes.php */