<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('format_dateEN'))
{
        function format_dateEN($date) {
                $date = explode('/',$date);
                $date = $date[2].'-'.$date[1].'-'.$date[0];
                
                return $date;
        }        
}

if ( ! function_exists('format_dateBR'))
{
        function format_dateBR($date) {
                $date = explode('-',$date);
                $date = $date[2].'/'.$date[1].'/'.$date[0];
                
                return $date;
        }
}

if ( ! function_exists('format_month'))
{
        function format_month($month) {
                switch ($month){
                        case "1":
                                return 'Janeiro';
                        break;
                case "2":
                                return 'Fevereiro';
                        break;
                case "3":
                                return 'Março';
                        break;
                case "4":
                                return 'Abril';
                        break;
                case "5":
                                return 'Maio';
                        break;
                case "6":
                                return 'Junho';
                        break;
                case "7":
                                return 'Julho';
                        break;
                case "8":
                                return 'Agosto';
                        break;
                case "9":
                                return 'Setembro';
                        break;
                case "10":
                                return 'Outubro';
                        break;
                case "11":
                                return 'Novembro';
                        break;
                case "12":
                                return 'Dezembro';
                        break;
                }
                
        }
}