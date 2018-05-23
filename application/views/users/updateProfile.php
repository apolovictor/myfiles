<div class="container-fluid">
    <div class="titlePage">
        <h4 class="text-left">Perfil | Editar</h4>
    </div>

        <div class="row">
            <form method="post" action="<?php echo base_url('users/make_updateProfile'); ?>" enctype="multipart/form-data">
                <div class="col-sm-12">
                    <h5>Nome:</h5>
                    <input class="form-control" name="name" type="text" value="<?php echo $profile->name; ?>" placeholder="Digite o nome do Drive">

                    <input type="hidden" name="idProfile" value="<?php echo $profile->id; ?>" />
                    <div class="buttonDiv"><input class="btn btn-success" type="submit" value="Salvar" /></div>
                </div>
            </form>
        </div>
</div>