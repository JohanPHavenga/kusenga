<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Frontend_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="news";
        $this->data_to_header['page_title']="News Articles";
        $this->load->model('news_model');
    }
    
    public function _remap($method, $params = array()) {        
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        } else {
            $this->index($method, $params);
        }
    }
         
    public function index()
    {     
        $number_of_articles=3;
        $numbers = range(1, $number_of_articles);
        shuffle($numbers);
        $this->data_to_view['photo_num_list']=$numbers;
        
        $this->data_to_view['news_list'] = $this->news_model->get_news_list($number_of_articles, true);
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view('news', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
    public function item($id=0)
    {     
//        if (!is_int($id)) {
//            show_404();
//        }
        $this->data_to_view['news_item'] = $this->news_model->get_news_detail($id);
        
        $this->data_to_header['page_title']="News Article - ".$this->data_to_view['news_item']['news_heading'];
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view('newsitem', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
}
