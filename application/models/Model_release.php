<?php

class Model_release extends CI_Model{
    public function hasil_data(){
        return $this->db->from('release')
        ->join('genre', 'release.re_genre=genre.id_genre')
        ->join('artist', 'release.re_artist=artist.id_artist')
        ->get()
        ->result();
    }

}