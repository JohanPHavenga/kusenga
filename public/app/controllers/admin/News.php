<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Admin_Controller {

    private $return_url = "/admin/news";
    private $create_url = "/admin/news/create";

    function __construct() {
        parent::__construct();
        $this->data_to_header['section'] = "news";
        $this->load->model('news_model');
    }

    public function index() {
        $this->load->library('table');

        $this->data_to_view['news_list'] = $this->news_model->get_news_list();
        $this->data_to_view['create_link'] = $this->create_url;
        $this->data_to_view['notice'] = $this->get_notice("List of news articles");

        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view($this->sidebar_url, $this->data_to_sidebar);
        $this->load->view('admin/news', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }

    public function create($action, $id = 0) {

        // load helpers / libraries
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('author_model');

        // set data
        $this->data_to_header['title'] = "Article Input Page";
        $this->data_to_view['action'] = $action;
        $this->data_to_view['form_url'] = $this->create_url . "/" . $action;

        $this->data_to_view['notice'] = $this->get_notice(ucfirst($action) . " news article by using form below");

        $this->data_to_view['status_dropdown'] = $this->news_model->get_status_dropdown();
        $this->data_to_view['author_dropdown'] = $this->author_model->get_author_dropdown();

        if ($action == "edit") {
            $this->data_to_view['news_detail'] = $this->news_model->get_news_detail($id);
            $this->data_to_view['form_url'] = $this->create_url . "/" . $action . "/" . $id;
        } else {
            $this->data_to_view['news_detail']['news_status'] = 2;
        }

        // set validation rules
        $this->form_validation->set_rules('news_heading', 'Heading', 'trim|required');
        $this->form_validation->set_rules('news_content', 'Content', 'trim|required');
        $this->form_validation->set_rules('news_posted_date', 'Date to be posted', 'trim|required|valid_date');
        $this->form_validation->set_message('valid_date', 'The date in the <b>Date to be posted field</b> is not formatted correctly. It should be YYYY-mm-dd');
        $this->form_validation->set_rules('news_status', 'Article Status', 'required');
        $this->form_validation->set_rules('news_org_url', 'Origin URL', 'required|valid_url');

        // load correct view
        if ($this->form_validation->run() === FALSE) {
            // put all the fields from post into array
            foreach ($_POST as $field => $value) {
                $this->data_to_view['news_detail'][$field] = $value;
            }
            if (validation_errors()) {
                $this->data_to_view['notice'] = $this->get_notice(validation_errors(), "danger");
            }

            $this->data_to_view['return_url'] = $this->return_url;
            $this->load->view($this->header_url, $this->data_to_header);
            $this->load->view($this->sidebar_url, $this->data_to_sidebar);
            $this->load->view("/admin/news_form", $this->data_to_view);
            $this->load->view($this->footer_url, $this->data_to_footer);
        } else {
            $db_write = $this->news_model->set_news($action, $id);
            if ($db_write) {
                $alert = "Article has been successfully " . $action . "ed";
                $status = "success";
            } else {
                $alert = "Error committing to the database";
                $status = "danger";
            }

            $this->session->set_flashdata([
                'alert' => $alert,
                'status' => $status,
            ]);

            // save_only takes you back to the edit page.
            if (array_key_exists("save_only", $_POST)) {
                $this->return_url = base_url("admin/news/create/edit/" . $id);
            }

            redirect($this->return_url);
        }
    }

    public function delete($news_id = 0) {


        // get news detail for nice delete message
        $news_detail = $this->news_model->get_news_detail($news_id);
        // delete record
        $db_del = $this->news_model->remove_news($news_id);

        if ($db_del) {
            $msg = "Article has successfully been deleted: <b>" . $news_detail['news_heading'] . "</b>";
            $status = "success";
        } else {
            $msg = "Error in deleting the record:'.$news_id";
            $status = "danger";
        }

        $this->session->set_flashdata('alert', $msg);
        $this->session->set_flashdata('status', $status);
        redirect($this->return_url);
    }

}
