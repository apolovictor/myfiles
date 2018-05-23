<?php   
    class Auth_model extends CI_Model {
        
        
        public function make_auth($username, $password){
                    $user = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND status = 1");
                    
                    return $user->result();
            }
        
    }