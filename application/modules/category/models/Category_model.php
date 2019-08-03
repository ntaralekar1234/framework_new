<?php
class Category_model extends MY_Model{

	public function __construct(){
		parent::__construct();
    }

    // get category

    function get_category($category_id)
    {
        return $this->db->get_where('categories',array('id_category'=>$category_id))->row_array();
    }

    // get all category

    function get_all_category()
    {
        $this->db->select('categories.*,admin_users.name as admin_name');
        $this->db->join('admin_users','admin_users.id = categories.created_id AND categories.created_by = "admin"');
       return $this->db->get('categories')->result_array();

    }

    function change_category_status()
    {
      $id_category = $this->input->post('id_category');
      $status = $this->input->post('status');

      $id_category = $this->uricryption->decode($id_category);
      $status = $this->uricryption->decode($status);

      $update_data = array(
                          'status' => $status,
                          );

      $this->db->where('id_category',$id_category);
      $this->db->update('categories',$update_data);

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

    // add new category

    function add($params)
    {
        $this->db->insert('categories',$params);
        return $this->db->insert_id();
    }


    // update
    function update($category_id,$params)
    {
        $this->db->where('id_category',$category_id);
        $this->db->update('categories',$params);
    }

    // delete

    function delete($category_id)
    {
        $this->db->where('id_category',$category_id);
        $this->db->delete('categories');
    }




}
?>