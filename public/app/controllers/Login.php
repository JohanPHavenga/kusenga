<?php
class Login extends Frontend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    // check if method exists, if not calls "view" method
    public function _remap($method, $params = array())
    {
        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        else
        {
            $this->admin($method, $params);
        }
    }

    public function logout()
    {
        $array_items = array('admin_logged_in', 'admin_user');
        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata([
                    'alert'=>"Successfully logged out",
                    'status'=>"success",
                    ]);
        redirect("/login");
    }

    public function admin($submit=false)
    {
        $this->data_to_header['title'] = "Admin Login";
        $this->data_to_header['meta_robots']="noindex, nofollow";
        $this->data_to_view['form_url'] = '/login/admin/submit';
        $this->data_to_view['error_url'] = '/login/admin';
        $this->data_to_view['success_url'] = '/admin';

        // set validation rules
        $this->form_validation->set_rules('user_username', 'Username', 'required');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        
        // load correct view
        if ($this->form_validation->run() === FALSE)
        {
            if($this->session->flashdata('alert')) {
                $this->data_to_view['show_alert']=true;
                $this->data_to_view['alert_status']='warning';
                $this->data_to_view['alert_msg']=$this->session->flashdata('alert');
                if ($this->session->flashdata('status')) { $this->data_to_view['alert_status']=$this->session->flashdata('status'); }
            } else {
                $this->data_to_view['show_alert']=false;
            }
            $this->load->view($this->header_url, $this->data_to_header);
            $this->load->view('login', $this->data_to_view);
            $this->load->view($this->footer_url, $this->data_to_footer);
        }
        else
        {
            $check_login=$this->user_model->check_login();

            if ($check_login)
            {
                
                $this->session->set_userdata("admin_logged_in",true);
                $this->session->set_userdata("admin_user",$check_login);

                $this->session->set_flashdata([
                    'alert'=>"Login successfull",
                    'status'=>"success",
                    ]);
                

                redirect($this->data_to_view['success_url']);
                exit();
            }
            else
            {
                $this->session->set_flashdata([
                    'alert'=>"Incorrect username and password. Please try again.",
                    'status'=>"danger",
                    'user_username'=>$this->input->post('user_username'),
                    ]);

                redirect($this->data_to_view['error_url']);
                exit();
            }

            die("Login failure");

        }

    }

}
