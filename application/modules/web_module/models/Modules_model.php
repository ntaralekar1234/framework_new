<?php
class Modules_model extends MY_Model
{
	public function get_all_modules()
	{
		return $this->db->select("*")
				 	->from('tab')
				 	->order_by('position','ASC')
				 	->get()
				 	->result_array();
	}

	public function add($table,$data)
	{
		$result=$this->db->insert($table,$data);
		return $result;
	}

	public function change_module_status()
	{
		$id_tab = $this->input->post('id_tab');
		$status = $this->input->post('status');

		$id_tab = $this->uricryption->decode($id_tab);
		$status = $this->uricryption->decode($status);

		$update_data = array(
							'status' => $status,
							);

		$this->db->where('id_tab',$id_tab);
		$this->db->update('tab',$update_data);

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

	public function delete($table,$id)
	{
		$this->db->where($id);
		$result=$this->db->delete($table);
		return $result;
	}
	public function select_where($table,$data)
	{
		$this->db->where($data);
		$res=$this->db->get($table);
		$result=$res->result();
		return $result;
	}

	public function update($table,$id,$data)
    {
        $this->db->set($data);
        $this->db->where($id);
        $result=$this->db->update($table);
        return $result;
    }
}

?>