<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Categorias | Minhas Categorias</h4>
    </div>
    
    <div class="row">
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Remover</th>
                </thead>
                <tbody>
                    <tr>
                        <?php if (isset($categories)){
                        foreach ($categories as $category){ ?>
                        <td>
                            <?php echo $category->id; ?>
                        </td>
                        <td>
                            <?php echo $category->name; ?>
                        </td>
                        <td style="width: 100px;"><a href="<?php echo base_url('categories/removeCategory/'.$category->id); ?>"> <button style="width: 100px;" class="btn btn-danger"><i class="material-icons">delete_forever</i></button></a></td>
                    </tr>
                        <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>

    