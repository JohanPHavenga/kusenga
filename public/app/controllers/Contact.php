<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Frontend_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data_to_header['section']="contact";
        $this->data_to_header['page_title']="Contact Us";
    }
         
    public function index()
    {                     
        $this->load->library('form_validation');        
            
        $this->form_validation->set_rules('dname', 'Name', 'required', 'Please enter your name');
        $this->form_validation->set_rules('demail', 'Email', 'required|valid_email', 'Please enter a valid email address');
        $this->form_validation->set_rules('dmsg', 'Comment', 'required', 'Please enter a message');
        
         // load correct view
        if ($this->form_validation->run() === FALSE) {
            $this->data_to_footer['form_data'] = $_POST;
            $this->data_to_view['email_send'] = false;

            $this->load->view($this->header_url, $this->data_to_header);
            $this->load->view('contact', $this->data_to_view);
            $this->load->view($this->footer_url, $this->data_to_footer);
        } else {
            $this->load->library('email');

            $ini_array = parse_ini_file("server_config.ini");
            
            $config['mailtype'] = 'html';
            $config['smtp_host'] = $ini_array['smtp_server'];
            $config['smtp_port'] = $ini_array['smtp_port'];
            $config['smtp_crypto'] = $ini_array['smtp_crypto'];
            $config['charset'] = $ini_array['email_charset'];
            $this->email->initialize($config);

            $this->email->set_newline("\r\n");
            $this->email->from($this->input->post('demail'), $this->input->post('dname'));
            $this->email->reply_to($this->input->post('demail'), $this->input->post('dname'));
            $this->email->to($ini_array['email_to']);
            
            $this->email->bcc($this->input->post('demail'));

            $this->email->subject('Kusenag website enquiry #'.time());
            $msg_arr[] = "<p>This is an enquiry send from the Kusenga.co.za website:<br>";
            $msg_arr[] = "<b>Name:</b> " . $this->input->post('dname');
            $msg_arr[] = "<b>Email:</b> " . $this->input->post('demail');
            $msg_arr[] = "<b>Comment:</b> " . $this->input->post('dmsg');
            $msg_arr[] = "</p>";
            $msg = implode("<br>", $msg_arr);

            $this->email->message($msg);

//            wts($this->email);
//            wts($this->input->post());
//            die();
            $this->email->send();

            $this->data_to_view['email_send'] = true;
            $this->load->view($this->header_url, $this->data_to_header);
            $this->load->view('contact', $this->data_to_view);
            $this->load->view($this->footer_url, $this->data_to_footer);
        }
    }
    
}
