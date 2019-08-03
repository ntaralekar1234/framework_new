<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->data['ulactive'] = '';
    	$this->data['active'] = 'dashboard';
    }
	public function index()
	{
		$this->layouts->set_title(PAGE_TITLE.' | Dashboard');
		$this->layouts->add_custom_js('custom/js/new_form/create_form.js');
		$this->layouts->view('dashboard',$this->data,'admin');
	}

	public function create_new_form()
	{

		$post_data = $this->input->post();

		if(count($post_data))
		{
			$params = array(
				'user_id'=>$this->session->userdata('uid'),
				'form_name '=>$post_data['form_name'],
				'status'=>'active',
				'added_on'=>date('Y-m-d H:i:s'),
				'updated_on'=>date('Y-m-d H:i:s'),
				'updated_by'=>$this->session->userdata('uid')
			);

			$result=$this->dashboard_model->add('users_forms',$params);
			if($result)
			{

				$response['success'] = TRUE;
				$response['form_id'] = $this->uricryption->encode($result);
				$response['message'] = 'Form has been Created successfully.';
				echo json_encode($response);
				exit;
			}
			else
			{
				$response['success'] = FALSE;
				$response['message'] = 'Error! while creating Form.';
				echo json_encode($response);
				exit;
			}
		}
		else
		{
			$response['success'] = FALSE;
			$response['message'] = 'Error! Something Went Wrong.';
			echo json_encode($response);
			exit;
		}
	}

	function decode_string($string){
		$string = $this->uricryption->decode($string);
		/*echo $string.rand(0,99);
		exit;*/
	}
}