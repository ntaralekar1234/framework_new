<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('role_model');
        $this->load->model('web_permission/web_permission_model');
        $this->data['ulactive'] = 'user_management';
        $this->data['active'] = 'role';
    }

	public function index()
	{
        $user_permission = $this->web_permission_model->get_permission_by_idmodule(ROLE_TAB,$this->session->userdata('role_id'));
        if($user_permission['view'] == 1)
        {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('role', 'Role Title', 'trim|required');


        if($this->form_validation->run() !== FALSE)
        {
            $role_title = trim($this->input->post('role'));
            $this->db->trans_start();
            $params = array(
                'role_name' =>$role_title,
                'status'=>'active',
                'added_on'=>date('Y-m-d H:i:s'),
                'added_by'=>$this->session->userdata('uid'),
            );

            $add_permission = $this->web_permission_model->get_permission_by_idmodule(ROLE_TAB,$this->session->userdata('role_id'));
            if($add_permission['add'] == 1)
            {

                $user_role = $this->role_model->add($params);

                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE)
                {
                    $this->db->trans_rollback();
                    $response['success'] = FALSE;
                    $response['message'] = 'Error! while creating new role.';
                    echo json_encode($response);
                    exit;
                }
                else
                {
                    $this->db->trans_commit();
                    $response['success'] = TRUE;
                    $response['message'] = 'New Role has been Created successfully.';
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
            $this->data['roles'] = $this->role_model->get_all_roles();
            $this->layouts->add_css('dt-column-search/vendors/custom/datatables/datatables.bundle.css');
            $this->layouts->add_css('dt-column-search/vendors/global/vendors.bundle.css');
            /*$this->layouts->add_custom_js('dt-column-search/js/demo1/scripts.bundle.js');
            $this->layouts->add_custom_js('dt-column-search/vendors/custom/datatables/datatables.bundle.js');
            $this->layouts->add_custom_js('demo/default/custom/crud/datatables/data-sources/html.js'); */
            $this->layouts->add_custom_js('custom/js/role/add_role.js');
            $this->layouts->set_title(PAGE_TITLE.' | Admin Role');
            $this->layouts->view('view',$this->data,'admin');
        }

        }else{
            redirect('permissiondenide');
        }
    }

    function change_role_status()
    {
        $user_permission = $this->web_permission_model->get_permission_by_idmodule(ROLE_TAB,$this->session->userdata('role_id'));
        if($user_permission['allow_status'] == 1)
        {
            $this->role_model->change_role_status();
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

        $this->role_model->delete($role_id);
        redirect('roles');
    }


}
