<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="error hide"></div>

<form id="form1" action="" method="post" onsubmit="return Categories.save()">
    <div class="row">
        <label for="txtName" class="label-medium">*Nombre:</label>
        <div class="float-left"><input type="text" name="txtName" id="txtName" class="input-small2 float-left validate" value="<?=@$info['categorie_name']?>" /></div>
    </div>

    <div class="row">
        <label for="txtName" class="label-medium">Categor&iacute;a padre:</label>
        <?=form_dropdown('cboParentCat', $comboCategories, @$info['parent_id']."_".@$info['level'], 'id="cboParentCat" class="float-left"');?>
    </div>

    <input type="hidden" name="categories_id" id="categories_id" value="<?=@$info['categories_id']?>" />

    <div class="row">
        <center>
            <button type="submit">Guardar</button>
            <button type="button" onclick="Categories.close()">Cancelar</button>
        </center>
    </div>
</form>


<div class="ajax-loader"></div>

<script type="text/javascript">
<!--
    Categories.initializer({categorie_max_level : <?=CATEGORIE_MAX_LEVEL?>});
-->
</script>
