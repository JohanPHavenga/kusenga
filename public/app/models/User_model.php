<?php
class User_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function hash_pass($password)
    {
        if ($password) {
            return sha1($password."37");
        } else {
            return NULL;
        }
    }

    public function record_count() {
        return $this->db->count_all("users");
    }
    
    public function get_user_id($email)
    {
        $this->db->select("user_id");
        $this->db->from("users");
        $this->db->where('user_email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data = $row['user_id'];
            }
            return $data;
        }
        return false;
    }


    public function get_user_list()
    {
        $this->db->select("user_id, user_name, user_surname, user_email");
        $this->db->from("users");
        $this->db->order_by('user_name', 'user_surname');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['user_id']] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_user_detail($id)
    {
        if( ! ($id))
        {
            return false;
        }
        else
        {
            $this->db->select("users.*");
            $this->db->from("users");
            $this->db->where('user_id', $id);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                return $query->row_array();
            }
            return false;
        }

    }

    public function set_user($action, $user_id, $user_data=[],$debug=FALSE)
    {
        // POSTED DATA
        if (empty($user_data))
        {
            $user_data = array(
                      'user_name' => $this->input->post('user_name'),
                      'user_surname' => $this->input->post('user_surname'),
                      'user_email' => $this->input->post('user_email'),
                      'user_contact' => $this->input->post('user_contact'),
                      'user_username' => $this->input->post('user_username'),
                      'user_password' => $this->hash_pass($this->input->post('user_password')),
                );
       } else {
           if (isset($user_data['user_password'])) { $user_data['user_password']=$this->hash_pass($user_data['user_password']); }
       }

        switch ($action) {
            case "add":
                $this->db->trans_start();
                $this->db->insert('users', $user_data);
                $user_id=$this->db->insert_id();
                $this->db->trans_complete();
                break;
                
            case "edit":
                // add updated date to both data arrays
                $user_data['updated_date']=date("Y-m-d H:i:s");
                //check of password wat gepost is alreeds gehash is
                if ($this->check_password($this->input->post('user_password'),$user_id))
                {
                    unset($user_data['user_password']);
                }
                $this->db->trans_start();
                $this->db->update('users', $user_data, array('user_id' => $user_id));
                $this->db->trans_complete();
                break;

            default:
                show_404();
                break;
        }
        // return ID if transaction successfull
        if ($this->db->trans_status())
        {
            return $user_id;
        } else {
            return false;
        }
    }

    public function remove_user($id) {
        if( ! ($id))
        {
            return false;
        }
        else
        {
            $this->db->trans_start();
            $this->db->delete('users', array('user_id' => $id));
            $this->db->trans_complete();
            return $this->db->trans_status();
        }
    }


    public function check_login()
    {
        $user_data = array(
                    'user_username' => $this->input->post('user_username'),
                    'user_password' => $this->hash_pass($this->input->post('user_password')),
                );

        $this->db->select("users.user_id, user_name, user_surname, user_email");
        $this->db->from("users");
        $this->db->where($user_data);        
//        echo $this->db->get_compiled_select();
        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;

    }

    private function check_password($password, $id)
    {
        $this->db->select("user_id");
        $this->db->from('users');
        $this->db->where('user_password', $password);
        $this->db->where('user_id', $id);
        return $this->db->count_all_results();
    }

}
