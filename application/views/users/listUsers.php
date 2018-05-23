<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Usuário | Listar Usuários</h4>
    </div>
    
    <div class="row">
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Perfil</th>
                    <th>Editar</th>
                    <th>Senha</th>
                    <th>Remover</th>
                </thead>
                <tbody>
                    <tr>
                        <?php if (isset($users)){
                        foreach ($users as $user){ ?>
                        <td>
                            <?php echo $user->id; ?>
                        </td>
                        <td>
                            <?php echo $user->name; ?>
                        </td>
                        <td>
                            <?php get_nameProfile($user->id_profile) ?>
                        </td>
                        <td style="width: 100px;"><a href="<?php echo base_url('users/updateUser/'.$user->id); ?>"> <button style="width: 100px;" type="button" class="btn btn-primary"><i class="material-icons">mode_edit</i></button></a></td>
                        <td style="width: 100px;"><a href="<?php echo base_url('users/updateCheckPassword/'.$user->id); ?>"> <button style="width: 100px;" type="button" class="btn btn-primary"><i class="material-icons">lock</i></button></a></td>
                        <td style="width: 100px;"><a href="<?php echo base_url('users/removeUser/'.$user->id); ?>"> <button style="width: 100px;" type="button" class="btn btn-danger"><i class="material-icons">delete_forever</i></button></a></td>
                    </tr>
                        <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>

    