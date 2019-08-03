<?php
class User_model extends MY_Model
{
  public function __construct()
  {
    parent::__construct();

    $this->my_table = 'admin_users';

    $this->select_column= array('admin_users.id','admin_users.role_id','admin_users.name','admin_users.contact','admin_users.email','admin_users.profile','admin_users.country_id','admin_users.status','admin_users.last_login','country.country_name','roles.role_name','au.name as added_by_name');

    $this->order_column= array('admin_users.id','country.country_name','admin_users.name','','admin_users.contact','admin_users.email','roles.role_name','admin_users.last_login','admin_users.status','au.name');
  }

  function  make_query()
  {
    $this->db->select($this->select_column);
    $this->db->from($this->my_table);
    $this->db->join('country','country.country_id = admin_users.country_id');
    $this->db->join('roles','roles.id_role = admin_users.role_id');
    $this->db->join('admin_users as au','au.id = admin_users.added_by');
    /*if($this->session->userdata('role_id') != SUPER_ADMIN){
      $this->db->where('admin_users.added_by',$this->session->userdata('uid'));
    }*/

    if(isset($_POST['search']['value']))
    {
      $post = $_POST['search']['value'];

      $this->db->where("(admin_users.name LIKE '%".$post."%'
        OR roles.role_name LIKE '%".$post."%'
        OR admin_users.contact LIKE '%".$post."%'
        OR admin_users.email LIKE '%".$post."%'
        OR country.country_name LIKE '%".$post."%'
        OR 'au.name' LIKE '%".$post."%'
        OR admin_users.status LIKE '".$post."')", NULL, FALSE);
    }
    if(!empty($_POST['columns']))
    {
      $search_column = $_POST['columns'];
      foreach ($search_column as $key => $value)
      {
        if($search_column[$key]['data'] == 'Country' && trim($search_column[$key]['search']['value']) != '')
        {
          $this->db->where('country.country_name',$search_column[$key]['search']['value']);
        }
        if($search_column[$key]['data'] == 'Name' && trim($search_column[$key]['search']['value']) != '')
        {
          $this->db->where('admin_users.name',$search_column[$key]['search']['value']);
        }
        if($search_column[$key]['data'] == 'Contact' && trim($search_column[$key]['search']['value']) != '')
        {
          $this->db->where('admin_users.contact',$search_column[$key]['search']['value']);
        }
        if($search_column[$key]['data'] == 'Email' && trim($search_column[$key]['search']['value']) != '')
        {
          $this->db->where('admin_users.email',$search_column[$key]['search']['value']);
        }
        if($search_column[$key]['data'] == 'Role' && trim($search_column[$key]['search']['value']) != '')
        {
          $this->db->where('roles.role_name',$search_column[$key]['search']['value']);
        }
        if($search_column[$key]['data'] == 'Added By' && trim($search_column[$key]['search']['value']) != '')
        {
          $this->db->where('au.name',$search_column[$key]['search']['value']);
        }
        if($search_column[$key]['data'] == 'Status' && trim($search_column[$key]['search']['value']) != '')
        {
          $this->db->where('admin_users.status',$search_column[$key]['search']['value']);
        }
        if($search_column[$key]['data'] == 'Last Login' && trim($search_column[$key]['search']['value']) != '')
        {
          $last_login = explode('|', $search_column[$key]['search']['value']);

          if(count($last_login) >1)
          {
            if($last_login[0] !='' && $last_login[1] == '')
            {

              $this->db->where("DATE_FORMAT(admin_users.last_login,'%Y-%m-%d') >=",date('Y-m-d',strtotime($last_login[0])));
            }
            else if($last_login[0] =='' && $last_login[1] != '')
            {
              $this->db->where("DATE_FORMAT(admin_users.last_login,'%Y-%m-%d') <=",date('Y-m-d',strtotime($last_login[1])));
            }
            else
            {
              $this->db->where("DATE_FORMAT(admin_users.last_login,'%Y-%m-%d') >=",date('Y-m-d',strtotime($last_login[0])));
              $this->db->where("DATE_FORMAT(admin_users.last_login,'%Y-%m-%d') <=",date('Y-m-d',strtotime($last_login[1])));
            }
          }
        }
      }
    }
    if(isset($_POST["order"]))
    {
      $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else
    {
      $this->db->order_by('admin_users.id', 'DESC');
    }
  }

  function get_filtered_data()
  {
    $this->make_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function fetch_data()
  {
    $this->make_query();
    if(isset($_POST["length"]) && $_POST["length"] != -1 && $_POST["length"] != 'All')
    {
      $this->db->limit($_POST['length'], $_POST['start']);
    }
    $query = $this->db->get();

    return $query->result();
  }
  function get_all_data()
  {
    $this->db->select("*");
    $this->db->from($this->my_table);
    $this->db->join('country','country.country_id = admin_users.country_id');
    $this->db->join('roles','roles.id_role = admin_users.role_id');
    $this->db->join('admin_users as au','au.id = admin_users.added_by');
    /*if($this->session->userdata('role_id') != SUPER_ADMIN){
      $this->db->where('admin_users.added_by',$this->session->userdata('uid'));
    }*/
    return $this->db->count_all_results();
  }
  public function add($table,$data)
  {
    $this->db->insert($table,$data);
    return $this->db->insert_id();
  }

  public function select($table)
  {
    $result=$this->db->get($table);
    return $result->result_array();
  }
  public function upload()
  {
    $this->load->helper('url');
    $config['upload_path']= $this->config->item('admin_users_image_upload_path');
    $config['allowed_types']= $this->config->item('admin_users_allowed_types');

    $config['overwrite']    = FALSE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('image'))
    {
      $response['success'] = FALSE;
      $response['message'] = $this->upload->display_errors();
      echo json_encode($response);
      exit;
    }
    else
    {
      $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
      $file_name = $upload_data['file_name'];
      return $file_name;
    }
}

public function get_details($table,$where_data)
{
   return $this->db->get_where($table,$where_data)->row_array();
}

public function select_where($table,$where_data)
{
  $this->db->where($where_data);
  $result=$this->db->get($table);
  return $result->result();
}

public function delete($table,$where_data)
{
  $this->db->where($where_data);
  $this->db->delete($table);
}

public function update($table,$where_data,$update_data)
{
  $this->db->set($update_data);
  $this->db->where($where_data);
  $this->db->update($table);
}

function get_all_country_states(){

  $country_id = $this->input->post('country_id');

  $this->db->select('*');
  $this->db->from('states');
  $this->db->where('country_id',$country_id);

  $states = $this->db->get()->result_array();

  echo json_encode($states);

}

function get_all_state_city(){

  $state_id = $this->input->post('state_id');

  $this->db->select('*');
  $this->db->from('cities');
  $this->db->where('state_id',$state_id);

  $cities = $this->db->get()->result_array();

  echo json_encode($cities);

}

function get_countrywise_states($country_id){

  $this->db->select('*');
  $this->db->from('states');
  $this->db->where('country_id',$country_id);

  $this->db->where('status','active');
  return $this->db->get()->result_array();

}

function get_statewise_cities($state_id){
  $this->db->select('*');
  $this->db->from('cities');
  $this->db->where('state_id',$state_id);

  $this->db->where('status','active');
  return $this->db->get()->result_array();

}

function verify_user_mobile(){
//check mobile number is exists or not
$contact = $this->input->post('contact');
$user = $this->db->select('*')
          ->from('admin_users')
          ->where('contact',$contact)
          ->get()
          ->result_array();
$count = count($user);
if($count){
  echo json_encode('exists');
}else{
  echo json_encode('not exists');
}

}

function verify_user_email(){
//check email id is exists or not
$email = $this->input->post('email');
$user = $this->db->select('*')
          ->from('admin_users')
          ->where('email',$email)
          ->get()
          ->result_array();
$count = count($user);
if($count){
  echo json_encode('exists');
}else{
  echo json_encode('not exists');
}

}




}