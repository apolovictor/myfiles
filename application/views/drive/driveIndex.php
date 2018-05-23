<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Drive <?php echo $drive->name; ?> | Envelopes | Total <?php echo $countEnvelops->totalEnvelop ?> </h4>
    </div>
    
    <div class="row">
        <div class="panel-body">
        <div class="table-responsive">
            
        <a  href="<?php echo base_url('drive/registerEnvelop/'.$drive->id); ?>"> <button  style="width: 100px; float: right; margin-bottom: 15px;" type="button" class="btn btn-success"><i class="material-icons">create_new_folder</i></button></a>
        <div class="clearBoth"></div>
            <table class="table table-hover table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cod</th>
                    <th>Arquivos anexados</th>
                    <th>Acessar/Editar</th>
                    <th>Remover</th>
                </thead>
                <tbody>
                    <tr>
                        <?php if (isset($envelopsByIdDrive)){
                        foreach ($envelopsByIdDrive as $envelop){ ?>
                        <td>
                            <?php echo $envelop->id; ?>
                        </td>
                        <td>
                            <?php echo $envelop->name; ?>
                        </td>
                        <td>
                            <?php echo $envelop->cod; ?>
                        </td>
                        <td> <?php get_totalFiles_by_envelops($envelop->id); ?></td>
                        <td style="width: 120px;"><a href="<?php echo base_url('drive/updateEnvelop/'.$envelop->id.'/'.$envelop->id_drive); ?>"> <button style="width: 120px;" type="button" class="btn btn-primary"><i class="material-icons">open_in_new</i></button></a></td>
                        <td style="width: 120px;"><a href="<?php echo base_url('drive/removeEnvelop/'.$envelop->id.'/'.$envelop->id_drive); ?>"> <button style="width: 120px;" type="button" class="btn btn-danger"><i class="material-icons">delete</i></button></a></td>
                    </tr>
                        <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>

    