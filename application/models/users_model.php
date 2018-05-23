<?php   
    class Users_model extends CI_Model {


        
        
        public function make_registerProfile($name,$date){
            
            $this->db->query("INSERT INTO profile (name,registration_date,status) VALUES ('$name','$date','1')");
            
            return true;

        }
        
        public function get_profiles(){
            
            $profiles = $this->db->query("SELECT * FROM profile WHERE status = 1");
            
            return $profiles->result();
            
        }
        
        public function get_profile_by_id($idProfile){
            
            $profile = $this->db->query("SELECT * FROM profile WHERE id = $idProfile AND status = 1");
            
            $profile = $profile->result();
            
            return $profile[0];
            
        }
        
        public function make_updateProfile($name,$idProfile){
            
            $this->db->query("UPDATE profile SET name = '$name' WHERE id = '$idProfile' AND status = 1");
            
            return true;
            
        }
        
        public function make_removeProfile($idProfile){
            
            $this->db->query("UPDATE profile SET status = '3' WHERE id = '$idProfile'");
            
            return true;
            
        }
        
        public function make_register($name,$password,$email,$username,$cpf,$idProfile,$date){
            
            $this->db->query("INSERT INTO users (name,password,email,username,cpf,id_profile,registration_date,status) VALUES ('$name','$password','$email','$username','$cpf','$idProfile','$date','1')");
            
            return true;
            
        }
        
        public function get_users(){
            
            $users = $this->db->query("SELECT * FROM users WHERE status = 1");
            
            return $users->result();
            
        }
        
        public function get_nameProfile($idProfile){
            
            $nameProfile = $this->db->query("SELECT * FROM profile WHERE id = '$idProfile'");
            
            $nameProfile = $nameProfile->result();
            
            return $nameProfile[0];
            
        }
        
        public function get_user_by_id($idUser){
            
            $user = $this->db->query("SELECT * FROM users WHERE id = '$idUser' AND status = 1");
            
            $user = $user->result();
            
            return $user[0];
            
        }
        
        public function make_updateUserName($name,$idUser){
            
            $this->db->query("UPDATE users SET name = '$name' WHERE id = '$idUser' AND status = 1");
            
            return true;
            
        }
        
        public function make_removeUser($idUser){
            
            $this->db->query("UPDATE users SET status = '3' WHERE id = '$idUser'");
            
            return true;
            
        }
        
        public function make_checkPerfil($name){
            
            $checkPerfil = $this->db->query("SELECT * FROM profile WHERE name = '$name' AND status <> 3");
            
            if ($checkPerfil->result()){
                return false;
            }else{
                return true;
            }
            
        }
        
        public function make_checkUser($cpf,$username){
            
            $checkUser = $this->db->query("SELECT * FROM users WHERE (cpf = '$cpf' OR username = '$username') AND status <> 3");
            
            if ($checkUser->result()){
                return true;
            }else{
                return false;
            }
            
        }
        
        public function make_checkSecurity($password,$idUser){
            
            $checkSecurity = $this->db->query("SELECT * FROM users WHERE id = '$idUser' AND password = '$password' AND status = 1");
            
            if ($checkSecurity->result()){
                return true;
            } else {
                return false;
            }
            
        }
        
        public function make_updatePassword($password,$idUser){
            
            $this->db->query("UPDATE users SET password = '$password' WHERE id = '$idUser' AND status = 1");
            
            return true;
            
        }

}