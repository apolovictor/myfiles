<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Home extends CI_Controller {

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
        
        
	public function index()	{
            
           // $products = $this->products_model->get_products();
                        
            //$data['products'] = $products;
                                    
            $this->load->view('default/top');
            $this->load->view('index');
            //$this->load->view('index', $data);
            $this->load->view('footer');
                           
            
	}
        
        
        
        
        
                  
                  
                  public function verifyAuth(){
                          $this->load->model('auth_model');
                          $auth = $this->auth_model->verify($this->session->userdata('username'),$this->session->userdata('name'));
                          $auth = md5($auth[0]->name.$auth[0]->username);
                          
                          if($auth != $this->session->userdata('auth')){
                                $this->message->error('Acesso negado. Por favor se autentique no sistema.');
                                redirect();
                          }else{
                                  return true;
                          }
                          
                  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
