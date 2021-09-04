<?php
class Model_auth extends CI_Model{
    function auth_user($username,$password){
        $query=$this->db->query("SELECT * FROM user WHERE u_username='$username' AND u_pass=MD5('$passwd')LIMIT 1");
        return $query;
    }
    function check_db($username)
    {
        return $this->db->get_where('user', array('u_username' => $username));
    }
    
}