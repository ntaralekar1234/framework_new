<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('design_model');
		$this->data['ulactive'] = '';
    	$this->data['active'] = 'design';
    }
	public function index($form_id)
	{


		$where_params = array(
			'id'=>$this->uricryption->decode($form_id)
		);

		$form_details=$this->design_model->select_where_row('users_forms',$where_params);

		if(!empty($form_details))
		{
			$this->layouts->set_title(PAGE_TITLE.' | Design');
			$this->layouts->add_custom_js('demo/default/js/jquery-ui.min.js');
			//$this->layouts->add_custom_js('demo/default/js/forms.js');
			//$this->layouts->add_custom_js('demo/default/js/create-survey.js');
			$this->layouts->add_custom_js('custom/js/new_form/form_builder.js');
			$this->layouts->add_css('demo/default/base/form_builder.css');
			$this->data['form_id'] = $form_id;
			$this->data['form_name'] = $form_details['form_name'];



			//$this->layouts->add_css('demo/default/base/form_builder.min.css');

			$this->layouts->view('design',$this->data,'admin');
		}
		else
		{
			redirect('dashboard');
		}
	}

	public function save_json_form()
	{

		$post_data = $this->input->post();

		if(count($post_data))
		{
			$params = array(

				'json_form'=>json_encode($post_data['jsonData']),
				'user_id'=>$this->session->userdata('uid'),
				'updated_on'=>date('Y-m-d H:i:s'),
				'updated_by'=>$this->session->userdata('uid')
			);
			$where_params = array(
				'id'=>$this->uricryption->decode($post_data['form_id'])
			);

			$result=$this->design_model->update('users_forms',$params,$where_params);
			if($result)
			{

				$response['success'] = TRUE;
				$response['message'] = 'Form has been Saved successfully.';
				echo json_encode($response);
				exit;
			}
			else
			{
				$response['success'] = FALSE;
				$response['message'] = 'Error! while saving Form.';
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

	public function save_form_header()
	{

		$post_data = $this->input->post();

		if(count($post_data))
		{
			$params = array(

				'form_header'=>$post_data['form_header'],
				'user_id'=>$this->session->userdata('uid'),
				'updated_on'=>date('Y-m-d H:i:s'),
				'updated_by'=>$this->session->userdata('uid')
			);
			$where_params = array(
				'id'=>$this->uricryption->decode($post_data['form_id'])
			);

			$result=$this->design_model->update('users_forms',$params,$where_params);
			if($result)
			{

				$response['success'] = TRUE;
				$response['message'] = 'Form header has been saved successfully.';
				echo json_encode($response);
				exit;
			}
			else
			{
				$response['success'] = FALSE;
				$response['message'] = 'Error! while saving form header.';
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

	public function save_form_footer()
	{

		$post_data = $this->input->post();

		if(count($post_data))
		{
			$params = array(

				'form_footer'=>$post_data['form_footer'],
				'user_id'=>$this->session->userdata('uid'),
				'updated_on'=>date('Y-m-d H:i:s'),
				'updated_by'=>$this->session->userdata('uid')
			);
			$where_params = array(
				'id'=>$this->uricryption->decode($post_data['form_id'])
			);

			$result=$this->design_model->update('users_forms',$params,$where_params);
			if($result)
			{

				$response['success'] = TRUE;
				$response['message'] = 'Form footer has been saved successfully.';
				echo json_encode($response);
				exit;
			}
			else
			{
				$response['success'] = FALSE;
				$response['message'] = 'Error! while saving form footer.';
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

}
