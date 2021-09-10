<?php
class Model_auth extends CI_Model{

	public function cekLogin($u_username, $u_pass){

		$hasil = $this->db
		->where('u_username', $u_username)
		->where('u_pass', $u_pass)
		-> limit(1)
		-> get('user');

		if($hasil->num_rows() > 0){
			return $hasil->row();
			
		} else{
			return FALSE;
		}
	}

	public function insertData($table, $data){
			$this->db->insert($table, $data);
	}

}