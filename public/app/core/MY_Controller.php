<?php
// core/MY_Controller.php
/**
 * Base Controller
 *
 */
class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // Load any front-end only dependencies
    }

}

class Frontend_Controller extends MY_Controller {

    public $data_to_header=[];
    public $data_to_view=[];
    public $data_to_footer=[];

    public $header_url='templates/header';
    public $footer_url='templates/footer';

    function __construct()
    {
        $this->data_to_header['section']="";
        parent::__construct();                
    }    

}

class Admin_Controller extends MY_Controller {

    public $data_to_header=[];
    public $data_to_view=[];
    public $data_to_footer=[];

    public $header_url='templates/admin/header';
    public $footer_url='templates/admin/footer';

    function __construct()
    {
        parent::__construct();      
        // Check login, load back end dependencies
        if (!$this->session->has_userdata('admin_logged_in')) {
            $this->session->set_flashdata([
                'alert' => "You are not logged in. Please log in to continue.",
                'status' => "danger",
            ]);
            redirect('/login/admin');
            exit();
        }
    }

}