<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="users";
        $this->load->model('user_model');
    }
         
    public function index()
    {     
        $this->data_to_view['user_list'] = $this->user_model->get_user_list();
        $this->load->library('table');
        
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view($this->sidebar_url, $this->data_to_sidebar);
        $this->load->view('admin/users', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
}
