<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_studentName()')){

    function get_studentName($idStudent){
        
                $CI =& get_instance();

                $CI->load->model('parents_model');
                
                $studentName = $CI->parents_model->get_student_by_id($idStudent,$CI->session->userdata('id'));
                
                echo $studentName->name;
    }
    }