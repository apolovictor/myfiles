<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('validate_cpf'))
{
            function validate_cpf($cpf2 = null) {

                // Verifica se um número foi informado
                if (empty($cpf2)) {
                        return false;
                }

                // Elimina possivel mascara
                $cpf = preg_replace('[^0-9]', '', $cpf2);
                $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

                // Verifica se o numero de digitos informados é igual a 11 
                if (strlen($cpf) != 11) {
                        return false;
                }
                // Verifica se nenhuma das sequências invalidas abaixo 
                // foi digitada. Caso afirmativo, retorna falso
                else if ($cpf == '00000000000' ||
                        $cpf == '11111111111' ||
                        $cpf == '22222222222' ||
                        $cpf == '33333333333' ||
                        $cpf == '44444444444' ||
                        $cpf == '55555555555' ||
                        $cpf == '66666666666' ||
                        $cpf == '77777777777' ||
                        $cpf == '88888888888' ||
                        $cpf == '99999999999') {
                        return false;
                        // Calcula os digitos verificadores para verificar se o
                        // CPF é válido
                } else {

                        for ($t = 9; $t < 11; $t++) {

                                for ($d = 0, $c = 0; $c < $t; $c++) {
                                        $d += $cpf{$c} * (($t + 1) - $c);
                                }
                                $d = ((10 * $d) % 11) % 10;
                                if ($cpf{$c} != $d) {
                                        return false;
                                }
                        }

                        return true;
                }
        }
}

if ( ! function_exists('verify_level'))
{
        function verify_level($level, $redirect = true) {
                $CI =& get_instance();
                $CI->load->model('user_model');
           
                $idUserStatus = $CI->session->userdata('status');
                $idUser = $CI->session->userdata('id');
                $system = 1;
                
                $verify = $CI->user_model->verify_level($idUserStatus, $system,$level);
                
                if($verify){
                    if($redirect){
                      $registerLog = $CI->user_model->registerLog($idUser, $system,$level);  
                    }
                    return true;
                    //return $verify[0]->;
                }else if($redirect){
                    msg_register('Você não tem permissão para acessar!', 'error');
                    redirect ('home/homeAuth');
                }else
                    return false;
                    
        }
}