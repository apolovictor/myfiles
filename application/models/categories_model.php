<?php   
    class Categories_model extends CI_Model {
        
       
        public function get_categories(){
            
            $categories = $this->db->query("SELECT * FROM category WHERE status = 1");
            
            return $categories->result();
            
        }
        
        public function make_checkCategoryName($name){
            
            $checkName = $this->db->query("SELECT * FROM category WHERE name = '$name' AND status = 1");
            
            if ($checkName->result()){
                return true;
            }else{
                return false;
            }
            
        }

        public function make_registerCategory($name,$description){
            
            $this->db->query("INSERT INTO category (name,description,status) VALUES ('$name','$description','1' ) ");
            
            return true;
        }
        
        public function make_removeCategory($idCategory){
            
            $this->db->query("UPDATE category SET status = 3 WHERE id = '$idCategory' ");
            
            return true;
            
        }
        
        
        public function get_drives_by_id($idCategory){
            
            $drives = $this->db->query("SELECT * FROM drive WHERE id_category = '$idCategory' AND status = 1");
            
            return $drives->result();
            
        }
        
        public function get_envelops_by_id($idDrive){
            
            $envelops = $this->db->query("SELECT * FROM envelop WHERE id_drive = '$idDrive' AND status = 1");
            
            return $envelops->result();
            
        }
        
        public function make_removeUploads_by_idEnvelop($idEnvelop){
            
            $this->db->query("UPDATE uploads SET status = 3 WHERE id_envelop = '$idEnvelop' AND status = 1");
            
            return true;
            
        }
        
        public function make_removeEnvelops_by_idDrive($idDrive){
            
            $this->db->query("UPDATE envelop SET status = 3 WHERE id_drive = '$idDrive' AND status = 1");
            
            return TRUE;
            
        }
        
        public function make_removeDrive_by_idCategory($idCategory){
            
            $this->db->query("UPDATE drive SET status = 3 WHERE id_category = '$idCategory' AND status = 1");
            
            return TRUE;
            
        }
        
        
    }