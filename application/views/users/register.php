<div class="container-fluid">
    <div class="titlePage">
        <h4 class="text-left">Usuários | Cadastrar</h4>
    </div>
    
    <div class="row">
        <form method="post" action="<?php echo base_url('users/make_register'); ?>" enctype="multipart/form-data">
            <div class="col-sm-12">
                <h5>Nome:</h5>
                    <input class="form-control" name="name" type="text" placeholder="Digite o nome do usuário">
                <h5>E-mail:</h5>
                    <input class="form-control" name="email" type="text" placeholder="Digite o e-mail do usuário">
                <h5>Senha:</h5>
                    <input class="form-control" name="password" type="text" placeholder="Digite a senha do usuário">
                <h5>Cpf:</h5>
                    <input class="form-control" name="cpf" type="text" placeholder="Digite o cpf do usuário">
                    
                    <br />
                    <h5>Perfil:</h5>
                    <select class="form-control" name="idProfile">
                        <?php foreach ($profiles as $profile){ ?>
                        <option value="<?php echo $profile->id ?>" ><?php echo $profile->name; ?></option>
                        <?php } ?>
                    </select>
                
                <div class="buttonDiv"><input class="btn btn-success" type="submit" value="Cadastrar" /></div>
            </div>
        </form>
    </div>
</div>