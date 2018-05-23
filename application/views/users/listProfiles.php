<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Perfil | Listar Perfis</h4>
    </div>
    
    <div class="row">
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </thead>
                <tbody>
                    <tr>
                        <?php if (isset($profiles)){
                        foreach ($profiles as $profile){ ?>
                        <td>
                            <?php echo $profile->id; ?>
                        </td>
                        <td>
                            <?php echo $profile->name; ?>
                        </td>                        
                        <td style="width: 100px;"><a href="<?php echo base_url('users/updateProfile/'.$profile->id); ?>"> <button style="width: 100px;" type="button" class="btn btn-primary"><i class="material-icons">mode_edit</i></button></a></td>
                        <td style="width: 100px;"><a href="<?php echo base_url('users/removeProfile/'.$profile->id); ?>"> <button style="width: 100px;" type="button" class="btn btn-danger"><i class="material-icons">delete_forever</i></button></a></td>
                    </tr>
                        <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>

    