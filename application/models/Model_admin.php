<?php

class Model_admin extends CI_Model{
        public function hasil_data(){
        return $this->db->from('release')
        ->join('genre', 'release.re_genre=genre.id_genre')
        ->join('artist', 'release.re_artist=artist.id_artist')
        ->get()
        ->result();
    }
    function hapusData($where,$id,$table){
         $rowFile = $this->db->where('id_release',$id)->get('release')->row();
        unlink($rowFile->re_fileArsip);
        unlink($rowFile->re_coverArt);
        $this->db->where($where);
        $this->db->delete($table);
    }
    function updateData($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}