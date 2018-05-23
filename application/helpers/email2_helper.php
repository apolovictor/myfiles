<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('make_email')) {

    function make_email($email, $subject, $message, $reply) {
        $CI = & get_instance();

        $result = $CI->email
                ->from('naoresponda@ozza.com.br')
                ->reply_to($reply)    // Optional, an account where a human being reads.
                ->to($email)
                ->subject($subject)
                ->message($message)
                ->send();


        //echo $this->email->print_debugger();

        return true;
    }
}
    
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('make_registerLogEmail')) {

    function make_registerLogEmail($receiver, $subject, $message) {
        
        $CI = & get_instance();
        
        $CI->load->model('auth_model');
        
        $sender = 'naoresponda@ozza.com.br';
        
        $date = date('Y-m-d : H-i-s');
        
        $message = addslashes($message);
        
        $CI->auth_model->make_registerLogEmail($receiver,$sender,$message,$subject,$date);
                
        return true;
    }
}    

