<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Envelope | Editar</h4>
    </div>
    
    <div class="row">
        <form method="post" action="<?php echo base_url('drive/make_updateUploads_of_idEnvelop'); ?>" enctype="multipart/form-data">
            <div class="col-sm-12">
                <input type="hidden" name="idEnvelop" value="<?php echo $envelop->id; ?>" />
                <h5>Nome do Envelope:</h5>
                <input class="form-control" name="name" type="text" value="<?php echo $envelop->name ?>" placeholder="Digite o nome do Drive">
                <br />
                <h5><b>Arquivos</b></h5>
                
               
                <?php 
                    foreach ($fields as $field){

                        make_showUploads($field->cod,$field->field,$envelop->id,$envelop->id_drive);
                        
                        //$fileName = str_replace(array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'), '', $upload->ref);
                    
                    //if ($field->cod == $fileName){
                      //  echo $field->cod.' - '.$fileName;
                      
                    //}
                        ?><!--  <input type="file" class="form-control" name="<?php //echo $field->cod ?>" /> --> <?php
                    
                }
                
                ?>
                
                
                        
                <div class="buttonDiv"><input class="btn btn-success" type="submit" value="Salvar" /></div>
            </div>
        </form>
    </div>
    
</div>