<div class="container-fluid">
    <div class="titlePage">
        <h4 class="text-left">Usuário | Editar Senha</h4>
    </div>

        <div class="row">
            <form method="post" action="<?php echo base_url('users/make_updateCheckPassword'); ?>" enctype="multipart/form-data">
                <div class="col-sm-12">
                    <h5>Senha:</h5>
                    <input class="form-control" name="password" type="password" placeholder="Digite a sua senha atual">
                    
                    <div class="buttonDiv"><input class="btn btn-success" type="submit" value="Enviar" /></div>
                </div>
            </form>
        </div>
</div>