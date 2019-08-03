<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends MY_model {

	public function __construct(){
		parent::__construct();

    }

    public function add($table,$params)
    {
      $this->db->insert($table,$params);
      return $this->db->insert_id();
    }

}
