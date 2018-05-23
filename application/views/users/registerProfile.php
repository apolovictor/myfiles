<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Profile | Cadastrar</h4>
    </div>
    
    <div class="row">
        <form method="post" action="<?php echo base_url('users/make_registerProfile'); ?>" enctype="multipart/form-data">
            <div class="col-sm-12">
                <h5>Nome do Perfil:</h5>
                    <input class="form-control" name="name" type="text" placeholder="Digite o nome do Perfil">
                
                <div class="buttonDiv"><input class="btn btn-success" type="submit" value="Cadastrar" /></div>
            </div>
        </form>
    </div>
    
</div>