<?php

if (!function_exists('verifyAuth')) {

    function verifyAuth(){
                    $CI =& get_instance();
            
                if(!$CI->session->userdata('auth')){
                      $CI->message->error('Acesso negado. Por favor se autentique no sistema.');
                      redirect();  
                }
                
                $CI->load->model('auth_model');
                
                $auth = $CI->auth_model->verify($CI->session->userdata('username'),$CI->session->userdata('name'));
                $auth = md5($auth[0]->name.$auth[0]->username);

                if($auth != $CI->session->userdata('auth')){
                      $CI->message->error('Acesso negado. Por favor se autentique no sistema.');
                      redirect();
                }else{
                        return true;
                }

}
}




if (!function_exists('print_statusEnroll')) {

    function print_statusEnroll($code){
                $CI =& get_instance();

                switch ($code){
                        case "4":
                                echo '<span style="color:blue;"> - TRANCADO</span>';
                        break;
                        case "5":
                                echo '<span style="color:#B8860B;"> - DESISTÊNCIA</span>';
                        break;
                        case "6":
                                echo '<span style="color:red;"> - ABANDONO</span>';
                        break;
                        default :
                        break;
                }
    }
}

if (!function_exists('print_statusEnroll2')) {
        
function print_statusEnroll2($code){
                $CI =& get_instance();

                switch ($code){
                        case "4":
                                return ' - TRANCADO';
                        break;
                        case "5":
                                return ' - DESISTÊNCIA';
                        break;
                        case "6":
                                return ' - ABANDONO';
                        break;
                        default :
                        break;
                }
    }
}


if (!function_exists('get_statusEnroll')) {

    function get_statusEnroll($id_student,$id_course){
                $CI =& get_instance();
                $CI->load->model('course_model');
                
                $status = $CI->course_model->get_statusEnroll($id_student,$id_course);
                
                return $status->status;
    }
}


if (!function_exists('get_statusClasse')) {

    function get_statusClasse($id_student,$id_bookClass,$dateFrequency){
                $CI =& get_instance();
                $CI->load->model('course_model');
                
                $status = $CI->course_model->get_statusClasse($id_student,$id_bookClass,$dateFrequency);
                
                if(empty($status)){
                    return ' - ';
                }else{
                    return $status->status;
                }                
    }
}


if (!function_exists('get_student_by_id')) {

    function get_student_by_id($id_student){
                $CI =& get_instance();
                $CI->load->model('student_model');
                
                $student = $CI->student_model->get_student($id_student);
                
                return $student[0];
        }
}


if (!function_exists('get_course_by_id')) {

    function get_course_by_id($id_course){
                $CI =& get_instance();
                $CI->load->model('course_model');
                
                $course = $CI->course_model->get_course($id_course);
                
                return $course[0];
        }
}

if (!function_exists('infoEnrollFull_by_category')) {

    function infoEnrollFull_by_category($id_student,$category){
        $CI =& get_instance();
        $CI->load->model('course_model');
        
        $info = $CI->course_model->infoEnrollFull_by_category($id_student,$category);
        
        return $info;
        }
}

if (!function_exists('get_bookClass')) {

    function get_bookClass($id_bookClass){
        $CI =& get_instance();
        $CI->load->model('course_model');
        
        $info = $CI->course_model->get_book($id_bookClass);
        
        return $info;
        }
}

if (!function_exists('get_noteStudent_by_bookClass')) {

    function get_noteStudent_by_bookClass($id_bookClass,$id_student){
        $CI =& get_instance();
        $CI->load->model('course_model');
        
        $notes = $CI->course_model->get_noteStudent_by_bookClass($id_bookClass,$id_student);
        
        return $notes;
        }
}

if (!function_exists('check_idCertified')) {

    function check_idCertified($id_student,$id_category){
        $CI =& get_instance();
        $CI->load->model('course_model');
        
        $certified = $CI->course_model->check_certified($id_student,$id_category);
        
        return $certified;
        }
}


if (!function_exists('get_infoBookCertified')) {

    function get_infoBookCertified(){
        $CI =& get_instance();
        $infoBookCertified = $CI->course_model->get_infoBookCertified();
        
        return $infoBookCertified;
    }
}

if (!function_exists('get_dataUser_by_id')) {

    function get_dataUser_by_id($id){
        $CI =& get_instance();
        $CI->load->model('user_model');
        $dataUser = $CI->user_model->get_user($id);
        
        return $dataUser;
    }
}













if (!function_exists('verify_button_logout')) {

    function verify_button_logout(){
        $CI =& get_instance();
        
        $logged = $CI->session->userdata('auth');

        if (!isset($logged) || $logged != true)
            return false;
        else
            return true;
    }

}

if (!function_exists('verify_home_auth')) {

    function verify_home_auth(){
        $CI =& get_instance();
        
        $logged = $CI->session->userdata('auth');

        if (!isset($logged) || $logged != true)
            return false;
        else
            redirect(base_url().'sms/home');
    }

}

if (!function_exists('verify_info_sms')) {

    function verify_info_sms($phonenumber,$textmsg){
        $CI =& get_instance();
        
        if(!is_numeric($phonenumber) || strlen($phonenumber) < 10){
            $message = array('type'=>'error','text'=>'Os numeros de telefones que deseja enviar mensagem deve conter apenas numeros.');
            $CI->session->set_flashdata('message', $message);
            
            $fields_tmp = array('phonenumber' => $phonenumber, 'textmsg' => $textmsg);
            $CI->session->set_flashdata('fields_tmp', $fields_tmp);

            redirect(base_url().'sms/home');
        }
        
        if(strlen($textmsg) > 165){
            $message = array('type'=>'error','text'=>'A mensagem pode conter no maximo 165 caracteres.');
            $CI->session->set_flashdata('message', $message);
            
            $fields_tmp = array('phonenumber' => $phonenumber, 'textmsg' => $textmsg);
            $CI->session->set_flashdata('fields_tmp', $fields_tmp);

            redirect(base_url().'sms/home');
        }
        
    }

}

if (!function_exists('paginacao')) {

    function paginacao($result){
        $paginas = ceil($result / 5);
        
        return $paginas;
    }

}

if (!function_exists('formata_data')) {

    function formata_data($data){
        $data = explode("-",$data);
        
        $nova_data = $data[2].'.'.$data[1].'.'.$data[0];
        
        return $nova_data;
    }

}

if (!function_exists('paginacao_default')) {
    
    function paginacao_default($limit,$qtd_vagas){
        if($limit == 5){
            $paginacao['link_ant'] = 'link_notpagination';
            $paginacao['ant'] = '#';
        }else{
            $paginacao['link_ant'] = 'link_pagination';
            $paginacao['ant'] = $limit - 5;
        }
        
        if($limit < $qtd_vagas){
            $paginacao['link_prox'] = 'link_pagination';
            $paginacao['prox'] = $limit + 5;
        }else{
            $paginacao['link_prox'] = 'link_notpagination';
            $paginacao['prox'] = '#';
        }
        
        return $paginacao;
    }

}

if (!function_exists('msg_register_error')) {

    function msg_register_error($data){
        $text = '<img src="'.base_url('others/img/error_icon.jpg').'"><br /><br />';
        $text .= $data;
                      
        echo $text;
    }

}

if (!function_exists('msg_register_sucess')) {

    function msg_register_sucess($data){
        $text = '<img src="'.base_url('others/img/sucess_icon.jpg').'"><br /><br />';
        $text .= $data;
                      
        echo $text;
    }

}

if (!function_exists('msg_register')) {

    function msg_register($data,$type){
        $CI =& get_instance();
        if($type == 'error'){
            $text = '<img src="'.base_url('others/img/error_icon.jpg').'"><br /><br />';
        }else{
            $text = '<img src="'.base_url('others/img/sucess_icon.jpg').'"><br /><br />';
        }
        $text .= $data;
      
        $message = array('message' => array('data' => $text, 'type' => $type));
            
        $CI->session->set_userdata($message);
        
        return true;
        
    }

}

if (!function_exists('msg_register_sucess2')) {

    function msg_register_sucess2($data){
        $text = '<img src="'.base_url('others/img/sucess_icon.jpg').'"><br /><br />';
        $text .= $data;
                      
        echo $text;
    }

}