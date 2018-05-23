<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Drives | Meus Drives</h4>
    </div>
    
    <div class="row">
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Acessar</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </thead>
                <tbody>
                    <tr>
                        <?php if (isset($drives)){
                        foreach ($drives as $drive){ ?>
                        <td>
                            <?php echo $drive->id; ?>
                        </td>
                        <td>
                            <?php echo $drive->name; ?>
                        </td>
                        <td>
                            <?php get_categoryDriveName($drive->id_category); ?>
                        </td>
                        <td style="width: 100px;"><a href="<?php echo base_url('drive/driveIndex/'.$drive->id); ?>"> <button style="width: 100px;" type="button" class="btn btn-success"><i class="material-icons">folder_open</i></button></a></td>
                        <td style="width: 100px;"><a href="#"> <button style="width: 100px;" type="button" class="btn btn-primary"><i class="material-icons">mode_edit</i></button></a></td>
                        <td style="width: 100px;"><a href="<?php echo base_url('drive/removeDrive/'.$drive->id.'/'.$drive->id_category); ?>"> <button style="width: 100px;" type="button" class="btn btn-danger"><i class="material-icons">delete_forever</i></button></a></td>
                    </tr>
                        <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>

    