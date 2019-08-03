<?php 
class Login_model extends MY_Model
{
	public function check($username,$password)
	{
		$this->db->select('admin_users.*,role_name');
		$this->db->join('roles','roles.id_role = admin_users.role_id');
		$this->db->where(array('email'=>$username,'admin_users.status'=>'active'));
		$result=$this->db->get('admin_users');
		$res=$result->row_array();
		if($this->uricryption->decode($res['password']) == $password)
		{
			$this->session->set_userdata(array('un'=>$res['name'],'uid'=>$res['id'],'role_id'=>$res['role_id'],'role_name'=>$res['role_name']));
			if($this->input->post('remember'))
			{
				set_cookie('username',$username,time(34000*30));
				set_cookie('password',$password,time(34000*30));
			}
			//update last login
			$update_data = array(
									'last_login'=>date('Y-m-d H:i:s'),
								);
			$this->db->where('id',$this->session->userdata('uid'));
			$this->db->update('admin_users',$update_data);

			redirect('dashboard');
		}
		else
		{
			$this->session->set_flashdata('login_failure','Invalid Username or Password.');
			redirect('login');
		}
	}

	function verify_forgot_email($f_email)
  	{
	    $res = $this->db->select('id,name,email,status')
	              		->from('admin_users')
	              		->where('email',$f_email)
	              		->get()
	              		->row_array();
	    if(isset($res['id'])){
	    	$user_name = $res['name'];
	    	$user_id = $res['id'];
	    	$user_email = $res['email'];
	    	$user_status = $res['status'];

	    	if($user_status == 'active'){
	    		//update verification code and send email reset link to user
	    		$num = rand(1,99);
	    		$v_code = $this->uricryption->encode($num);

	    		$update_data = array(
	    							'v_code' => $v_code,
	    							'v_code_timestamp' => date('Y-m-d H:i:s'),
	    							'is_reset' => 'no',
	    							);

	    		$this->db->where('id',$user_id);
	    		$this->db->update('admin_users',$update_data);

	    		if($this->db->affected_rows()){

	    			$Subject = "Reset Your Password Here.";

		    		$body = 'Dear '.$user_name.', <br>
							We have received your request to reset your password. <br>
							Please <a href="'.base_url('login/reset_password/'.$v_code).'"> Click Here</a> to reset your password.<br>
							<b><i>Note:</i></b> <strong>This Link will be Expired in 24 Hours.</strong><br>
							Kindly ignore this mail if you have already reset your password.<br>
							Thanks & Regards,<br>
							Team DealsCommerce.';

		     		$result = $this->email_lib->SendMail($Subject,$body,$user_email);

			        if($result) {
			            $response['success'] = TRUE;
		              	$response['message'] = 'Please check your mailbox to reset your password.';
		              	echo json_encode($response);
		              	exit;
		          	}else{
		              	$response['success'] = FALSE;
		              	$response['message'] = 'Error! While Sending Mail to reset your password.';
		              	echo json_encode($response);
		              	exit;
		          	}

	    		}else{
	    			$response['success'] = FALSE;
	              	$response['message'] = 'Something went Wrong, try again.';
	              	echo json_encode($response);
	              	exit;
	    		}

	    	}else{
	    		$response['success'] = FALSE;
		        $response['message'] = 'Permission Denied or Unauthorized User.';
		        echo json_encode($response);
		        exit;
	    	}
	    }else{
	    	$response['success'] = FALSE;
	        $response['message'] = 'Email ID is not Registered with us.';
	        echo json_encode($response);
	        exit;
	    }
	}

	function reset_password($v_code){
		$res = $this->db->select('id,name,email,v_code,v_code_timestamp,is_reset,status')
	              		->from('admin_users')
	              		->where('v_code',$v_code)
	              		->get()
	              		->row_array();
	    if(isset($res['id'])){
	    	//check already reset password 
	    	if($res['is_reset'] == 'yes'){
	    		// already reset
				$response['success'] = FALSE;
	        	$response['message'] = 'You have already reset your Password with this link. Kindly generate again.';	
	        	return $response;
	    	}

	    	$user_name = $res['name'];
	    	$user_id = $res['id'];
	    	$user_email = $res['email'];
	    	$user_status = $res['status'];
	    	$v_code_timestamp = $res['v_code_timestamp'];

	    	if($user_status == 'active'){

	    		$time = date('Y-m-d H:i:s', strtotime($v_code_timestamp)+60*60*24);
				$expiry_date = new DateTime($time);
				$current_date = new DateTime("now");

				if($current_date < $expiry_date){
					$response['success'] = TRUE;
					$response['user_name'] = $user_name;
					$response['user_id'] = $user_id;
					$response['user_email'] = $user_email;
		        	$response['message'] = 'Valid Verification Code.';	
		        	return $response;
				}else{
					// link has been expired
					$response['success'] = FALSE;
		        	$response['message'] = 'Reset Password Link has been Expired, Kindly generate Again.';	
		        	return $response;
				}
	    	}else{
	    		$response['success'] = FALSE;
	        	$response['message'] = 'Unauthorized user or Permission Denied.';	
	        	return $response;
	    	}
	    }else{
	    	$response['success'] = FALSE;
	        $response['message'] = 'Unauthorized user or Invalid Verification Code.';	
	        return $response;
	    }
	}


	function insert_reset_password(){
		$encode_id = $this->input->post('id');
		$id = $this->uricryption->decode($encode_id);
		$n_password = $this->input->post('n_password');
		$c_password = $this->input->post('c_password');

		if($n_password != $c_password){
			$response['success'] = FALSE;
	        $response['message'] = 'New Password and Confirm Password Does not Match.';
	        echo json_encode($response);
	        exit;
		}

		$res = $this->db->select('id,name,email,status')
	              		->from('admin_users')
	              		->where('id',$id)
	              		->get()
	              		->row_array();
	    if(isset($res['id'])){
	    	$user_name = $res['name'];
	    	$user_id = $res['id'];
	    	$user_email = $res['email'];
	    	$user_status = $res['status'];

	    	if($user_status == 'active'){
	    		//update new password and send password email to user
	    		$new_password = $this->uricryption->encode($n_password);
	    		$update_data = array(
	    							'password' => $new_password,
	    							'password_reset_on' => date('Y-m-d H:i:s'),
	    							'is_reset' => 'yes',
	    							);

	    		$this->db->where('id',$user_id);
	    		$this->db->update('admin_users',$update_data);

	    		if($this->db->affected_rows()){

	    			$Subject = "Password Reset Successfully.";

		    		$body = 'Dear '.$user_name.', <br>
							Your password has been reset successfully.<br>
							Please <a href="'.base_url().'"> Click Here</a> to login into your account with newly updated password.<br>
							Thanks & Regards,<br>
							Team DealsCommerce.';

		     		$result = $this->email_lib->SendMail($Subject,$body,$user_email);

			        if($result) {
			            $response['success'] = TRUE;
		              	$response['message'] = 'Password has been reset Successfully.';
		              	echo json_encode($response);
		              	exit;
		          	}else{
		              	$response['success'] = TRUE;
		              	$response['message'] = 'Password has been reset Successfully but Failed while sending Email.';
		              	echo json_encode($response);
		              	exit;
		          	}
	    		}else{
	    			$response['success'] = FALSE;
	              	$response['message'] = 'Error while updating New Password.';
	              	echo json_encode($response);
	              	exit;
	    		}
	    	}else{
	    		$response['success'] = FALSE;
		        $response['message'] = 'Permission Denied or Unauthorized User.';
		        echo json_encode($response);
		        exit;
	    	}
	    }else{
	    	$response['success'] = FALSE;
	        $response['message'] = 'Permission Denied or Invalid User.';
	        echo json_encode($response);
	        exit;
	    }
	}

}
?>