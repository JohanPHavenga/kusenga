<?php
class Author_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function record_count() {
        return $this->db->count_all("authors");
    }

    public function get_author_list()
    {
        $this->db->select("author_id, author_name, author_surname");
        $this->db->from("authors");
        $this->db->order_by('author_name', 'author_surname');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['author_id']] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_author_detail($id)
    {
        if( ! ($id))
        {
            return false;
        }
        else
        {
            $this->db->select("authors.*");
            $this->db->from("authors");
            $this->db->where('author_id', $id);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                return $query->row_array();
            }
            return false;
        }

    }

    public function set_author($action, $author_id, $author_data=[],$debug=FALSE)
    {
        // POSTED DATA
        if (empty($author_data))
        {
            $author_data = array(
                'author_name' => $this->input->post('author_name'),
                'author_surname' => $this->input->post('author_surname'),
                'author_description' => $this->input->post('author_email'),
            );
       } 

        switch ($action) {
            case "add":
                $this->db->trans_start();
                $this->db->insert('authors', $author_data);
                $author_id=$this->db->insert_id();
                $this->db->trans_complete();
                break;
                
            case "edit":
                // add updated date to both data arrays
                $author_data['updated_date']=date("Y-m-d H:i:s");
                //check of password wat gepost is alreeds gehash is
                $this->db->trans_start();
                $this->db->update('authors', $author_data, array('author_id' => $author_id));
                $this->db->trans_complete();
                break;

            default:
                show_404();
                break;
        }
        // return ID if transaction successfull
        if ($this->db->trans_status())
        {
            return $author_id;
        } else {
            return false;
        }
    }

    public function remove_author($id) {
        if( ! ($id))
        {
            return false;
        }
        else
        {
            $this->db->trans_start();
            $this->db->delete('authors', array('author_id' => $id));
            $this->db->trans_complete();
            return $this->db->trans_status();
        }
    }
    
    public function get_author_dropdown()
        {
            $this->db->select("*");
            $this->db->from("authors");
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $data[] = "Please Select";
                foreach ($query->result_array() as $row) {
                    $data[$row['author_id']] = $row['author_name']." ".$row['author_surname'];
                }
                return $data;
            }
            return false;
        }

}
