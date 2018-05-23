<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_nameProfile()')){

    function get_nameProfile($idProfile){
        
                $CI =& get_instance();

                $CI->load->model('users_model');
                
                $nameProfile = $CI->users_model->get_nameProfile($idProfile);
                
                echo $nameProfile->name;
    }
    }