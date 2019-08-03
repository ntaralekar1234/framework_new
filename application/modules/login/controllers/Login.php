<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
    }
	public function index()
	{

	
		$this->layouts->set_title(PAGE_TITLE.' | Login Page');


		$this->layouts->add_custom_js('custom/js/login/login.js');


		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() !== FALSE)
		{
			//validation passed. Get from the database
			$username=$this->input->post('username');
			$password=$this->input->post('password');

			$this->login_model->check($username,$password);
		}
		else
		{
			$this->layouts->view('login');
		}

	}

	public function logout()
	{
		//update last login
		$update_data = array(
								'last_login'=>date('Y-m-d H:i:s'),
							);
		$this->db->where('id',$this->session->userdata('uid'));
		$this->db->update('admin_users',$update_data);

		$this->session->sess_destroy();
		redirect('login');
	}

	function verify_forgot_email(){
		$f_email = $this->input->post('f_email');
		if($f_email){
			$this->login_model->verify_forgot_email($f_email);
		}else{
			$response['success'] = FALSE;
	        $response['message'] = 'Something went Wrong, try again.';
	        echo json_encode($response);
	        exit;
		}
	}

	function reset_password($v_code){
		if($v_code){
			$response = $this->login_model->reset_password($v_code);
			$this->data['response'] = $response;
			if($response['success']){
				$this->layouts->set_title(PAGE_TITLE.' | Reset Password');
				//add custom js for reset password
				$this->layouts->add_custom_js('custom/js/login/login.js');
				$this->layouts->view('reset_password_view',$this->data);
			}else{
				$this->layouts->set_title(PAGE_TITLE.' | Error');
				$this->layouts->view('reset_password_error_view',$this->data);
			}
		}else{
			redirect('login');
		}
	}

	function insert_reset_password(){
		$post = $this->input->post();
		$count = count($post);
		if($count){
			$this->login_model->insert_reset_password();
		}else{
			$response['success'] = FALSE;
	        $response['message'] = 'Something went Wrong, try again.';
	        echo json_encode($response);
	        exit;
		}
	}

}
?>
