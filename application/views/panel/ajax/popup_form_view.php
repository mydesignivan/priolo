<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
<?php }?>

<form id="form1" action="" method="post">
    <div class="row">
        <label for="txtName" class="label-medium">*Nombre:</label>
        <div class="float-left"><input type="text" name="txtName" id="txtName" class="input-small2 validate" value="<?//=@$info['name']?>" /></div>
    </div>

    <div class="row">
        <label for="txtName" class="label-medium">Categor&iacute;a padre:</label>
        <?=form_dropdown('cboParentCat', $comboCategories, @$info['categories_id'], 'id="cboParentCat" class="float-left"');?>
    </div>

    <input type="hidden" name="categories_id" value="<?//=@$info['obra_id']?>" />
</form>


<div class="row">
    <center>
        <button type="button" onclick="Categories.save()">Guardar</button>
        <button type="button" class="win-close-btn">Cancelar</button>
    </center>
</div>
