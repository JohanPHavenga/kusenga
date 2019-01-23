<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {    
    
    private $return_url="/admin/user";
    private $create_url="/admin/user/create";
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="user";
        $this->load->model('user_model');
    }
         
    public function index()
    {     
        $this->data_to_view['user_list'] = $this->user_model->get_user_list();
        $this->load->library('table');
        $this->data_to_view['create_link']=$this->create_url;
        
        $this->data_to_view['notice']=$this->get_notice("Below a list of users that can access the site");
        
        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view($this->sidebar_url, $this->data_to_sidebar);
        $this->load->view('admin/user', $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }
    
    public function create($action, $id=0) {

        // load helpers / libraries
        $this->load->helper('form');
        $this->load->library('form_validation');

        // set data
        $this->data_to_header['title'] = "User Input Page";
        $this->data_to_view['action']=$action;
        $this->data_to_view['form_url']=$this->create_url."/".$action;
        
        $this->data_to_view['notice']=$this->get_notice("Use the form below to $action a user");

        if ($action=="edit")
        {
            $this->data_to_view['user_detail']=$this->user_model->get_user_detail($id);
            $this->data_to_view['form_url']=$this->create_url."/".$action."/".$id;
        } else {
//            $this->data_to_view['user_detail']=1;
        }

        // set validation rules
        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $this->form_validation->set_rules('user_username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');

        // load correct view
        if ($this->form_validation->run() === FALSE)
        {
            $this->data_to_view['return_url']=$this->return_url;
            $this->load->view($this->header_url, $this->data_to_header);
            $this->load->view($this->sidebar_url, $this->data_to_sidebar);
            $this->load->view("/admin/user_form", $this->data_to_view);
            $this->load->view($this->footer_url, $this->data_to_footer);
        }
        else
        {
            $db_write=$this->user_model->set_user($action, $id);
            if ($db_write)
            {
                $alert="User has been successfully ".$action."ed";
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
                $this->return_url=base_url("admin/user/create/edit/".$id);
            }   
            
            redirect($this->return_url);
        }
    }


    public function delete($user_id=0) {        
        
        if ($user_id<=2) {
            $this->session->set_flashdata('alert', 'Cannot delete record: '.$user_id);
            $this->session->set_flashdata('status', 'danger');
            redirect($this->return_url);
            die();
        }
        
        // get user detail for nice delete message
        $user_detail=$this->user_model->get_user_detail($user_id);
        // delete record
        $db_del=$this->user_model->remove_user($user_id);
        
        if ($db_del)
        {
            $msg="User has successfully been deleted: <b>".$user_detail['user_name']." ".$user_detail['user_surname']."</b>";
            $status="success";
        }
        else
        {
            $msg="Error in deleting the record:'.$user_id";
            $status="danger";
        }

        $this->session->set_flashdata('alert', $msg);
        $this->session->set_flashdata('status', $status);
        redirect($this->return_url);
    }
    
}
