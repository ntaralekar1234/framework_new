<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_management_model');
		$this->load->model('web_permission/web_permission_model');
		$this->data['ulactive'] = '';
    $this->data['active'] = 'user_management';
    /*echo $this->session->userdata('uid');
    exit;*/
	}


	public function change_users_status()
	{
    $user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
    if($user_permission['allow_status'] == 1)
    {
		  $this->user_management_model->change_users_status();
    }
    else
    {
      $response['success'] = FALSE;
      $response['message'] = PERMISSION_DENIDE;
      echo json_encode($response);
      exit;
    }
	}



  public function verify_user_mobile(){
    $this->user_management_model->verify_user_mobile();
  }

  public function verify_user_email(){
    $this->user_management_model->verify_user_email();
  }

  public function verify_employee_id(){
    $this->user_management_model->verify_employee_id();
  }


  public function update_user(){

    $user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
    if($user_permission['edit'] == 1){

      //add js for sweet alert
      $this->layouts->add_custom_js('demo/default/custom/components/base/sweetalert2.js');
      //add custom js to edit user
      $this->layouts->add_custom_js('custom/js/users/edit_user.js');
      $post = $this->input->post();
      $count = count($post);
      if($count > 0){
        $this->user_management_model->update_user();
      }else{
        $response['success'] = FALSE;
        $response['message'] = 'Something went Wrong, try again.';
        echo json_encode($response);
        exit;
      }
    }else{
      redirect('permissiondenide');
    }

  }

  function get_state()
  {
    $this->user_management_model->get_all_country_states();
  }

  function get_city()
  {
    $this->user_management_model->get_all_state_city();
  }

  //display user profile

  function user_profile(){

    $user_id = $this->session->userdata('uid');

    if($user_id){

      //add custom js to edit user
      $this->layouts->add_custom_js('custom/js/users/profile.js');

      $this->data['user_details']=$this->user_management_model->get_user_profile_data($user_id);
      $this->layouts->view('user_profile',$this->data,'admin');

    }else{
      redirect('dashboard');
    }

  }

  function update_user_profile(){

    $id = $this->input->post('user_id');
    $id = $this->uricryption->decode($id);

    $post = $this->input->post();
    $count = count($post);
    if($count > 0){
      $this->user_management_model->update_user_profile($id);
    }else{
      $response['success'] = FALSE;
      $response['message'] = 'Something went Wrong, try again.';
      echo json_encode($response);
      exit;
    }

  }

  function verify_old_password(){
    $this->user_management_model->verify_old_password();
  }

  function change_user_password(){

    $uid = $this->input->post('uid');
    $uid = $this->uricryption->decode($uid);

    $post = $this->input->post();
    $count = count($post);
    if($count > 0){
      $this->user_management_model->change_user_password($uid);
    }else{
      $response['success'] = FALSE;
      $response['message'] = 'Something went Wrong, try again.';
      echo json_encode($response);
      exit;
    }
  }

  function upload_user_profile(){
    if(isset($_FILES['profile']) && $_FILES['profile']['name'] != ''){
      $this->user_management_model->upload_user_profile();
    }else{
      $response['success'] = FALSE;
      $response['message'] = 'Something went Wrong, try again.';
      echo json_encode($response);
      exit;
    }
  }


}