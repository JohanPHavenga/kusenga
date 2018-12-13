<?php
class Dashboard extends Admin_Controller {

    // check if method exists, if not calls "view" method
    public function _remap($method, $params = array()) {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        } else {
            $this->view();
        }
    }

    public function view() {        
        $this->data_to_header['title'] = "Admin Dashboard";  

        $this->load->view($this->header_url, $this->data_to_header);
        $this->load->view($this->sidebar_url, $this->data_to_sidebar);
        $this->load->view("/admin/dashboard", $this->data_to_view);
        $this->load->view($this->footer_url, $this->data_to_footer);
    }

}
