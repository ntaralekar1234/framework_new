<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['default_user_profile_image_path'] = base_url().'assets/images/user.png';
// for admin user profile
$config['admin_users_image_upload_path'] = './uploads/img/admin_users';
$config['admin_users_allowed_types'] = 'jpg|jpeg|png';
$config['admin_users_image_path'] = base_url().'uploads/img/admin_users/';

// Country Icons
$config['country_icon_upload_path'] = './uploads/img/flags/';
$config['country_icon_allowed_types'] = 'jpg|jpeg|png';
$config['country_icon_image_path'] = base_url().'uploads/img/flags/';
