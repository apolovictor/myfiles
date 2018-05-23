<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Autenticação | Login</h4>
    </div>
    
    <div class="row">
        <form method="post" action="<?php echo base_url('auth/make_auth'); ?>" enctype="multipart/form-data">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
            
            <h5>E-mail:</h5>
            <input class="form-control" name="username" type="text" placeholder="Digite o e-mail de acesso">
            
            <h5>Senha:</h5>
            <input class="form-control" name="password" type="password" placeholder="Digite a senha">
            
            <br />
            
            <input style="width: 100%;"class="btn btn-success" type="submit" value="Acessar" />
            
            </div>
           <div class="col-sm-4"></div>
            
            
        </form>
    </div>
    
</div>