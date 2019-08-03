<?php
class Web_permission_model extends MY_Model
{
	public function get_all_roles()
	{
		if($this->session->userdata('role_id') != SUPER_ADMIN){
	       return $this->db->select("*")
				 ->from('roles')
				 ->where('id_role',$this->session->userdata('role_id'))
				 ->or_where('added_by',$this->session->userdata('role_id'))
				 ->get()->result_array();
	    }else{
	    	return $this->db->select("*")
				 ->from('roles')
				 ->get()->result_array();
	    }

	}

	public function get_permission_by_idmodule($idmodule,$idrole)
    {
        return $this->db->get_where('access',array('id_tab'=>$idmodule,'id_role'=>$idrole))->row_array();
    }

	public function get_permissions_by_role()
	{
		$role_id = $this->input->post('role_id');
		$this->db->select('*');
		$this->db->join('tab', 'tab.id_tab = access.id_tab AND id_role = "'.$role_id.'"', 'right');
		$this->db->order_by('tab.position','ASC');				
		$result =  $this->db->get('access')->result_array();
		echo json_encode($result);
	}

	public function set_permissions_by_role(){

		$role_id = $this->input->post('role_id');
		$id_tab = $this->input->post('id_tab');
		$value = $this->input->post('value');
		$action = $this->input->post('action');

		$set_value = 0;

		if($value == 'true'){
			$set_value = 1;
		}
		
		//check record is exist or not
		$permissions = $this->db->select('*')
							   	->from('access')
							   	->where('id_tab',$id_tab)
							   	->where('id_role',$role_id)
							   	->get()
							   	->num_rows();

        if($permissions){
        	//update permissions data

        	switch ($action) {
        		case 'view':
        			$update_data = array('view'=>$set_value);
        			break;
        		case 'add':
        			$update_data = array('add'=>$set_value);
        			break;
        		case 'edit':
        			$update_data = array('edit'=>$set_value);
        			break;
        		case 'delete':
        			$update_data = array('delete'=>$set_value);
        			break;
        		case 'allow_status':
        			$update_data = array('allow_status'=>$set_value);
        			break;
        		case 'all':
        			$update_data = array('view'=>$set_value,'add'=>$set_value,'edit'=>$set_value,'delete'=>$set_value,'allow_status'=>$set_value);
        			break;
        	}
			
			$where = array('id_tab'=>$id_tab,'id_role'=>$role_id);
			$result = $this->db->update('access',$update_data,$where);

			if($this->db->affected_rows()){

				//check all permissions 
				$count_all_permisssions = $this->db->select('*')
													->from('access')
													->where('id_tab',$id_tab)
													->where('id_role',$role_id)
													->where('view',1)
													->where('add',1)
													->where('edit',1)
													->where('delete',1)
													->where('allow_status',1)
													->get()
													->num_rows();
				$permission_all_response = false;
				//send response for all permissions
				if($count_all_permisssions){
					$permission_all_response = true;
				}

				$response['action'] = $action;
				$response['success'] = true;
				$response['message'] = 'success';
				$response['value'] = $value;
				$response['all_permissions'] = $permission_all_response;
				echo json_encode($response);
			}else{
				$response['action'] = $action;
				$response['success'] = false;
				$response['message'] = 'Server not Responding, Please try again.';
				$response['value'] = $value;
				$response['all_permissions'] = $permission_all_response;
				echo json_encode($response);
				exit;
			}

		}else{
			//add new permissions

			switch ($action) {
        		case 'view':
        			$insert_data = array('id_tab'=>$id_tab,'id_role'=>$role_id,'view'=>$set_value);
        			break;
        		case 'add':
        			$insert_data = array('id_tab'=>$id_tab,'id_role'=>$role_id,'add'=>$set_value);
        			break;
        		case 'edit':
        			$insert_data = array('id_tab'=>$id_tab,'id_role'=>$role_id,'edit'=>$set_value);
        			break;
        		case 'delete':
        			$insert_data = array('id_tab'=>$id_tab,'id_role'=>$role_id,'delete'=>$set_value);
        			break;
        		case 'allow_status':
        			$insert_data = array('id_tab'=>$id_tab,'id_role'=>$role_id,'allow_status'=>$set_value);
        			break;
        		case 'all':
        			$insert_data = array('id_tab'=>$id_tab,'id_role'=>$role_id,'view'=>$set_value,'add'=>$set_value,'edit'=>$set_value,'delete'=>$set_value,'allow_status'=>$set_value);
        			break;
        	}
			
			$res = $this->db->insert('access',$insert_data);

			if($res){

				//check all permissions 
				$all_permisssions = $this->db->select('*')
											->from('access')
											->where('id_tab',$id_tab)
											->where('id_role',$role_id)
											->where('view',1)
											->where('add',1)
											->where('edit',1)
											->where('delete',1)
											->where('allow_status',1)
											->get()
											->num_rows();
				$all_permisssions_response = false;
				//send response for all permissions
				if($all_permisssions){
					$all_permisssions_response = true;
				}

				$response['action'] = $action;
				$response['success'] = true;
				$response['message'] = 'success';
				$response['value'] = $value;
				$response['all_permissions'] = $all_permisssions_response;
				echo json_encode($response);
			}else{
				$response['action'] = $action;
				$response['success'] = false;
				$response['message'] = 'Server not Responding, Please try again.';
				$response['value'] = $value;
				$response['all_permissions'] = $all_permisssions_response;
				echo json_encode($response);
				exit;
			}

		}
		
	}
	
}

?>