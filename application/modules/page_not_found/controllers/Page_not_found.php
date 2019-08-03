<?php
class Page_not_found extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
       
    }
    
    public function index()
    {
        $this->output->set_status_header('404');
        //$data['_view'] = 'page_not_found/404';
        
      $this->layouts->set_title(PAGE_TITLE.' | 404 Page not found');
       $this->layouts->view('404');
    }
}        

