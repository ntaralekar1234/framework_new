<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Permission_denide extends MY_Controller
{	
	public function __construct(){
		parent::__construct();
		$this->data['ulactive'] = '';
        $this->data['active'] = '';
    }

    public function index()
    {
    	$this->layouts->add_custom_js('custom/js/permission-denide.js');
		$this->layouts->set_title(PAGE_TITLE.' | Permission denide');
    	$this->layouts->view('view');
    }
}