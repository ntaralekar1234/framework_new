<?php
class Role_model extends MY_Model{

	public function __construct(){
		parent::__construct();
    }

    // get role

    function get_role($role_id)
    {
        return $this->db->get_where('roles',array('id_role'=>$role_id))->row_array();
    }

    // get all roles

    function get_all_roles()
    {
        $this->db->select('roles.*,admin_users.name as admin_name');
        $this->db->join('admin_users','admin_users.id = roles.added_by');
       return $this->db->get('roles')->result_array();

    }

    function change_role_status()
    {
      $id_role = $this->input->post('id_role');
      $status = $this->input->post('status');

      $id_role = $this->uricryption->decode($id_role);
      $status = $this->uricryption->decode($status);

      $update_data = array(
                          'status' => $status,
                          );

      $this->db->where('id_role',$id_role);
      $this->db->update('roles',$update_data);

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

    // add new role

    function add($params)
    {
        $this->db->insert('roles',$params);
        return $this->db->insert_id();
    }


    // update
    function update($role_id,$params)
    {
        $this->db->where('id_role',$role_id);
        $this->db->update('roles',$params);
    }

    // delete

    function delete($role_id)
    {
        $this->db->where('id_role',$role_id);
        $this->db->delete('roles');
    }




}
?>