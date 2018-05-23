<?php   
    class Drive_model extends CI_Model {
        
        public function get_categories(){
            
            $categories = $this->db->query("SELECT * FROM category WHERE status = 1");
            
            return $categories->result();
            
        }
        
        public function get_levelProfile(){
            
            $levelProfiles = $this->db->query("SELECT * FROM level_profile WHERE status = 1 AND id > 1");
            
            return $levelProfiles->result();
            
        }
        
        public function make_checkDriveConfigs($idDrive){
            
            $checkDriveConfigs = $this->db->query("SELECT * FROM drive_access WHERE id_drive = '$idDrive'");
            
            if ($checkDriveConfigs->result()){
                return true;
            }else{
                return false;
            }
            
        }

        public function make_checkDriveName($name){
            
            $checkName = $this->db->query("SELECT * FROM drive WHERE name = '$name' AND status = 1");
            
            if($checkName->result()){
                return TRUE;
            }else{
                return false;
            }
            
        }

        public function make_registerDrive($name,$idCategory,$date){
            
            $idDrive = $this->db->query("INSERT INTO drive (name,id_category,date_register,status) VALUES ('$name','$idCategory','$date','1')");
            
            return mysql_insert_id();
            
        }
        
        public function get_drive($idDrive){
            
            $drive = $this->db->query("SELECT * FROM drive WHERE id = '$idDrive' AND status = 1");
            
            $drive = $drive->result();
            
            return $drive[0];
            
        }
        
        public function make_registerConfig($field,$cod,$requiredField,$idDrive){
            
            $this->db->query("INSERT INTO drive_config (id_drive,field,cod,required,status) VALUES ('$idDrive','$field','$cod','$requiredField','1')");
            
            return true;
            
        }
        
        public function get_drives(){
            
            $drives = $this->db->query("SELECT * FROM drive WHERE status = 1");
            
            return $drives->result();
            
        }
        
        public function get_drives_by_idSession($idProfile){
            
            $drives = $this->db->query("SELECT *, d.id AS idDrive FROM drive AS d INNER JOIN drive_access AS da ON d.id = da.id_drive WHERE da.id_profile = '$idProfile' AND da.status = 1 AND d.status = 1");
            
            return $drives->result();
            
        }

        public function get_categoryDrive($idCategoryDrive){
            
            $categoryDrive = $this->db->query("SELECT * FROM category WHERE id = '$idCategoryDrive' AND status = 1");
            
            if ($categoryDrive->result()){
                $categoryDrive = $categoryDrive->result();
                
                return $categoryDrive[0];
            }
            
        }
        
        public function get_fieldsDrive($idDrive){
            
            $fields = $this->db->query("SELECT * FROM drive_config WHERE status = 1 AND id_drive = '$idDrive' ");
            
            return $fields->result();
            
        }
        
        public function make_registerEnvelop($idDrive,$envelopName,$envelopCpf,$date){
            
            $idEnvelop = $this->db->query("INSERT INTO envelop (name,cod,id_drive,date_register,status) VALUES ('$envelopName','$envelopCpf','$idDrive','$date','1')");
            
            return mysql_insert_id();
            
        }        

        public function get_totalFields($idDrive){
            
            $countFields = $this->db->query("SELECT COUNT(id) AS countFields FROM `drive_config` WHERE id_drive = '$idDrive' AND status = 1");
            
            $countFields = $countFields->result();
            
            return $countFields[0];
            
        }
        
        public function make_registerUpload($idEnvelop,$ref,$refLink,$date){
            
            $this->db->query("INSERT INTO uploads (id_envelop,ref,ref_link,date_register,status) VALUES ('$idEnvelop','$ref','$refLink','$date','1')");
            
            return true;
            
        }
        
        public function get_envelops_by_idDrive($idDrive){
            
            $envelopsByIdDrive = $this->db->query("SELECT * FROM envelop WHERE id_drive = '$idDrive' AND status = 1");
            
            return $envelopsByIdDrive->result();
            
        }

        public function get_totalEnvelops_by_drive($idDrive){
            
            $countEnvelops = $this->db->query("SELECT COUNT(id) AS totalEnvelop FROM envelop WHERE id_drive = '$idDrive' AND status = 1");
            
            if ($countEnvelops->result()){
                
                $countEnvelops = $countEnvelops->result();
                
                return $countEnvelops[0];
                
            }
            
        }

        
        public function get_totalFiles_by_envelops($idEnvelop){
            
            $totalFilesByEnvelop = $this->db->query("SELECT COUNT(id) AS totalFiles FROM uploads WHERE id_envelop = '$idEnvelop' AND status = 1");
            
            if ($totalFilesByEnvelop->result()){
                
                $totalFilesByEnvelop = $totalFilesByEnvelop->result();
                
                return $totalFilesByEnvelop[0];
                
            }
        }
        
        public function get_envelop_by_id($idEnvelop){
            
            $envelop = $this->db->query("SELECT * FROM envelop WHERE id = '$idEnvelop' AND status = 1");
            
            if ($envelop->result()){
                
                $envelop = $envelop->result();
                
                return $envelop[0];
                
            }
            
        }
        
        public function make_removeEnvelop_by_drive($idEnvelop,$idDrive){
            
            $this->db->query("UPDATE envelop SET status = 3 WHERE id = '$idEnvelop' AND id_drive = '$idDrive' ");
            
            return true;
            
        }
        
        public function make_removeUploads_by_envelop($idEnvelop){
            
            $this->db->query("UPDATE uploads SET status = 3 WHERE id_envelop = '$idEnvelop' ");
            
            return true;
            
        }
        
        public function make_removeEnvelop_by_idDrive($idDrive){
            
            $this->db->query("UPDATE envelop SET status = 3 WHERE id_drive = '$idDrive' ");
            
            return true;
            
        }
        
        public function make_removeDrive_by_idDrive($idDrive){
            
            $this->db->query("UPDATE drive SET status = 3 WHERE id = '$idDrive' ");
            
            return true;
            
        }

        public function make_removeCategory_by_idCategory($idCategory){
            
            $this->db->query("UPDATE category SET status = 3 WHERE id = '$idCategory' ");
            
            return true;
            
        }

        public function get_uploads_by_idEnvelop_and_idDrive($idDrive,$idEnvelop){
            
            $uploads = $this->db->query("SELECT * FROM uploads AS u INNER JOIN envelop AS e ON u.id_envelop = e.id WHERE u.status = 1 AND e.id_drive = '$idDrive' AND u.id_envelop = '$idEnvelop' ");
            
            return $uploads->result();
            
        }
        
        public function make_checkField($fieldCod){
            
            $checkFiled = $this->db->query("SELECT * FROM uploads WHERE ref = '$fieldCod' AND status = 1");
            
            if ($checkFiled->result()){
                return true;
            }else{
                return false;
            }                        
        }
        
        public function get_uploads_by_ref($fieldCod){
            
            $upload = $this->db->query("SELECT * FROM uploads WHERE ref = '$fieldCod' AND status = 1");
            
            $upload = $upload->result();
            
            return $upload[0];          
            
        }
        
        public function make_removeUpload($uploadRefLink){
            
            $this->db->query("UPDATE uploads SET status = 3 WHERE ref_link = '$uploadRefLink'");
            
            return true;
            
        }

        public function make_checkUpload($fieldConcatenate){
            
            $checkUpload = $this->db->query("SELECT * FROM uploads WHERE ref = '$fieldConcatenate' AND status = 1");
            
            if ($checkUpload->result()){
                
                return true;
                
            }else{
                return false;
            }            
        }
        
        public function make_updateEnvelopName($envelopName,$idEnvelop){
            
            $this->db->query("UPDATE envelop SET name = '$envelopName' WHERE id = '$idEnvelop' AND status = 1");
            
            return true;
            
        }

        public function make_checkProfileData($idProfile,$idDrive){
            
            $checkProfileData = $this->db->query("SELECT * FROM drive_access WHERE id_profile = $idProfile AND id_drive = $idDrive AND status = 1");
            
            if ($checkProfileData->result()){
                return true;
            } else {
                return false;
            }
            
        }
        
        public function make_registerAccess($idProfile, $idLevelProfile, $idDrive){
            
            $this->db->query("INSERT INTO drive_access (id_profile,id_drive,level,status) VALUES ('$idProfile','$idDrive','$idLevelProfile','1')");
            
            return true;
            
        }
        
        public function make_checkEnvelopCpf($idDrive,$envelopCpf){
            
            $checkEnvelopCpf = $this->db->query("SELECT * FROM envelop WHERE cod = '$envelopCpf' AND id_drive = '$idDrive' AND status = 1");
            
            if($checkEnvelopCpf->result()){
                return true;
            } else {
                return false;
            }
            
        }

}
