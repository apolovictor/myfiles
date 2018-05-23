<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Categoria | Cadastrar</h4>
    </div>
    
    <div class="row">
        <form method="post" action="<?php echo base_url('categories/make_register'); ?>" enctype="multipart/form-data">
            <div class="col-sm-12">
                <h5>Nome da categoria:</h5>
                    <input class="form-control" name="name" type="text" placeholder="Digite o nome da Categoria">
                
                <h5>Descrição:</h5>
                    <textarea class="form-control" name="description" rows="5"></textarea> 
                
                <div class="buttonDiv"><input class="btn btn-success" type="submit" value="Cadastrar" /></div>
            </div>
        </form>
    </div>
    
</div>