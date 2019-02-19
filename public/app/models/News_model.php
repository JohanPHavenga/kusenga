<?php
class News_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function record_count() {
        return $this->db->count_all("news");
    }

    public function get_news_list($limit = 1000, $only_published=false) {
        $this->db->select("news.*,user_name, user_surname, author_name, author_surname");
        $this->db->from("news");
        $this->db->join('users', 'user_id', 'left');
        $this->db->join('news_author', 'news_id', 'left');
        $this->db->join('authors', 'author_id', 'left');
        if ($only_published) {            
            $this->db->where('news_status', 1);
            $this->db->where('news_posted_date <= ', date("Y-m-d"));
        }
        $this->db->order_by("news_posted_date", "DESC");
        $this->db->limit($limit);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['news_id']] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_news_detail($id) {
        if (!($id)) {
            return false;
        } else {
            $this->db->select("news.*, user_name, user_surname, authors.author_id, author_name, author_surname, author_description");
            $this->db->from("news");
            $this->db->join('users', 'user_id', 'left');
            $this->db->join('news_author', 'news_id', 'left');
            $this->db->join('authors', 'author_id', 'left');
            $this->db->where('news_id', $id);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                return $query->row_array();
            }
            return false;
        }
    }

    public function get_status_dropdown() {
        $this->db->select("*");
        $this->db->from("status");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data[] = "Please Select";
            foreach ($query->result_array() as $row) {
                $data[$row['status_id']] = $row['status_name'];
            }
            return $data;
        }
        return false;
    }

    public function set_news($action, $news_id) {
        $user_data = $this->session->userdata("admin_user");
        $news_data = array(
            'news_heading' => $this->input->post('news_heading'),
            'news_content' => $this->input->post('news_content'),
            'news_posted_date' => $this->input->post('news_posted_date'),
            'news_status' => $this->input->post('news_status'),
            'news_org_name' => $this->input->post('news_org_name'),
            'news_org_url' => $this->input->post('news_org_url'),
            'user_id' => $user_data['user_id'],
        );
        $news_author_data = ["news_id" => $news_id, "author_id" => $this->input->post('author_id')];

        switch ($action) {
            case "add":
                $this->db->trans_start();
                $this->db->insert('news', $news_data);
                // get edition ID from Insert
                $news_id = $this->db->insert_id();
                // update data array
                $news_author_data["news_id"] = $news_id;
                $this->db->insert('news_author', $news_author_data);
                $this->db->trans_complete();
                break;
            case "edit":
                // add updated date to both data arrays
                $news_data['updated_date'] = date("Y-m-d H:i:s");

                // start SQL transaction
                $this->db->trans_start();
                // chcek if record already exists
                $item_exists = $this->db->get_where('news_author', array('news_id' => $news_id, 'author_id' => $this->input->post('author_id')));
                if ($item_exists->num_rows() == 0) {
                    $news_data['updated_date'] = date("Y-m-d H:i:s");
                    $this->db->delete('news_author', array('news_id' => $news_id));
                    $this->db->insert('news_author', $news_author_data);
                }
                $this->db->update('news', $news_data, array('news_id' => $news_id));
                $this->db->trans_complete();
                break;
            default:
                show_404();
                break;
        }
        // return ID if transaction successfull
        if ($this->db->trans_status()) {
            return $news_id;
        } else {
            return false;
        }
    }

    public function remove_news($id) {
        if (!($id)) {
            return false;
        } else {
            $this->db->trans_start();
            $this->db->delete('news', array('news_id' => $id));
            $this->db->trans_complete();
            return $this->db->trans_status();
        }
    }

}
