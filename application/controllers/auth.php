<?php
class Auth extends CI_Controller {

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



        public function login(){
            
            $this->load->view('default/top');
            $this->load->view('auth/login');
            $this->load->view('footer');
            
        }
        
        public function make_auth(){
                  
                      
                        $username = $this->input->post('username');
                        $name = $this->input->post('name');
                        $password = '';
                        $password = ($this->input->post('password'));
                        
                        $user = $this->auth_model->make_auth($username, $password);
                                                
                        if($user){
                            $auth = array(
                            'id' => $user[0]->id,
                            'name' => $user[0]->name,
                            'email' => $user[0]->email,
                            'id_profile' => $user[0]->id_profile,
                            'auth' => md5($user[0]->name.$user[0]->email),
                            'status' => $user[0]->status);
                              
                            $this->session->set_userdata($auth);
                            
                            //$date = date('Y-m-d');
                            
                            //$this->auth_model->make_registerLastAccess($this->session->userdata('id'),$date);
                            
                            
                            redirect(base_url('drive/listMyDrives'));
                                
                        }else{
                                $this->message->error('Usuário ou senha estão incorretos.');
                                redirect(base_url('auth/login'));
                        }
                  }

        public function logout(){
                          
            //verifyAuth();

            $auth = array(
                'id' => '',
                'name' => '',
                'username' => '',
                'auth' => '');

            //unset_userdata($auth);

            $this->session->set_userdata($auth);

            $this->session->sess_destroy();

            redirect();
        }
        
        
}