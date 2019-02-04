<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Frontend_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="about";
        $this->data_to_header['page_title']="About Us";
    }
         
    public function index()
    {     
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view('about', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
}
