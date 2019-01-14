<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Frontend_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="news";
        $this->load->model('news_model');
    }
         
    public function index()
    {     
        $this->data_to_view['news_list'] = $this->news_model->get_news_list();
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view('news', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
}
