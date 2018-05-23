<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_categoryDriveName()')){

    function get_categoryDriveName($idCategoryDrive){
        
                $CI =& get_instance();

                $CI->load->model('drive_model');
                
                $categoryDrive = $CI->drive_model->get_categoryDrive($idCategoryDrive);
                
                echo $categoryDrive->name;
    }
    }
    
    
    if (!function_exists('get_totalFiles_by_envelops()')){

    function get_totalFiles_by_envelops($idEnvelop){
        
                $CI =& get_instance();

                $CI->load->model('drive_model');
                
                $totalFilesByEnvelop = $CI->drive_model->get_totalFiles_by_envelops($idEnvelop);
                
                echo $totalFilesByEnvelop->totalFiles;
    }
    }
    
    if (!function_exists('make_showUploads()')){

    function make_showUploads($fieldCod,$fieldName,$idEnvelop,$idDrive){
        
                $CI =& get_instance();

                $CI->load->model('drive_model');
                
                $fields = $CI->drive_model->get_fieldsDrive($idDrive);
                
                $fieldConcatenate = $fieldCod.$idEnvelop;
                
                $checkFiled = $CI->drive_model->make_checkField($fieldConcatenate);
                
                if ($checkFiled == true){
                    
                    $upload = $CI->drive_model->get_uploads_by_ref($fieldConcatenate);
                    
                    ?> <div class="col-md-4"> <?php echo $upload->ref_link?>  </div> <div class="col-md-6"></div> <div class="col-md-1"> <a href="<?php echo base_url('drive/removeUpload/'.$upload->ref_link.'/'.$idEnvelop.'/'.$idDrive); ?>"> <button style="width: 100px;" type="button" class="btn btn-danger"><i class="material-icons">delete</i></button></a> </div> <div class="col-md-1"><a href="<?php echo base_url('drive/download/'.$upload->ref_link); ?>"> <button style="width: 100px;" type="button" class="btn btn-default"><i class="material-icons">file_download</i></button></a></div><?php ;
                    echo "<br /><br />";
                    
                }else{
                    echo $fieldName.':';
                    ?> <input type="file" class="form-control" name="<?php echo $fieldCod ?>" />
                    <input type="hidden"  class="form-control" name="idDrive" value="<?php echo $idDrive; ?>" />
                    <br />
 <?php
                }
                }
                
                
                
                //$totalFilesByEnvelop = $CI->drive_model->get_totalFiles_by_envelops($idEnvelop);
                
                //echo $totalFilesByEnvelop->totalFiles;
    }
    