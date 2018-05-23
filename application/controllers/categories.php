<?php
class Categories extends CI_Controller {

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
                
                
                
                public function register(){
                    
                    $this->load->view('default/top');
                    $this->load->view('categories/register');
                    $this->load->view('footer');
                                        
                }
                
                public function make_register(){
                    
                    $name = $this->input->post('name');
                    $description = $this->input->post('description');
                    
                    $checkName = $this->categories_model->make_checkCategoryName($name);
                    
                    if ($checkName == true){
                        
                        message_error("Categoria já cadastrada, por favor escolha outro nome para cadastro");
                        redirect('categories/register');
                        
                    }
                    
                    $this->categories_model->make_registerCategory($name,$description);
                    
                    message_success('Categoria cadastrada com sucesso');
                    redirect('categories/register');
                                        
                }
                
                public function listCategories(){
                    
                    
                    $categories = $this->categories_model->get_categories();
                    
                    $data['categories'] = $categories;
                    
                    $this->load->view('default/top');
                    $this->load->view('categories/listCategories', $data);
                    $this->load->view('footer');
                    
                }
                
                public function removeCategory($idCategory){
                    
                    $this->categories_model->make_removeCategory($idCategory);
                    
                    $drives = $this->categories_model->get_drives_by_id($idCategory);
                    
                    foreach ($drives as $drive){
                        
                        $envelops = $this->categories_model->get_envelops_by_id($drive->id);
                        
                        foreach ($envelops as $envelop){
                            
                            $this->categories_model->make_removeUploads_by_idEnvelop($envelop->id);
                            
                        }
                        $this->categories_model->make_removeEnvelops_by_idDrive($drive->id);
                        
                    }
                    $this->categories_model->make_removeDrive_by_idCategory($idCategory);
                    
                    message_success('Categoria removida com sucesso');
                    redirect('categories/listCategories');
                    
                }
                
                
                
}
 
