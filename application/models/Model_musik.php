<?php
class Model_musik extends CI_Model{
public function hasil_musik(){
        return $this->db->from('release')
        ->join('genre', 'release.re_genre=genre.id_genre')
        ->join('artist', 'release.re_artist=artist.id_artist')
        ->join('music', 'release.id_release=music.m_releaseID')
        ->get()
        ->result();
    }

    function genreList(){
        return $this->db->from('genre')
        ->get()
        ->result();
    }
}
