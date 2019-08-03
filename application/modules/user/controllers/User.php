<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('web_permission/web_permission_model');
		$this->data['ulactive'] = 'user_management';
    	$this->data['active'] = 'user';
    }
	public function index()
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
	    if($user_permission['view'] == 1)
	    {
			$this->layouts->set_title(PAGE_TITLE.' | Users');

			/* $this->layouts->add_custom_js('vendors/custom/datatables/datatables.bundle.js');
			$this->layouts->add_custom_js('demo/default/custom/crud/datatables/search-options/user-table.js');
			$this->layouts->add_custom_js('demo/default/custom/crud/forms/widgets/bootstrap-select.js');
			$this->layouts->add_custom_js('demo/default/custom/crud/datatables/search-options/dataTables.checkboxes.min.js');
			$this->layouts->add_custom_js('vendors/base/jquery.multi-select.js');
			$this->layouts->add_custom_js('vendors/base/jquery.quicksearch.js');
			//add css for datatable
			$this->layouts->add_css('vendors/custom/datatables/datatables.bundle.css');
			$this->layouts->add_css('demo/default/base/multi-select.css');	 */

			$this->layouts->add_css('dt-column-search/vendors/custom/datatables/datatables.bundle.css');
            $this->layouts->add_css('dt-column-search/vendors/global/vendors.bundle.css');
			$this->layouts->add_custom_js('demo/default/plugins/bootstrap-datepicker/bootstrap-datepicker.js');
            $this->layouts->add_custom_js('dt-column-search/js/demo1/scripts.bundle.js');
            $this->layouts->add_custom_js('dt-column-search/vendors/custom/datatables/datatables.bundle.js');
            $this->layouts->add_custom_js('dt-column-search/js/demo1/pages/crud/datatables/search-options/column-search.js');

			$this->layouts->add_custom_js('custom/js/user/users.js');

			$this->data['countries'] = $this->user_model->select('country');
			$this->data['roles'] = $this->user_model->select('roles');
			/*echo "<pre>";
			print_r($this->data);
			exit;*/

		    $this->layouts->view('users',$this->data,'admin');
	    }
		else
		{
			redirect('permissiondenide');
		}

	}

	public function fetch_all_users()
	{
       $fetch_data = $this->user_model->fetch_data();

       /*echo "<pre>";
       print_r($fetch_data);
	   exit;*/

      $data = array();

	  foreach ($fetch_data as $row)
	  {
        $profile = $this->config->item('admin_users_image_path').$row->profile;

		$sub_array = array();
		$sub_array['CBox'] ='';
		$sub_array['Country'] = $row->country_name;
		$sub_array['Name'] = $row->name;
		$sub_array['Profile'] = '<img alt="" src='.$profile.' width="40px" height="40px" class="rounded-circle">';
		$sub_array['Contact'] = $row->contact;
		$sub_array['Email'] = $row->email;
        $sub_array['Role'] = $row->role_name;
        $sub_array['Last Login'] = $row->last_login;
		$sub_array['Status'] = $row->status;
		$sub_array['Added By'] = $row->added_by_name;
		$sub_array['Actions'] = ('<a href="javascript:void(0)" class="btn m-btn  m-btn--icon m-btn--icon-only  m-btn--pill'.($row->status=='active' ? ' bg-success disabled' :'').' change_status" title="Active" data-status="'.$this->uricryption->encode('active').'" data-id="'.$this->uricryption->encode($row->id).'"><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="btn m-btn  m-btn--icon m-btn--icon-only m-btn--pill'.($row->status=='inactive' ? ' bg-info  disabled' :'').' change_status" title="Inactive" data-status="'.$this->uricryption->encode('inactive').'" data-id="'.$this->uricryption->encode($row->id).'"><i class="fa fa-ban"></i></a> <a href="'.base_url('edit_user/'.$this->uricryption->encode($row->id)).'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit"><i class="fa fa-edit"></i></a><a href="javascript:void(0)" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete_user" title="Delete" data-id="'.$this->uricryption->encode($row->id).'"><i class="fa fa-trash"></i></a>');

		$data[] = $sub_array;

	 }
		$draw = (isset($_POST["draw"]) ? $_POST["draw"] : 0);
		$output = array(
			"draw" => intval($draw),
			"recordsTotal"      =>     $this->user_model->get_all_data(),
			"recordsFiltered"   =>     $this->user_model->get_filtered_data(),
			"data" => $data
		);
		echo json_encode($output);
	}

	public function create_user()
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
	    if($user_permission['add'] == 1)
	    {
	    	$this->layouts->set_title(PAGE_TITLE.' | Create New User');

			$this->layouts->add_custom_js('custom/js/user/add_user.js');


	        $this->data['countries'] = $this->user_model->select('country');
			$this->data['roles'] = $this->user_model->select('roles');

			$this->layouts->view('add_user',$this->data,'admin');

		}
		else
		{
			redirect('permissiondenide');
		}
	}



	public function add_user()
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
	    if($user_permission['add'] == 1)
	    {
	        $post_data = $this->input->post();
			if($_FILES['image']['name'])
			{
				$image = $this->user_model->upload();
			}
			else
			{
				$response['success'] = FALSE;
	        	$response['message'] = 'Error! Upload Profile Image.';
	        	echo json_encode($response);
	        	exit;
			}

	        $params = array(
	        	'name'=>$post_data['name'],
	        	'contact'=>$post_data['contact'],
	        	'email'=>$post_data['email'],
	        	'role_id'=>$post_data['role_id'],
	        	'profile'=>$image,
	        	'password'=>$this->uricryption->encode($post_data['password']),
				'country_id'=>$post_data['country_id'],
				'state_id'=>$post_data['state_id'],
				'city_id'=>$post_data['city_id'],
	        	'status'=>$post_data['status'],
	        	'added_by'=>$this->session->userdata('uid'),
				'added_on'=>date('Y-m-d H:i:s')
	        );

			$result=$this->user_model->add('admin_users',$params);
			if($result)
			{

				$response['success'] = TRUE;
	        	$response['message'] = 'User has been added successfully.';
	        	echo json_encode($response);
	        	exit;
			}
			else
			{
				$response['success'] = FALSE;
	        	$response['message'] = 'Error! while adding User.';
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

	public function change_user_status()
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
	    if($user_permission['allow_status'] == 1)
	    {
	    	$id = $this->uricryption->decode($this->input->post('id'));
			$status = $this->uricryption->decode($this->input->post('status'));

			$this->db->trans_start();

			$where_data = array(
			 	'id'=>$id
			);

			$update_data = array(
            	'updated_on'=>date('Y-m-d H:i:s'),
            	'updated_by'=>$this->session->userdata('uid'),
            	'status'=>$status
        	);

        	$this->user_model->update('admin_users',$where_data,$update_data);
        	$this->db->trans_complete();
	        if ($this->db->trans_status() === FALSE)
	        {
	            $this->db->trans_rollback();
	            $response['success'] = FALSE;
			    $response['message'] = 'Error! while changing Status.';
			    echo json_encode($response);
			    exit;
	        }else
	        {
	        	$response['success'] = TRUE;
			    $response['message'] = 'Status has been changed successfully.';
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
	public function edit_user($id)
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
	    if($user_permission['edit'] == 1)
	    {
	    	$this->layouts->set_title(PAGE_TITLE.' | Edit User');

			$id = $this->uricryption->decode($id);

			$where_data = array('id'=>$id);

			$this->layouts->add_custom_js('custom/js/user/edit_user.js');


	        $this->data['countries'] = $this->user_model->select('country');
			$this->data['roles'] = $this->user_model->select('roles');

			$this->data['user_details'] = $this->user_model->get_details('admin_users',$where_data);
			$this->data['states'] = $this->user_model->get_countrywise_states($this->data['user_details']['country_id']);
        	$this->data['cities'] = $this->user_model->get_statewise_cities($this->data['user_details']['state_id']);
			$this->data['id'] = $this->uricryption->encode($id);

			/*echo "<pre>";
			print_r($this->data['details']);
			exit;*/

			if (isset($this->data['user_details']['id'])) {
				$this->layouts->view('edit_user',$this->data,'admin');
			}else{
				redirect('users');
			}
		}
		else
		{
			redirect('permissiondenide');
		}
	}
	public function update_user()
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
	    if($user_permission['edit'] == 1)
	    {
	    	$post_data = $this->input->post();

			$id = $this->uricryption->decode($post_data['id']);

			$where_data = array('id'=>$id);

			$details = $this->user_model->get_details('admin_users',$where_data);
			$image = '';
			if(isset($details['id']))
			{
				if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
					$image = $this->user_model->upload();
				}

				$update_data = array(
					'name'=>$post_data['name'],
		        	'contact'=>$post_data['contact'],
		        	'email'=>$post_data['email'],
		        	'role_id'=>$post_data['role_id'],
					'country_id'=>$post_data['country_id'],
					'state_id'=>$post_data['state_id'],
					'city_id'=>$post_data['city_id'],
					'profile'=>($image ? $image :$details['profile']),
		        	'status'=>$post_data['status'],
					'updated_by'=>$this->session->userdata('uid'),
					'updated_on'=>date('Y-m-d H:i:s')
				);

				$this->user_model->update('admin_users',$where_data,$update_data);
	        	$this->db->trans_complete();
		        if ($this->db->trans_status() === FALSE)
		        {
		            $this->db->trans_rollback();
		            $response['success'] = FALSE;
				    $response['message'] = 'Error while updating User details.';
				    echo json_encode($response);
				    exit;
		        }else
		        {
		        	$response['success'] = TRUE;
				    $response['message'] = 'User details has been updated successfully.';
				    echo json_encode($response);
				    exit;
		        }
			}
			else
			{
				$response['success'] = FALSE;
        		$response['message'] = 'Something went wrong.';
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

	function upload_user_photo()
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
	    if($user_permission['edit'] == 1)
	    {
	    	$post_data = $this->input->post();

			$id = $this->uricryption->decode($post_data['id']);

			$where_data = array('id'=>$id);

			$details = $this->user_model->get_details('admin_users',$where_data);

			if(isset($details['id']))
			{
				$image = '';

				if($_FILES['image']['name'] != '')
				{
					$image = $this->user_model->upload();

					$update_data = array(
						'profile'=>$image,
			        	'updated_by'=>$this->session->userdata('uid'),
						'updated_on'=>date('Y-m-d H:i:s')
					);

					@unlink($this->config->item('admin_users_image_upload_path').'/'.$details['profile']);

					$this->user_model->update('admin_users',$where_data,$update_data);
		        	$this->db->trans_complete();
			        if ($this->db->trans_status() === FALSE)
			        {
			            $this->db->trans_rollback();
			            $response['success'] = FALSE;
					    $response['message'] = 'Error while Uploading Profile Image.';
					    echo json_encode($response);
					    exit;
			        }else
			        {
			        	$response['success'] = TRUE;
					    $response['message'] = 'Profile Image has been uploaded successfully.';
					    echo json_encode($response);
					    exit;
			        }
				}
				else
				{
					$response['success'] = FALSE;
					$response['message'] = 'Please Upload Profile Image.';
					echo json_encode($response);
					exit;
				}
			}
			else
			{
				$response['success'] = FALSE;
        		$response['message'] = 'Something went wrong.';
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

	public function delete_user()
	{
		$user_permission = $this->web_permission_model->get_permission_by_idmodule(USER_MANAGEMENT_TAB,$this->session->userdata('role_id'));
	    if($user_permission['delete'] == 1)
	    {
			$id = $this->uricryption->decode($this->input->post('id'));

			$where_data = array('id'=>$id);

			$details = $this->user_model->get_details('admin_users',$where_data);

			if(isset($details['id']))
			{
				$this->db->trans_start();
				$this->user_model->delete('admin_users',$where_data);
				$this->db->trans_complete();
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
					$response['success'] = FALSE;
					$response['message'] = 'Error! while deleting User.';
					echo json_encode($response);
					exit;
				}else
				{
					@unlink($this->config->item('admin_users_image_upload_path').'/'.$details['profile']);
					$response['success'] = TRUE;
					$response['message'] = 'User has been deleted successfully.';
					echo json_encode($response);
					exit;
				}
			}
			else
			{
				$response['success'] = FALSE;
        		$response['message'] = 'Something went wrong.';
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


}