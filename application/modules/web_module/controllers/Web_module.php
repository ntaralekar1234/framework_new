<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web_module extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('modules_model');
		$this->load->model('web_permission/web_permission_model');
		$this->data['ulactive'] = 'user_management';
    	$this->data['active'] = 'modules';
    }
	public function index()
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(MODULE_TAB,$this->session->userdata('role_id'));
        if($user_permission['view'] == 1)
        {

		$this->load->library('form_validation');
        $this->form_validation->set_rules('module', 'Module Title', 'trim|required');


        if($this->form_validation->run() !== FALSE)
        {
            $module_title = trim($this->input->post('module'));
            $this->db->trans_start();
            $params = array(
                'tab_name' =>$module_title,
                'status'=>$this->input->post('status'),
              );

           	$add_permission = $this->web_permission_model->get_permission_by_idmodule(MODULE_TAB,$this->session->userdata('role_id'));
            if($add_permission['add'] == 1)
            {
				$this->modules_model->add('tab',$params);

				$this->db->trans_complete();
                if ($this->db->trans_status() === FALSE)
                {
                    $this->db->trans_rollback();
                    $response['success'] = FALSE;
                    $response['message'] = 'Error! while creating new module.';
                    echo json_encode($response);
                    exit;
                }
                else
                {
                    $this->db->trans_commit();
                    $response['success'] = TRUE;
                    $response['message'] = 'New Module has been Created successfully.';
                    echo json_encode($response);
                    exit;
                }
			}
			else
            {
                $response['success'] = FALSE;
                $response['message'] = PERMISSION_DENIDE;
                echo json_encode($response);
                exit;
            }

        }
        else
        {
            $this->data['modules'] = $this->modules_model->get_all_modules();

            /*echo "<pre>";
            print_r($this->data['modules']);
            exit;*/

            $this->layouts->add_css('dt-column-search/vendors/custom/datatables/datatables.bundle.css');
			$this->layouts->add_css('dt-column-search/vendors/global/vendors.bundle.css');
			$this->layouts->add_custom_js('custom/js/module/add_module.js');
            $this->layouts->set_title(PAGE_TITLE.' | Modules');
            $this->layouts->view('view',$this->data,'admin');
        }

		}else{
            redirect('permissiondenide');
        }

	}

	function change_module_status()
    {
        $user_permission = $this->web_permission_model->get_permission_by_idmodule(MODULE_TAB,$this->session->userdata('role_id'));
        if($user_permission['allow_status'] == 1)
        {
            $this->modules_model->change_module_status();
        }
        else
        {
			$response['success'] = FALSE;
			$response['message'] = PERMISSION_DENIDE;
			echo json_encode($response);
			exit;
        }
    }


	// public function delete($delete)
	// {
	// 	$this->load->model('modulesmdl');
	// 	$this->load->helper('url');
	// 	$d=base64_decode($delete);
	// 	$id=array('id'=>$d);
	// 	$reslult=$this->modulesmdl->delete('module',$id);

	// 	if($reslult)
	// 	{
	// 		//$this->session->set_flashdata(array('msg'=>'Record is deleted successfully...'));
	// 		redirect('web_modules');
	// 	}
	// 	else
	// 	{
	// 		$this->session->set_flashdata(array('msg'=>'can not delete a record'));
	// 		redirect('web_modules');
	// 	}
	// }

	// public function update($a)
	// {
	// 	$this->load->model('modulesmdl');
	// 	$this->load->view('shear/header/header');
	// 	$this->load->view('shear/navbar/navbar');
	// 	$this->load->view('dashboard_nav');

	// 	$d=base64_decode($a);
	// 	$id=array('id'=>$d);
	// 	$data['result']=$this->modulesmdl->select_where('module',$id);
	// 	$this->load->view('edit_modules',$data);

	// 	$this->load->view('shear/footer/footer');
	// }

}
