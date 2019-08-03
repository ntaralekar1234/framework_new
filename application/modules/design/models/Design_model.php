<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design_model extends MY_model {

	public function __construct(){
		parent::__construct();

	}

	public function select_where_row($table,$where_params)
	{
		return $this->db->get_where($table,$where_params)->row_array();
	}

	public function update($table,$params,$where_params)
	{
		$this->db->update($table,$params,$where_params);

		if($this->db->affected_rows())
		{
			return true;
		}
		else{
			return false;
		}
	}



}
