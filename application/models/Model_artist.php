<?php

class Model_artist extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function hasil_data(){
        return $this->db->get('artist')->result();
    }
    public function hasil_profile($where,$table){
        return $this->db->get_where($table,$where);
}
    function updateData($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}