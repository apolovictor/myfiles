<div class="container-fluid">
    
    <div class="titlePage">
        <h4 class="text-left">Drive <?php echo $drive->name; ?> | Configurar</h4>
    </div>
    <form method="post" action="<?php echo base_url('drive/make_registerConfig'); ?>" enctype="multipart/form-data">
        <div class="row">

                <div class="col-sm-4">
                    <fieldset>
                    <h5>Campo:</h5>
                        <input class="form-control" name="field[]" type="text" placeholder="Digite o nome do campo">
                    <h5>Código:</h5>
                        <input class="form-control" name="cod[]" type="text" placeholder="Digite o código do drive">
                    <h5>Campo Obrigatório:</h5>
                    <input type="checkbox" name="requiredField[]" value="1" />

                    </fieldset>
                    <br />
                    <div id="configDrive">Mais campos</div>
                    <input type="hidden" name="idDrive" value="<?php echo $drive->id; ?>" />

                </div>
                
                <div class="col-sm-4">
                    <span1>
                    <h5>Perfil de Acesso:</h5>
                    <select class="form-control" name="idProfile[]">
                        <option value=""></option>
                        <?php foreach ($profiles as $profile) {?>
                        <option value="<?php echo $profile->id; ?>" ><?php echo $profile->name; ?></option>
                        <?php } ?>
                    </select>
                    </span1>
                </div>
                <div class="col-sm-4">
                    <span2>
                    <h5>Permissão do Perfil: </h5>
                    <select class="form-control" name="idLevelProfile[]" >
                        <option value=""></option>
                        <?php foreach ($levelProfiles as $levelProfile) {?>
                        <option value="<?php echo $levelProfile->id; ?>" ><?php echo $levelProfile->name; ?></option>
                        <?php } ?>
                    </select>
                    (Se vazio, não será cadastrado o perfil com a respectiva permissão. Novas permissões poderão ser cadastradas nas edições de configuração do drive)
                    </span2>
                    <br /><br />
                    <div id="configDrive2">+1 Pefil</div>
                </div>
            <br /><br />
        </div>
        <div class="row">
            <div class="col-sm-12"><div class="buttonDiv"><input class="btn btn-success" type="submit" value="Cadastrar" /></div></div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#configDrive").click(function(){
        $("fieldset").append("<h5>Campo:</h5>\n\
                                <input class='form-control' name='field[]' type='text' placeholder='Digite o nome do campo' />\n\
                              <h5>Código:</h5>\n\
                                <input class='form-control' name='cod[]' type='text' placeholder='Digite o código do drive'\n\
                              <h5>Campo Obrigatório:</h5><br />\n\
                                <input type='checkbox' name='requiredField[]' value='1' /> ");
    });
});
</script>
<script>
$(document).ready(function(){
    $("#configDrive2").click(function(){
        $("span1").append("     <br /><br /><br /><h5>Perfil de Acesso:</h5>\n\
                                <select class='form-control' name='idProfile[]'>\n\
                                <option value=''></option>\n\
                                <?php foreach ($profiles as $profile) {?> \n\
                                <option value='<?php echo $profile->id; ?>' ><?php echo $profile->name; ?></option>\n\
                                <?php } ?> \n\
                                </select>\n\
                               ");
        $("span2").append("      <h5>Permissão do Perfil:</h5>\n\
                                <select class='form-control' name='idLevelProfile[]'>\n\
                                <option value=''></option>\n\
                                <?php foreach ($levelProfiles as $levelProfile) {?> \n\
                                <option value='<?php echo $levelProfile->id; ?>' ><?php echo $levelProfile->name; ?></option>\n\
                                <?php } ?> \n\
                                </select>\n\
                                (Se vazio, não será cadastrado o perfil com a respectiva permissão. Novas permissões poderão ser cadastradas nas edições de configuração do drive)\n\
                               ");
    });
});
</script>