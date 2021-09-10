<?php

class Model_submission extends CI_Model{
    public function hasil_data($user){
        return $this->db->from('release')
        ->join('genre', 'release.re_genre=genre.id_genre')
        ->join('artist', 'release.re_artist=artist.id_artist')
        ->where('re_namaArtis', $user)
        ->get()
        ->result();
    }
    public function hasil_genre(){
        return $this->db->from('genre')
        ->get()
        ->result();
    }
    function editData($where,$table){
        return $this->db->get_where($table,$where);
    }

    function updateData($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function updateCover($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function simpanData($data){
        $this->db->insert('release',$data);
        return true;
    }
    function hapusData($where,$id,$table){
         $rowFile = $this->db->where('id_release',$id)->get('release')->row();
        unlink($rowFile->re_fileArsip);
        unlink($rowFile->re_coverArt);
        $this->db->where($where);
        $this->db->delete($table);
    }
    function valueSubmission($user){
        return $this->db->from('artist')
        ->where('a_namaArtist', $user)
        ->get()
        ->result();
    }
}