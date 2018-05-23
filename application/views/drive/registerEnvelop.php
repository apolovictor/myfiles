<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Drive <?php echo $drive->name; ?> | Cadastrar Envelope</h4>
    </div>
    
    <div class="row">
        <form method="post" action="<?php echo base_url('drive/make_registerEnvelop'); ?>" enctype="multipart/form-data">
            <div class="col-sm-6">
                <h5>Nome do Envelope:</h5>
                    <input class="form-control" name="envelopName" type="text" placeholder="Digite o nome do Envelope">
            </div>
            <div class="col-sm-6">
                    
                    <h5>CPF do Envelope:</h5>
                    <input class="form-control" name="envelopCpf" type="text" placeholder="Digite o CPF do Envelope">
            </div>
            <br /><br /><br /><br /><br />
            <div class="col-sm-12">
                <div class="titlePage">
                    <h4 class="text-left">Uploads do Envelope</h4>
                </div>
                
                <?php foreach ($fields as $field){ ?>
                <h5><?php echo $field->field; ?></h5>
                <input type="file" name="<?php echo $field->cod; ?>" class="form-control" />
                <?php } ?>
                <input type="hidden" name="idDrive" value="<?php echo $drive->id; ?>" />
            <div class="buttonDiv"><input class="btn btn-success" type="submit" value="Cadastrar" /></div>
            </div>
            
            
        </form>
    </div>
    
</div>