<?php
class News_model extends MY_model {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function record_count() {
            return $this->db->count_all("news");
        }
        
        public function get_news_list($limit=1000)
        {  
            $this->db->select("news.*,author_name, author_surname");
            $this->db->from("news");
            $this->db->join('news_author', 'news_id', 'left');
            $this->db->join('authors', 'author_id', 'left');
            $this->db->order_by("news_posted_date","DESC");
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
        
        public function get_news_detail($id)
        {
            if( ! ($id)) 
            {
                return false;  
            } 
            else 
            {
                $this->db->select("news.*, user_name, user_surname, authors.*");
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
        
//        public function set_club($action, $club_id)
//        {            
//            $club_data = array(
//                        'club_name' => $this->input->post('club_name'),
//                        'club_status' => $this->input->post('club_status'),
//                        'town_id' => $this->input->post('town_id'),
//                    );        
//            $club_sponsor_data = ["club_id"=>$club_id,"sponsor_id"=>$this->input->post('sponsor_id')];   
//            
//            switch ($action) {                    
//                case "add":                     
//                    $this->db->trans_start();
//                    $this->db->insert('clubs', $club_data);  
//                    // get edition ID from Insert
//                    $club_id=$this->db->insert_id();          
//                    // update data array
//                    $club_sponsor_data["club_id"]=$club_id;
//                    $this->db->insert('club_sponsor', $club_sponsor_data);
//                    $this->db->trans_complete();  
//                    break;
//                case "edit":
//                    // add updated date to both data arrays
//                    $club_data['updated_date']=date("Y-m-d H:i:s");
//                    
//                    // start SQL transaction
//                    $this->db->trans_start();
//                    // chcek if record already exists
//                    $item_exists = $this->db->get_where('club_sponsor', array('club_id' => $club_id, 'sponsor_id' => $this->input->post('sponsor_id')));
//                    if ($item_exists->num_rows() == 0)  
//                    {
//                        $club_data['updated_date']=date("Y-m-d H:i:s");
//                        $this->db->delete('club_sponsor', array('club_id' => $club_id));
//                        $this->db->insert('club_sponsor', $club_sponsor_data);                        
//                    } 
//                    $this->db->update('clubs', $club_data, array('club_id' => $club_id));                  
//                    $this->db->trans_complete();  
//                    break;   
//                default:
//                    show_404();
//                    break;
//            }
//            // return ID if transaction successfull
//            if ($this->db->trans_status())
//            {
//                return $club_id;
//            } else {
//                return false;
//            }
//            
//        }
//        
//        
//        public function remove_club($id) {
//            if( ! ($id)) 
//            {
//                return false;  
//            } 
//            else 
//            {
//                $this->db->trans_start();
//                $this->db->delete('clubs', array('club_id' => $id));             
//                $this->db->trans_complete();  
//                return $this->db->trans_status();    
//            }
//        }
        
}