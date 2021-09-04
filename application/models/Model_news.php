<?php
class Model_news extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function hasil_berita($n_slug = FALSE){
        if ($n_slug === FALSE){
            return $this->db->get('news')->result_array();
        }
        return $this->db->get_where('news', array('n_slug' => $n_slug))->row_array();
        
    }
    public function hasil_author(){
        return $this->db->from('news')
        ->join('user', 'news.n_userID=user.id_user')
        ->join('category', 'news.n_category=category.id_category')
        ->get()
        ->result();
    }
}


