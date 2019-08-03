<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Web_permission extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('web_permission_model');
		$this->data['ulactive'] = 'user_management';
    	$this->data['active'] = 'permissions';
    }
	
	public function index()
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(PERMISSION_TAB,$this->session->userdata('role_id'));
        if($user_permission['view'] == 1)
        {
			$this->data['selected_role'] = 0;
			$this->layouts->add_custom_js('demo/default/custom/crud/forms/widgets/bootstrap-select.js');
			$this->layouts->add_custom_js('custom/js/permissions/permissions.js');
			$this->data['roles']=$this->web_permission_model->get_all_roles();
			$this->layouts->set_title(PAGE_TITLE.' | Permissions');
	        $this->layouts->view('view',$this->data,'admin');
	    }
	    else
	    {
	    	redirect('permissiondenide');
	    }    
	}


	public function get_permissions_by_role(){
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(PERMISSION_TAB,$this->session->userdata('role_id'));
        if($user_permission['view'] == 1)
        {
			$this->web_permission_model->get_permissions_by_role();
	    }else{
	    	redirect('permissiondenide');
	    }
  	}

  	public function set_permissions_by_role(){
  		$user_permission = $this->web_permission_model->get_permission_by_idmodule(PERMISSION_TAB,$this->session->userdata('role_id'));
        if($user_permission['add'] == 1)
        {
			$this->web_permission_model->set_permissions_by_role();
	    }else{
	    	$response['success'] = FALSE;
		    $response['message'] = PERMISSION_DENIDE;
		    echo json_encode($response);
		    exit;
	    }
  	}

}
