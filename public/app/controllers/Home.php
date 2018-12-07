<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="home";
    }
         
    public function index()
    {     
        $this->data_to_view['test']="Lwazi";
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view('home', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }

    public function my_404() 
    {
        $this->data_to_header['title']="Page not found";

        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view('404', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
}
