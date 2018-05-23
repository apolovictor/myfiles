<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message extends CI_Loader {

    public function __construct() {

        $this->CI = & get_instance();
        log_message('debug', 'seng Lib Initialized');
    }
    
    public function error($message = ''){
        $this->CI->session->set_flashdata('message',array("type"=>"error","msg"=>$message));
    }
    
    public function success($message = ''){
        $this->CI->session->set_flashdata('message',array("type"=>"success","msg"=>$message));
    }
    
    public function viewMessage(){
        $msg = '';
        
//        if($message = $this->CI->session->flashdata('message')){
//            switch($message['type']){
//                case "sucess":
//                    $msg = '
//                        <div class="sucess">
//                            <div class="iconSucess"></div>
//                            <div class="textSucess">'.$message['msg'].'</div>
//                            <div class="clean"></div>
//                        </div>';
//                break;
//                case "error":
//                    $msg = '<div class="error">
//                                <div class="iconError"></div>
//                                <div class="textError">'.$message['msg'].'</div>
//                                <div class="clean"></div>
//                            </div>';
//                break;
//            }
//            
//            return $msg;
//        }else{
//            return $msg;
//        }
        
        $message = $this->CI->session->flashdata('message');
        
        return $message;
        
    }
    
    
}