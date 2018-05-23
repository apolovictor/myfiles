<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Drive extends CI_Controller {
    
    public function register(){
        
        $categories = $this->drive_model->get_categories();

        if (empty($categories)){
            
            message_error('Cadastre ao menos uma categoria para relacionar a um drive');
            redirect('categories/register');
        }
        
        $data['categories'] = $categories;
        
        $this->load->view('default/top');
        $this->load->view('drive/register', $data);
        $this->load->view('footer');
        
    }
    
    public function make_register(){
        
        $name = $this->input->post('name');
        $idCategory = $this->input->post('idCategory');
        
        $date = date('Y-m-d');
        
        $checkName = $this->drive_model->make_checkDriveName($name);
        
        if ($checkName == TRUE){
            
            message_error('Drive já cadastrado, por favor escolha outro nome para realizar o cadastro');
            redirect('drive/register');
            
        }
        
        $idDrive = $this->drive_model->make_registerDrive($name,$idCategory,$date);
        
        redirect('drive/registerConfig/'.$idDrive);
        
        
//Continua a inserção do drive e dps a sua configuração
        
    }
    
    public function registerConfig($idDrive){
        
        $drive = $this->drive_model->get_drive($idDrive);
        
        $profiles = $this->users_model->get_profiles();
                    
        $levelProfiles = $this->drive_model->get_levelProfile();
                    
        $data['levelProfiles'] = $levelProfiles;
        
        $data['profiles'] = $profiles;
        
        $data['drive'] = $drive;
        
        $this->load->view('default/top');
        $this->load->view('drive/registerConfig', $data);
        $this->load->view('footer');
        
    }
    
    public function make_registerConfig(){
        
        $idDrive = $this->input->post('idDrive');
        $field = $this->input->post('field');
        $cod = $this->input->post('cod');
        $requiredField = $this->input->post('requiredField');
        $idProfile = $this->input->post('idProfile');
        $idLevelProfile = $this->input->post('idLevelProfile');
        
        $check = 0;
        for ($i = 0; $i < count($field); $i++){
            if (empty($field[$i]) || empty($cod[$i])){
                $check++;
            }
            
        }
        
        if ($check > 0){
        message_error("Cadastre ao menos um campo com um respectivo código");
        redirect('drive/registerConfig/'.$idDrive);
        }
        
        for ($i = 0; $i < count($idProfile); $i++){
            if (empty($idProfile[$i])){
                continue;
            }
            if(empty($idLevelProfile[$i])){ $idLevelProfile[$i] = 3;}
            $checkProfileData = $this->drive_model->make_checkProfileData($idProfile[$i],$idDrive);
            if ($checkProfileData == true){
                continue;
            }
            $this->drive_model->make_registerAccess($idProfile[$i], $idLevelProfile[$i], $idDrive);
        }
        
        for ($i = 0; $i < count($field); $i++){
            if (empty($field[$i])){
                continue;
            }
            if(empty($requiredField[$i])){ $requiredField[$i] = 0;}
            $this->drive_model->make_registerConfig($field[$i], $cod[$i], $requiredField[$i], $idDrive);
        }
        
        
        
        message_success('Drive configurado com sucesso');
        redirect('drive/registerConfig/'.$idDrive);
    }
    
    public function listDrives(){
        
        $drives = $this->drive_model->get_drives();
        
        $data['drives'] = $drives;
        
        $this->load->view('default/top');
        $this->load->view('drive/listDrives', $data);
        $this->load->view('footer');
        
    }
    
    public function listMyDrives(){
        
        $idProfile = $this->session->userdata('id_profile');
        
        $drives = $this->drive_model->get_drives_by_idSession($idProfile);
        
        $data['drives'] = $drives;
        
        $this->load->view('default/top');
        $this->load->view('drive/listMyDrives', $data);
        $this->load->view('footer');
        
    }
    
    public function removeDrive($idDrive,$idCategory){
        
        $envelops = $this->drive_model->get_envelops_by_idDrive($idDrive);
        
        foreach ($envelops as $envelop){
            
            $this->drive_model->make_removeUploads_by_envelop($envelop->id);
            
        }
        
        $this->drive_model->make_removeEnvelop_by_idDrive($idDrive);
        
        $this->drive_model->make_removeDrive_by_idDrive($idDrive);
        
        $this->drive_model->make_removeCategory_by_idCategory($idCategory);
        
        message_success("Drive removido com sucesso");
        redirect('drive/listDrives');
    }

    

    public function driveIndex($idDrive){
        
        $checkDriveConfigs = $this->drive_model->make_checkDriveConfigs($idDrive);
        
        if ($checkDriveConfigs == false){
            
            // Mensagem de error para configuração do drive obrigatória
            // Redirecionar para tela de configuração do drive
            message_error('Por favor configure o drive para começar a utilizá-lo');
            redirect('drive/registerConfig/'.$idDrive);
        }
        
        $drive = $this->drive_model->get_drive($idDrive);
        
        $envelopsByIdDrive = $this->drive_model->get_envelops_by_idDrive($idDrive);
        
        $countEnvelops = $this->drive_model->get_totalEnvelops_by_drive($idDrive);
        
        $data['countEnvelops'] = $countEnvelops;
        
        $data['envelopsByIdDrive'] = $envelopsByIdDrive;
        
        $data['drive'] = $drive;      
        
        $this->load->view('default/top');
        $this->load->view('drive/driveIndex', $data);
        $this->load->view('footer');
        
    }

    

    public function registerEnvelop($idDrive){
        
        $drive = $this->drive_model->get_drive($idDrive);
        
        $fields = $this->drive_model->get_fieldsDrive($idDrive);
        
        $data['fields'] = $fields;
        
        $data['drive'] = $drive;
        
        $this->load->view('default/top');
        $this->load->view('drive/registerEnvelop', $data);
        $this->load->view('footer');
        
    }
    
    public function make_registerEnvelop(){
        
        $idDrive = $this->input->post('idDrive');
        $envelopName = $this->input->post('envelopName');
        $envelopCpf = $this->input->post('envelopCpf');
        
        $date = date('Y-m-d');
                
        $checkEnvelopCpf = $this->drive_model->make_checkEnvelopCpf($idDrive,$envelopCpf);
        
        if ($checkEnvelopCpf == true){
            message_error("Este CPF já está cadastrado neste drive.");
            redirect('drive/registerEnvelop/'.$idDrive);
        }
        
        //Checar se já existe o cpf do envelop no banco
        $idEnvelop = $this->drive_model->make_registerEnvelop($idDrive,$envelopName,$envelopCpf,$date);
        
        $fields = $this->drive_model->get_fieldsDrive($idDrive);
        
        foreach ($fields as $field){
            
            if (empty($_FILES["$field->cod"]['name'])){
                continue;
            }
            
            $extension = end(explode(".",$_FILES["$field->cod"]['name']));
            
            $_FILES["$field->cod"]['name'] = $field->cod;
            
            $ref =  $_FILES["$field->cod"]['name'].$idEnvelop;
            
            $refLink =  $_FILES["$field->cod"]['name'].$idEnvelop.'.'.$extension;
            
            $this->drive_model->make_registerUpload($idEnvelop,$ref,$refLink,$date);
            
            $path = "C:/xampp/htdocs/systemfilesUploads/";
                
            if(!is_dir($path)){
                echo 'erro de diretório';
            } else {
            
                // Condição para fazer a inserção no banco se existir o arquivo.
                if($ref){

                    $configUpload['upload_path'] = $path;

                    $configUpload['allowed_types'] = 'png|jpg|jpeg|gif|pdf|zip|rar|doc|xls';

                    $_FILES["$field->cod"]['name'] = $refLink;

                    $nomeArquivo = $_FILES["$field->cod"]['name'];
                    $tamanhoArquivo = $_FILES["$field->cod"]["size"];
                    $nomeTemporario = $_FILES["$field->cod"]["tmp_name"];

                    //$nomeArquivo = $report.'_'.$nomeArquivo;

                    move_uploaded_file($nomeTemporario, $path . $nomeArquivo);
                              
                }
            
            //Falta implementar a função de mover o arquivo para a pasta upload.
            }        
        }        
        message_success("Arquivos cadastrados com suceso.");
        redirect('drive/registerEnvelop/'.$idDrive);
    }

    
    public function updateEnvelop($idEnvelop,$idDrive){
        
        
        $envelop = $this->drive_model->get_envelop_by_id($idEnvelop);
        
        $uploads = $this->drive_model->get_uploads_by_idEnvelop_and_idDrive($idDrive,$idEnvelop);
                
        $fields = $this->drive_model->get_fieldsDrive($idDrive);
        
        $data['uploads'] = $uploads;
        
        $data['fields'] = $fields;
        
        $data['envelop'] = $envelop;
        
        $this->load->view('default/top');
        $this->load->view('drive/updateEnvelop', $data);
        $this->load->view('footer');
        
    }
    
    
    public function removeEnvelop($idEnvelop,$idDrive){
        
        
        $this->drive_model->make_removeEnvelop_by_drive($idEnvelop,$idDrive);
        
        $this->drive_model->make_removeUploads_by_envelop($idEnvelop);
        
        message_success('Envelope removido com sucesso');
        redirect('drive/driveIndex/'.$idDrive);
        
        
    }
    
    public function removeUpload($uploadRefLink,$idEnvelop,$idDrive){
        
        $this->drive_model->make_removeUpload($uploadRefLink);
        
        message_success('Arquivo removido com sucesso');
        redirect('drive/updateEnvelop/'.$idEnvelop.'/'.$idDrive);
        
    }

    public function make_updateUploads_of_idEnvelop(){
        
        $idEnvelop = $this->input->post('idEnvelop');
        $envelopName = $this->input->post('name');
        $idDrive = $this->input->post('idDrive');
        $date = date('Y-m-d');
        
        $this->drive_model->make_updateEnvelopName($envelopName,$idEnvelop);
        
        $fields = $this->drive_model->get_fieldsDrive($idDrive);
        
        foreach ($fields as $field){
            
            $fieldConcatenate = $field->cod.$idEnvelop;
            
            $checkUpload = $this->drive_model->make_checkUpload($fieldConcatenate);
            
            if ($checkUpload == true){
                continue;
            }
            
            if (empty($_FILES["$field->cod"]['name'])){
                continue;
            }
            
            $extension = end(explode(".",$_FILES["$field->cod"]['name']));
            
            $_FILES["$field->cod"]['name'] = $field->cod;
            
            $ref =  $_FILES["$field->cod"]['name'].$idEnvelop;
            
            $refLink =  $_FILES["$field->cod"]['name'].$idEnvelop.'.'.$extension;
            
            $this->drive_model->make_registerUpload($idEnvelop,$ref,$refLink,$date);
            
            $path = "C:/xampp/htdocs/systemfilesUploads/";
                
            if(!is_dir($path)){
                echo 'erro de diretório';
            } else {
            
                // Condição para fazer a inserção no banco se existir o arquivo.
                if($ref){

                    $configUpload['upload_path'] = $path;

                    $configUpload['allowed_types'] = 'png|jpg|jpeg|gif|pdf|zip|rar|doc|xls';

                    $_FILES["$field->cod"]['name'] = $refLink;

                    $nomeArquivo = $_FILES["$field->cod"]['name'];
                    $tamanhoArquivo = $_FILES["$field->cod"]["size"];
                    $nomeTemporario = $_FILES["$field->cod"]["tmp_name"];

                    //$nomeArquivo = $report.'_'.$nomeArquivo;

                    move_uploaded_file($nomeTemporario, $path . $nomeArquivo);
                                   
                }
            
            //Falta implementar a função de mover o arquivo para a pasta upload.
        }
       }
              
       message_success('Atualização realizada com sucesso');
       redirect('drive/updateEnvelop/'.$idEnvelop.'/'.$idDrive);
    }
    
    // Método que fará o download do arquivo
        public function download($file){
                
                $path = "C:/xampp/htdocs/systemfilesUploads/";
                // definimos original path do arquivo
                $filePath = $path.'/'.$file;
                
            if (!file_exists($filePath)) {
            // Exiba uma mensagem de erro caso ele não exista
                echo $filePath;
                echo "<br />";
                echo 'O comando não pode ser executado.';
            }
            
            $newName = 'arquivo_'.$file;
           
            // Configuramos os headers que serão enviados para o browser
            header('Content-Disposition: attachment; filename="'.$newName.'"');
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' .filesize($filePath));
            header('Pragma: no-cache');
            header('Expires: 0');
            // Envia o arquivo para o cliente
            
            readfile($filePath);
            
        }

    
















































    public function index(){
        
        $this->load->view('default/top');
        $this->load->view('parents/index');
        $this->load->view('footer');
        
    }
    
    public function profile(){
        
        $idParent = $this->session->userdata('id');
        
        $profile = $this->parents_model->get_dataProfile($idParent);
        
        $data['profile'] = $profile;
        
        $this->load->view('default/top');
        $this->load->view('parents/myProfile', $data);
        $this->load->view('footer');
        
    }
    
    public function make_updateProfile(){
        
        $name = $this->input->post('name');
        $lastName = $this->input->post('lastName');
        $rg = $this->input->post('rg');
        $cpf = $this->input->post('cpf');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone1 = $this->input->post('phone1');
        $phone2 = $this->input->post('phone2');
        $zipCode = $this->input->post('zipCode');
        $creditCardNumber = $this->input->post('creditCardNumber');
        $creditCardDate = $this->input->post('creditCardDate');
        $date = date('Y-m-d');
        $idParent = $this->session->userdata('id');
        $level = '3';
        $status = '1';
        
        $this->parents_model->make_updateProfile($idParent,$name,$lastName,$rg,$cpf,$email,$password,$phone1,$phone2,$zipCode,$creditCardNumber,$creditCardDate,$level,$date,$status);
     
        message_success('Alteração realizada com sucesso');
        redirect('parents/profile');
        
    }

    public function registerStudent(){
        
        $parent = $this->parents_model->get_parent($this->session->userdata('id'));
        
        $data['parent'] = $parent; 
        
        $this->load->view('default/top');
        $this->load->view('parents/registerStudent', $data);
        $this->load->view('footer');
        
    }
    
    public function make_registerStudent(){
        
        $name = $this->input->post('name');
        $lastName = $this->input->post('lastName');
        $rg = $this->input->post('rg');
        $email = $this->input->post('email');
        $accessNumber = $this->input->post('accessNumber');
        $username = $accessNumber;
        $password = $this->input->post('password');
        $cpf = $this->input->post('cpf');
        $graduation = $this->input->post('graduation');
        $phone = $this->input->post('phone');
        $zipCode = $this->input->post('zipCode');
        $level = 4;
        $date = date('Y-m-d');
        $status = 1;
        
        //Checar antes o identificador do estudante antes de realizar o cadastro
        
        $this->parents_model->make_registerStudent($this->session->userdata('id'),$name,$lastName,$rg,$email,$username,$accessNumber,$password,$cpf,$graduation,$phone,$zipCode,$date,$level,$status);
        
        message_success("Dependente cadastrado com sucesso");
        redirect();
        
    }
    
    public function listStudents(){
        
        $idParent = $this->session->userdata('id');
        
        $students = $this->parents_model->get_students_by_parents($idParent);
        
        $data['students'] = $students;
        
        $this->load->view('default/top');
        $this->load->view('parents/listStudents', $data);
        $this->load->view('footer');
        
    }
    
    public function updateStudent($idStudent){
        
        $idParent = $this->session->userdata('id');
        
        $student = $this->parents_model->get_student_by_id($idStudent,$idParent);
        
        $data['student'] = $student;
        
        $this->load->view('default/top');
        $this->load->view('parents/updateStudent', $data);
        $this->load->view('footer');
        
        
    }
    
    public function make_updateStudent(){
        
        $idStudent = $this->input->post('idStudent');
        $idParent = $this->session->userdata('id');
        $name = $this->input->post('name');
        $lastName = $this->input->post('lastName');
        $rg = $this->input->post('rg');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $accessNumber = $this->input->post('accessNumber');
        $cpf = $this->input->post('cpf');
        $graduation = $this->input->post('graduation');
        $limitByDay = $this->input->post('limitByDay');
        $phone = $this->input->post('phone');
        $zipCode = $this->input->post('zipCode');
        
        
        $this->parents_model->make_updateStudent($idStudent,$idParent,$name,$lastName,$rg,$email,$password,$accessNumber,$cpf,$graduation,$limitByDay,$phone,$zipCode);
        
        message_success("Atualização realizada com sucesso");
        redirect('parents/updateStudent/'.$idStudent);
        
    }
    
    
    
    public function removeStudent($idStudent){
        
        
        $this->parents_model->make_removeStudent($idStudent);
        
        message_success("Dependente removido com sucesso.");
        redirect('parents/listStudents');
        
    }
    
    public function blockProducts($idStudent){
        
        $idParent = $this->session->userdata('id');
        
        $products = $this->parents_model->get_products_to_block();
        
        $student = $this->parents_model->get_student_by_id($idStudent,$idParent);
        
        $data['products'] = $products;
        
        $data['student'] = $student;
        
        $this->load->view('default/top');
        $this->load->view('parents/blockProducts', $data);
        $this->load->view('footer');
        
    }
    
    public function make_blockProducts(){
        
        $idParent = $this->session->userdata('id');
        $idStudent = $this->input->post('idStudent');
        $productsBlock = $this->input->post('productsBlock');
        
        $date = date('Y-m-d');
                
        foreach ($productsBlock as $productBlock){
            
            $checkProductBlock = $this->parents_model->check_productsBlock($productBlock, $idStudent);
            
            if ($checkProductBlock == false){
                
                $this->parents_model->make_registerBlockProducts($idStudent,$productBlock,$idParent,$date);
                
            }
            
        }
        
        message_success("Bloqueio realizado com sucesso. Para visualizar produtos bloqueados <a>clique aqui</a>");
        redirect('parents/blockProducts/'.$idStudent);
        
        
    }
    
    public function availableProducts($idStudent){
        
        $products = $this->parents_model->get_availableProducts($idStudent);
        
        $data['products'] = $products;
        
        $this->load->view('default/top');
        $this->load->view('parents/availableProducts', $data);
        $this->load->view('footer');
        
    }
    
}