<?php

class Model_artist extends CI_Model{
    public function hasil_data(){
        return $this->db->get('artist')->result();
    }
}