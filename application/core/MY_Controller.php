<?php
class MY_Controller extends CI_Controller{
	/**
	* This is my controller which extends codeigniter controller
	*/
	public $data = array();

	public function __construct()
	{
		parent::__construct();

		//include_once(APPPATH.'config/response.php');
		$this->config->load('my_configurations');

		/* //add css for dashboard


		$this->layouts->add_css('demo/default/plugins/select2/select2.css');

		//add custom js for dashboard

		$this->layouts->add_custom_js('demo/default/js/tooltip.js');

		$this->layouts->add_custom_js('demo/default/plugins/toggle-menu/sidemenu.js');
		$this->layouts->add_custom_js('demo/default/plugins/moment/moment.min.js');
		$this->layouts->add_custom_js('demo/default/plugins/select2/select2.full.js'); */


		//$token = sha1('ellegance.com');
		$this->validate_remember_me();

		$image = $this->db->select('*')
						  ->from('admin_users')
						  ->where('id',$this->session->userdata('uid'))
						  ->get()
						  ->row('profile');

		$image_path = ($image ? $this->config->item('admin_users_image_path').$image : $this->config->item('default_user_profile_image_path'));

		$this->data['admin_profile_path'] = $image_path;
	}



	public function validate_remember_me()
	{
		if(!$this->session->userdata('uid')){
          if(uri_string()!='login' && uri_string()!='login/index' && uri_string()!='' && uri_string()!='Login')
          redirect('login');
        }

	}


}


