<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends Admin_Controller {    
    
    private $return_url="/admin/author";
    private $create_url="/admin/author/create";
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="author";
        $this->load->model('author_model');
    }
         
    public function index()
    {     
        $this->data_to_view['author_list'] = $this->author_model->get_author_list();
        $this->load->library('table');
        $this->data_to_view['create_link']=$this->create_url;
        
        $this->data_to_view['notice']=$this->get_notice("Below a list of authors");
        
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view($this->sidebar_url, $this->data_to_sidebar);
        $this->load->view('admin/author', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
    public function create($action, $id=0) {

        // load helpers / libraries
        $this->load->helper('form');
        $this->load->library('form_validation');

        // set data
        $this->data_to_header['title'] = "Author Input Page";
        $this->data_to_view['action']=$action;
        $this->data_to_view['form_url']=$this->create_url."/".$action;
        
        $this->data_to_view['notice']=$this->get_notice(ucfirst($action)." author by using the form below");

        if ($action=="edit")
        {
            $this->data_to_view['author_detail']=$this->author_model->get_author_detail($id);
            $this->data_to_view['form_url']=$this->create_url."/".$action."/".$id;
        } else {
//            $this->data_to_view['author_detail']=1;
        }

        // set validation rules
        $this->form_validation->set_rules('author_name', 'Name', 'required');
        $this->form_validation->set_rules('author_surname', 'Surname', 'required');
        $this->form_validation->set_rules('author_description', 'Description', 'required');

        // load correct view
        if ($this->form_validation->run() === FALSE)
        {
            // put all the fields from post into array
            foreach ($_POST as $field => $value) {
                $this->data_to_view['author_detail'][$field] = $value;
            }
            if (validation_errors()) {
                $this->data_to_view['notice'] = $this->get_notice(validation_errors(), "danger");
            }
            
            $this->data_to_view['return_url']=$this->return_url;
            $this->load->view($this->header_url, $this->data_to_header);
            $this->load->view($this->sidebar_url, $this->data_to_sidebar);
            $this->load->view("/admin/author_form", $this->data_to_view);
            $this->load->view($this->footer_url, $this->data_to_footer);
        }
        else
        {
            $db_write=$this->author_model->set_author($action, $id);
            if ($db_write)
            {
                $alert="Author has been successfully ".$action."ed";
                $status="success";
            }
            else
            {
                $alert="Error committing to the database";
                $status="danger";
            }

            $this->session->set_flashdata([
                'alert'=>$alert,
                'status'=>$status,
                ]);

            // save_only takes you back to the edit page.
            if (array_key_exists("save_only", $_POST)) {
                $this->return_url=base_url("admin/author/create/edit/".$id);
            }   
            
            redirect($this->return_url);
        }
    }


    public function delete($author_id=0) {        
        
        if ($author_id<=2) {
            $this->session->set_flashdata('alert', 'Cannot delete record: '.$author_id);
            $this->session->set_flashdata('status', 'danger');
            redirect($this->return_url);
            die();
        }
        
        // get author detail for nice delete message
        $author_detail=$this->author_model->get_author_detail($author_id);
        // delete record
        $db_del=$this->author_model->remove_author($author_id);
        
        if ($db_del)
        {
            $msg="Author has successfully been deleted: <b>".$author_detail['author_name']." ".$author_detail['author_surname']."</b>";
            $status="success";
        }
        else
        {
            $msg="Error in deleting the record:'.$author_id";
            $status="danger";
        }

        $this->session->set_flashdata('alert', $msg);
        $this->session->set_flashdata('status', $status);
        redirect($this->return_url);
    }
    
}
