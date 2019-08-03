<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('category_model');
        $this->load->model('web_permission/web_permission_model');
        $this->data['ulactive'] = 'category';
        $this->data['active'] = 'category';
    }

	public function index()
	{
        $user_permission = $this->web_permission_model->get_permission_by_idmodule(CATEGORY_TAB,$this->session->userdata('role_id'));
        if($user_permission['view'] == 1)
        {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category Title', 'trim|required');


        if($this->form_validation->run() !== FALSE)
        {
            $category_title = trim($this->input->post('category'));
            $this->db->trans_start();
            $params = array(
                'category_name' =>$category_title,
                'status'=>'active',
                'created_on'=>date('Y-m-d H:i:s'),
                'created_id'=>$this->session->userdata('uid'),
                'created_by'=>'admin',
            );

            $add_permission = $this->web_permission_model->get_permission_by_idmodule(CATEGORY_TAB,$this->session->userdata('role_id'));
            if($add_permission['add'] == 1)
            {

                $category = $this->category_model->add($params);

                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE)
                {
                    $this->db->trans_rollback();
                    $response['success'] = FALSE;
                    $response['message'] = 'Error! while creating new category.';
                    echo json_encode($response);
                    exit;
                }
                else
                {
                    $this->db->trans_commit();
                    $response['success'] = TRUE;
                    $response['message'] = 'New Category has been Created successfully.';
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
            $this->data['categories'] = $this->category_model->get_all_category();
            $this->layouts->add_css('dt-column-search/vendors/custom/datatables/datatables.bundle.css');
            $this->layouts->add_css('dt-column-search/vendors/global/vendors.bundle.css');
            $this->layouts->add_custom_js('custom/js/category/add_category.js');
            $this->layouts->set_title(PAGE_TITLE.' | Category');
            $this->layouts->view('view',$this->data,'admin');
        }

        }else{
            redirect('permissiondenide');
        }
    }

    function change_category_status()
    {
        $user_permission = $this->web_permission_model->get_permission_by_idmodule(CATEGORY_TAB,$this->session->userdata('role_id'));
        if($user_permission['allow_status'] == 1)
        {
            $this->category_model->change_category_status();
        }
        else
        {
        $response['success'] = FALSE;
        $response['message'] = PERMISSION_DENIDE;
        echo json_encode($response);
        exit;
        }
    }

    // delete role

    function remove($id)
    {
        $role_id = $this->uricryption->decode($id);

        $this->category_model->delete($role_id);
        redirect('category');
    }


}
