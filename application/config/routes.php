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
|	http://codeigniter.com/user_guide/general/routing.html
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

$route['default_controller'] = 'login';
$route['404_override'] = 'page_not_found';
$route['translate_uri_dashes'] = FALSE;

//route for decode string
$route['decode_string/(:any)'] = 'dashboard/decode_string/$1';

//route for user logout
$route['logout'] = 'login/logout';

$route['forgot_password'] = 'login/forgot_password';
$route['change_password'] = 'login/change_password';

$route['verify_forgot_email'] = 'login/verify_forgot_email';
$route['insert_reset_password'] = 'login/insert_reset_password';

//route for role
$route['roles'] = 'role';
$route['change_role_status'] = 'role/change_role_status';

$route['roleedit/(:any)'] = 'role/edit/$1';
$route['roleremove/(:any)'] = 'role/remove/$1';




//route for modules

$route['web_module'] = 'web_module';
$route['module_add'] = 'web_module';
$route['change_module_status'] = 'web_module/change_module_status';
$route['module_edit/(:any)'] = 'web_module/edit/$1';
$route['moduleremove/(:any)'] = 'web_module/delete/$1';

// $route['user_view/(:any)'] = 'verify_user/view/$1';
//route for permissions
$route['permissions'] = 'web_permission';
$route['addviewpermission'] = 'web_permission/addviewpermission';
$route['addpermission'] = 'web_permission/addpermission';
$route['editpermission'] = 'web_permission/editpermission';
$route['deletepermission'] = 'web_permission/deletepermission';
$route['statuschangepermission'] = 'web_permission/statuspermission';
$route['addallpermission'] = 'web_permission/allpermission';

//new permission routes
$route['get_permissions_by_role'] = 'web_permission/get_permissions_by_role';
$route['set_permissions_by_role'] = 'web_permission/set_permissions_by_role';

$route['permissiondenide'] = 'permission_denide';



//route for user management
/*$route['user_management'] = 'user_management';
$route['get_all_admin_users'] = 'user_management/get_all_admin_users';

$route['change_users_status'] = 'user_management/change_users_status';
$route['newuser'] = 'user_management/add';*/

//for user profile page
$route['user_profile'] = 'user_management/user_profile';
$route['update_user_profile'] = 'user_management/update_user_profile';
$route['verify_old_password'] = 'user_management/verify_old_password';
$route['change_user_password'] = 'user_management/change_user_password';
$route['upload_user_profile'] = 'user_management/upload_user_profile';


$route['get_state'] = 'user_management/get_state';
$route['get_city'] = 'user_management/get_city';
//$route['edit_user/(:any)'] = 'user_management/edit/$1';

//verify mobile
$route['verify_user_mobile'] = 'user_management/verify_user_mobile';
//verify mobile
$route['verify_user_email'] = 'user_management/verify_user_email';
//verify employee id
$route['verify_employee_id'] = 'user_management/verify_employee_id';

//insert user
$route['insert_user'] = 'user_management/insert_user';
//update user
//$route['update_user'] = 'user_management/update_user';

//route for country module
$route['countries'] = 'country';
$route['add_country'] = 'country/add_country';
$route['fetch_all_country'] = 'country/fetch_all_country';
$route['change_country_status'] = 'country/change_country_status';
$route['edit_country/(:any)'] = 'country/edit_country/$1';
$route['update_country'] = 'country/update_country';
$route['delete_country'] = 'country/delete_country';




//routes for Users
$route['users'] = 'user';
$route['fetch_all_users'] = 'user/fetch_all_users';
$route['create_user'] = 'user/create_user';
$route['add_user'] = 'user/add_user';
$route['change_user_status'] = 'user/change_user_status';
$route['delete_user'] = 'user/delete_user';
$route['edit_user/(:any)'] = 'user/edit_user/$1';
$route['update_user'] = 'user/update_user';
$route['upload_user_photo'] = 'user/upload_user_photo';

//routes for admin privacy and policies
$route['admin-privacy-policy'] = 'admin_privacy_policy';
$route['admin_update_privacy_policy'] = 'admin_privacy_policy/update_privacy_policy';
$route['get_admin_privacy_policy'] = 'admin_privacy_policy/get_admin_privacy_policy';

//routes for admin terms & Conditions
$route['admin-terms-conditions'] = 'admin_term_condition';
$route['admin_update_term_condition'] = 'admin_term_condition/update_term_condition';
$route['get_admin_terms_conditions'] = 'admin_term_condition/get_admin_terms_conditions';

//route for send notification using CRON
$route['send_notifications/(:any)'] = 'cron_notification/send_later_notifications/$1';

//routes for category
$route['category'] = 'category';
$route['change_category_status'] = 'category/change_category_status';

$route['categoryedit/(:any)'] = 'category/edit/$1';
$route['categoryremove/(:any)'] = 'category/remove/$1';



//routes for creating new form
$route['create_new_form'] = 'dashboard/create_new_form';

//routes for Design
$route['design/(:any)'] = 'design/index/$1';
$route['save_json_form'] = 'design/save_json_form';
$route['save_form_header'] = 'design/save_form_header';
$route['save_form_footer'] = 'design/save_form_footer';
