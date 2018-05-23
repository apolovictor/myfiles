<?php
class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
                public function __construct(){
                        parent::__construct();
                }
 
                                                
                public function registerProfile(){
                    
                    $this->load->view('default/top');
                    $this->load->view('users/registerProfile');
                    $this->load->view('footer');
                    
                }
                
                public function make_registerProfile(){
                    
                    $name = $this->input->post('name');
                    
                    if (empty($name)){
                        message_error('O campo Nome do Perfil orbigatoriamente deve ser preenchido');
                        redirect('users/registerProfile');
                    }
                    
                    $checkPerfil = $this->users_model->make_checkPerfil($name);
            
                    if ($checkPerfil == false){
                        message_error('Perfil já cadastrado, escolha outro nome para concluir o cadastro.');
                        redirect('users/registerProfile');
                    }else{
                    
                    $date = date('Y-m-d');
                    
                    $this->users_model->make_registerProfile($name,$date);
                    
                    message_success("Perfil cadastrado com sucesso.");
                    redirect('users/registerProfile');
                    }
                }
                
                public function listProfiles(){
                    
                    $profiles = $this->users_model->get_profiles();
                    
                    $data['profiles'] = $profiles;
                    
                    $this->load->view('default/top');
                    $this->load->view('users/listProfiles', $data);
                    $this->load->view('footer');
                    
                }
                
                public function updateProfile($idProfile){
                    
                    $profile = $this->users_model->get_profile_by_id($idProfile);
                    
                    $data['profile'] = $profile;
                    
                    $this->load->view('default/top');
                    $this->load->view('users/updateProfile', $data);
                    $this->load->view('footer');
                }
                
                public function make_updateProfile(){
                    
                    $name = $this->input->post('name');
                    $idProfile = $this->input->post('idProfile');
                    
                    $profile = $this->users_model->get_profile_by_id($idProfile);
                    
                    if($profile->name == $name){
                        
                        message_error('Perfil com o mesmo nome do atual');
                        redirect('users/updateProfile/'.$idProfile);
                        
                    }else{
                        
                        $checkPerfil = $this->users_model->make_checkPerfil($name);

                        if ($checkPerfil == false){
                            message_error('Esse nome já existe. Por favor escolha outro nome para concluir a alteração.');
                            redirect('users/updateProfile/'.$idProfile);
                        }else{

                        $this->users_model->make_updateProfile($name,$idProfile);

                        message_success('Perfil atualizado com sucesso');
                        redirect('users/updateProfile/'.$idProfile);
                        }
                    }
                }
                
                public function removeProfile($idProfile){
                    
                    $this->users_model->make_removeProfile($idProfile);
                    
                    message_success('Perfil removido com sucesso');
                    redirect('users/listProfiles');
                    
                }
                
                
                //  ----- USERS ----------
                
                
                public function register(){
                    
                    $profiles = $this->users_model->get_profiles();
                    
                    $data['profiles'] = $profiles;
                    
                    $this->load->view('default/top');
                    $this->load->view('users/register', $data);
                    $this->load->view('footer');
                                        
                }
                
                public function make_register(){
                    
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $cpf = $this->input->post('cpf');
                    $username = $this->input->post('email');
                    
                    if (empty($name) || empty($email) || empty($password) || empty($cpf)){
                        message_error('Todos os campos orbigatoriamente devem ser preenchidos');
                        redirect('users/register');
                    }
                    
                    $checkUser = $this->users_model->make_checkUser($cpf,$username);
            
                    if ($checkUser == true){
                        message_error('Perfil já cadastrado, escolha outro nome para concluir o cadastro.');
                        redirect('users/register');
                    }else{
                    
                    $idProfile = $this->input->post('idProfile');
                    $date = date('Y-m-d');
                    
                    $this->users_model->make_register($name,$password,$email,$username,$cpf,$idProfile,$date);
                    
                    message_success('Usuário cadastrado com sucesso');
                    redirect('users/register');
                    }
                }
                
                public function listUsers(){
                    
                    $users = $this->users_model->get_users();
                    
                    $data['users'] = $users;
                    
                    $this->load->view('default/top');
                    $this->load->view('users/listUsers', $data);
                    $this->load->view('footer');
                }
                
                public function updateUser(){
                    
                    $idUser = $this->session->userdata('id');
                    
                    $user = $this->users_model->get_user_by_id($idUser);
                    
                    $data['user'] = $user;
                    
                    $this->load->view('default/top');
                    $this->load->view('users/updateUser', $data);
                    $this->load->view('footer');
                    
                }
                
                public function make_updateUser(){
                    
                    $name = $this->input->post('name');
                    $idUser = $this->session->userdata('id');
                    
                    $user = $this->users_model->get_user_by_id($idUser);
                    
                    if ($user->name == $name){
                        
                        message_error('Usuário com o mesmo nome do atual'); 
                        redirect('users/updateUser/');
                    }else{

                        $this->users_model->make_updateUserName($name,$idUser);
                    
                        message_success('Perfil atualizado com sucesso');
                        redirect('users/updateUser/');
                        
                    }
                }
                
                public function updateCheckPassword(){
                    
                    $this->load->view('default/top');
                    $this->load->view('users/updateCheckPassword');
                    $this->load->view('footer');
                    
                }
                
                public function make_updateCheckPassword(){
                    
                    $idUser = $this->session->userdata('id');
                    
                    $password = $this->input->post('password');
                  
                    $checkSecurity = $this->users_model->make_checkSecurity($password,$idUser);
                    
                    if ($checkSecurity == false){
                        message_error("Senha incorreta. Clique aqui para esquece sua senha");
                        redirect('users/updateCheckPassword/'.$idUser);
                    }
                    
                    message_success("Senha conferida");
                    redirect('users/updatePassword');
                    
                    
                }
                
                public function updatePassword(){
                    
                    $idUser = $this->session->userdata('id');
                    
                    $user = $this->users_model->get_user_by_id($idUser);
                    
                    $data['user'] = $user;
                    
                    $this->load->view('default/top');
                    $this->load->view('users/updatePassword', $data);
                    $this->load->view('footer');
                    
                }
                
                public function make_updatePassword(){
                    
                    $idUser = $this->session->userdata('id');
                    
                    $password = $this->input->post('password');
                    
                    $this->users_model->make_updatePassword($password,$idUser);
                    
                    message_success("Senha alterada com sucesso");
                    redirect('users/updatePassword/');
                    
                }

                public function removeUser($idUser){
                    
                    $this->users_model->make_removeUser($idUser);
                    
                    message_success('Usuário removido com sucesso');
                    redirect('users/listUsers');
                    
                }
}