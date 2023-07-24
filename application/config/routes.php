<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Frontend_Controller';
$route['Register'] = 'Frontend_Controller/register';

$route['admin'] = 'Admin_Controller';
$route['dashboard'] = 'Admin_Controller/dashboard';
$route['logout'] = 'Admin_Controller/logout';
$route['admin-user'] = 'Admin_Controller/admin_user';

//resident----->
$route['dashboard/add-resident'] = 'Admin_Controller/add_resident';
$route['dashboard/view-resident'] = 'Admin_Controller/view_resident';
$route['dashboard/delete-resident/(:any)'] = 'Admin_Controller/delete_resident/$1';
$route['dashboard/update-resident/(:any)'] = 'Admin_Controller/update_resident/$1';

//officials----->
$route['dashboard/add-officials'] = 'Admin_Controller/add_officials';
$route['dashboard/view-officials'] = 'Admin_Controller/view_officials';
$route['dashboard/delete-officials/(:any)'] = 'Admin_Controller/delete_officials/$1';
$route['dashboard/update-officials/(:any)'] = 'Admin_Controller/update_officials/$1';

//blotter----->
$route['dashboard/add-blotter'] = 'Admin_Controller/add_blotter';
$route['dashboard/view-blotter'] = 'Admin_Controller/view_blotter';
$route['dashboard/edit-blotter/(:any)'] = 'Admin_Controller/update_blotter/$1';
$route['dashboard/delete-blotter/(:any)'] = 'Admin_Controller/delete_blotter/$1';

$route['Admin_Controller/action'] = 'Admin_Controller/action';


 /* AJAX  */
$route['dashboard/ajax-update-resident-form']['post'] = 'Admin_Controller/ajax_update_resident_form';
$route['dashboard/ajax-update-official-form']['post'] = 'Admin_Controller/ajax_update_official_form';
$route['dashboard/ajax-update-blotter-form']['post'] = 'Admin_Controller/ajax_update_blotter_form';

 $route['dashboard/ajax-view-resident-form']['post'] = 'Admin_Controller/ajax_view_resident_form';

 $route['admin_controller/fetch_resident_info/(:any)'] = 'admin_controller/fetch_resident_info/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;