<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="dashboard";
    }

    public function index() {        
        $this->data_to_header['title'] = "Admin Dashboard";  

        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view($this->sidebar_url, $this->data_to_sidebar);
        $this->load->view("/admin/dashboard", $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }

}
