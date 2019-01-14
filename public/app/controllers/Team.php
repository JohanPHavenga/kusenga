<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends Frontend_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="team";
    }
         
    public function index()
    {     
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view('team', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
}
