<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Drive | Cadastrar</h4>
    </div>
    
    <div class="row">
        <form method="post" action="<?php echo base_url('drive/make_register'); ?>" enctype="multipart/form-data">
            <div class="col-sm-12">
                <h5>Nome do Drive:</h5>
                    <input class="form-control" name="name" type="text" placeholder="Digite o nome do Drive">
                
                    <br />
                    <h5>Nome da categoria:</h5>
                    <select class="form-control" name="idCategory">
                        <?php foreach ($categories as $category){ ?>
                        <option value="<?php echo $category->id ?>" ><?php echo $category->name; ?></option>
                        <?php } ?>
                    </select>
                
                <div class="buttonDiv"><input class="btn btn-success" type="submit" value="Cadastrar" /></div>
            </div>
        </form>
    </div>
    
</div>