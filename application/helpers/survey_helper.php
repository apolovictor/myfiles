<?php

if (!function_exists('verifyAttemptSurvey')){

    function verifyAttemptSurvey($idUser,$idSurvey){
                $CI =& get_instance();

                $CI->load->model('survey_model');
                
                $verifyAttemptSurvey = $CI->survey_model->verifyAttemptSurvey($idUser,$idSurvey);
                
                $count = count($verifyAttemptSurvey);
      

                if($count)
                    return true;
                else
                    return false;
                    
//                if(!$CI->session->userdata('auth')){
//                      $CI->message->error('Acesso negado. Por favor se autentique no sistema.');
//                      redirect();  
//                }
//                
//                $CI->load->model('auth_model');
//                
//                $auth = $CI->auth_model->verify($CI->session->userdata('username'),$CI->session->userdata('name'));
//                $auth = md5($auth[0]->name.$auth[0]->username);
//
//                if($auth != $CI->session->userdata('auth')){
//                      $CI->message->error('Acesso negado. Por favor se autentique no sistema.');
//                      redirect();
//                }else{
//                        return true;
//                }

}
}
