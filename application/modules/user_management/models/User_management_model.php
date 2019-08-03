<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management_model extends MY_Model {

	public function __construct(){
		parent::__construct();

	}



    function change_users_status()
    {
      $id_user = $this->input->post('id_user');
      $status = $this->input->post('status');

      $id_user = $this->uricryption->decode($id_user);
      $status = $this->uricryption->decode($status);

      $update_data = array(
                          'status' => $status,
                          );

      $this->db->where('id',$id_user);
      $this->db->update('admin_users',$update_data);

      if($this->db->affected_rows()){
        $response['success'] = TRUE;
        $response['message'] = 'Status has been Changed Successfully.';
        echo json_encode($response);
      }else{
        $response['success'] = FALSE;
        $response['message'] = 'Error While Changing Status.';
        echo json_encode($response);
        exit;
      }
    }

    function get_roles()
    {
    	return $this->db->get_where('roles',array('status'=>'active'))->result_array();
    }




    function get_user_details($user_id)
    {
    	return $this->db->get_where('admin_users',array('id'=>$user_id))->row_array();
    }

    function update($user_id,$update_data)
    {

    	$this->db->where('id',$user_id);
      	$this->db->update('admin_users',$update_data);
      	if($this->db->affected_rows()){
        	echo true;

	    }else{
	        echo false;

	    }
    }

    function get_all_countries(){

		$this->db->select('*');
		$this->db->from('country');

		return $this->db->get()->result_array();
    }




    function get_all_country_states(){

    	$country_id = $this->input->post('country_id');

    	$this->db->select('*');
		$this->db->from('states');
		$this->db->where('country_id',$country_id);

		$states = $this->db->get()->result_array();

		echo json_encode($states);

    }

    function get_all_state_city(){

    	$state_id = $this->input->post('state_id');

    	$this->db->select('*');
    	$this->db->from('cities');
    	$this->db->where('state_id',$state_id);

    	$cities = $this->db->get()->result_array();

		echo json_encode($cities);

    }

    function verify_user_mobile(){
		//check mobile number is exists or not
		$contact = $this->input->post('contact');
		$user = $this->db->select('*')
						  ->from('admin_users')
						  ->where('contact',$contact)
						  ->get()
						  ->result_array();
		$count = count($user);
		if($count){
			echo json_encode('exists');
		}else{
			echo json_encode('not exists');
		}

	}

	function verify_user_email(){
		//check email id is exists or not
		$email = $this->input->post('email');
		$user = $this->db->select('*')
						  ->from('admin_users')
						  ->where('email',$email)
						  ->get()
						  ->result_array();
		$count = count($user);
		if($count){
			echo json_encode('exists');
		}else{
			echo json_encode('not exists');
		}

	}



	function get_countrywise_states($country_id){

        $this->db->select('*');
		$this->db->from('states');
		$this->db->where('country_id',$country_id);
		if($this->session->userdata('role_id') != SUPER_ADMIN)
      	{
         	$this->db->where('states.state_id',$this->session->userdata('ustate_id'));
      	}
		$this->db->where('status','active');
		return $this->db->get()->result_array();

    }

    function get_statewise_cities($state_id){
      $this->db->select('*');
    	$this->db->from('cities');
    	$this->db->where('state_id',$state_id);
    	if($this->session->userdata('role_id') != SUPER_ADMIN)
      	{
         	$this->db->where('cities.city_id',$this->session->userdata('ucity_id'));
      	}
    	$this->db->where('status','active');
    	return $this->db->get()->result_array();

    }




	//get profile data
	function get_user_profile_data($user_id){
		return $this->db->select('admin_users.*,roles.role_name,country.country_name,states.state_name,cities.city_name')
						->from('admin_users')
						->join('roles','admin_users.role_id = roles.id_role','left')
						->join('country','admin_users.country_id = country.country_id','left')
						->join('states','admin_users.state_id = states.state_id','left')
						->join('cities','admin_users.city_id = cities.city_id','left')
						->where('admin_users.id',$user_id)
						->get()
						->row_array();

    }

    //update user profile
    function update_user_profile($id){

    	$update_data = array(
                          'name' => $this->input->post('name'),
                          /*'email' => $this->input->post('email'),
                          'contact' => $this->input->post('contact'),*/
                          'updated_on' => date('Y-m-d H:i:s'),
                        );

	    /*echo json_encode($update_data);
	    exit;*/
	    $this->db->where('id',$id);
	    $result = $this->db->update('admin_users',$update_data);

	    if($result){
	      $response['success'] = TRUE;
	      $response['message'] = 'Profile Updated Successfully.';
	      echo json_encode($response);
	    }else{
	      $response['success'] = FALSE;
	      $response['message'] = 'Error while Updating Profile.';
	      echo json_encode($response);
	      exit;
	    }

    }

    //verify user password
    function verify_old_password(){
		//check old password match or not
    	$id = $this->input->post('user_id');
    	$id = $this->uricryption->decode($id);
		  $password = $this->input->post('old_password');

  		$user = $this->db->select('*')
  						 ->from('admin_users')
  						 ->where('id',$id)
  						 ->get()
  						 ->row_array();
  		if($this->uricryption->decode($user['password']) == $password){
  			echo json_encode(true);
  		}else{
  			echo json_encode(false);
  		}

	}


	//change user password
  function change_user_password($uid){
    //change user password
	$old_password = $this->input->post('old_password');

	//decode user email
	$user_email = $this->input->post('email');
    $user_email = $this->uricryption->decode($user_email);

    //decode user name
	$user_name = $this->input->post('name');
    $user_name = $this->uricryption->decode($user_name);

	$user = $this->db->select('*')
					 ->from('admin_users')
					 ->where('id',$uid)
					 ->get()
					 ->row_array();

	if($this->uricryption->decode($user['password']) == $old_password){
		//password match
		$new_password = $this->input->post('new_password');

		$update_data = array(
				            'password' =>$this->uricryption->encode($new_password),
				            'updated_on'=>date('Y-m-d H:i:s'),
				        	);

  	$this->db->where('id',$uid);
  	$result = $this->db->update('admin_users',$update_data);
  	if ($result){

  		//send password on mail
			$subject = "Password Changed.";

			$message = 'Dear '.$user_name.',<br> Your Password has been Changed Successfully. Here are the new Credentials for Login:<br><br>
								Name: <b>'.$user_name.'</b><br>
					          	Username: <b>'.$user_email.'</b><br>
					          	Password: <b>'.$new_password.'</b><br>
					     		Thank you,<br> Team Bluenxt.';

			$result = $this->email_lib->SendMail($subject,$message,$user_email);

			if($result) {
				$this->db->trans_commit();
	      		$response['success'] = TRUE;
		    	$response['message'] = 'Password Updated Successfully, New Credentials Send on your Email ID.';
		    	echo json_encode($response);
			}else{
				$this->db->trans_commit();
	      		$response['success'] = FALSE;
		    	$response['message'] = 'Password Updated Successfully, Error While Sending Credentials.';
		    	echo json_encode($response);
			  	exit;
			}
  	}else{
 		$response['success'] = FALSE;
      	$response['message'] = 'Error While Updating Password.';
      	echo json_encode($response);
  	}

	}else{
	  	$response['success'] = FALSE;
      	$response['message'] = 'Old Password Does Not Match,try again.';
      	echo json_encode($response);
      	exit;
	}
  }


	function upload_user_profile(){

    	//decode value first
    	$id = $this->input->post('id');
    	$profile = $this->input->post('img');

    	$id = $this->uricryption->decode($id);
    	$profile = $this->uricryption->decode($profile);

	    if(isset($_FILES['profile']) && $_FILES['profile']['name'] != ''){
	        $config['upload_path']    = $this->config->item('admin_users_image_upload_path');
		    $config['allowed_types']  = $this->config->item('admin_users_allowed_types');
		    $config['overwrite']    = FALSE;
		    $this->load->library('image_lib');
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config);

		    if (!$this->upload->do_upload('profile'))
		    {
		      $response['success'] = FALSE;
		      $response['message'] = $this->upload->display_errors();
		      echo json_encode($response);
		      exit;
		    }else{
		    	//unlink old image if available
		    	@unlink($this->config->item('admin_users_image_upload_path').'/'.$profile);
		      	$data = $this->upload->data();
		      	$profile = $this->upload->file_name;
		    }
	    }

        $this->db->trans_start();
        $update_params = array(
					            'profile'=>$profile,
					            'updated_on'=>date('Y-m-d H:i:s'),
					        	);

        $this->db->where('id',$id);
        $user_update = $this->db->update('admin_users',$update_params);

        if ($user_update){
            $response['success'] = TRUE;
		    $response['message'] = 'Profile Picture Uploaded Successfully';
		    echo json_encode($response);
        }else{
       		$response['success'] = FALSE;
		    $response['message'] = 'Error While Uploading Profile Picture';
		    echo json_encode($response);
        }

	}




}