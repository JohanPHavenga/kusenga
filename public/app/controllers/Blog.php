<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Frontend_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="blog";
        $this->load->model('blog_model');
    }
         
    public function index()
    {     
        $this->data_to_view['blog_list'] = $this->blog_model->get_blog_list();
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view('blog', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
}
