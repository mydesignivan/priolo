<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
<?php }?>

<?php $action = isset($info) ? 'edit' : 'create';?>

<form id="form1" action="<?=site_url('panel/products/'.$action)?>" method="post" enctype="multipart/form-data" onsubmit="return Products.save()">
    <div class="row">
        <label for="txtName" class="label-contact">*Producto:</label>
        <div class="float-left"><textarea name="txtName" id="txtName" class="textarea-small validate float-left" rows="10" cols="22"><?=@$info['product_name']?></textarea></div>
    </div>
    <div class="row">
        <label for="cboCategories" class="label-contact">*Categor&iacute;a:</label>
        <div class="float-left">
            <?=form_dropdown('cboCategories', $comboCategories, @$info['categories_id']."_".@$info['level'], 'id="cboCategories" class="validate float-left"');?>
        </div>
    </div>

    <!--<div class="row">
        <label for="txtName" class="label-contact">*A&ntilde;adir:</label>
        <div class="float-left">
            <label><input type="radio" name="optOrder" value="last" checked /> Al final</label><br />
            <label><input type="radio" name="optOrder" value="first" /> Al principio<br /></label>
            <label><input type="radio" name="optOrder" value="after" /> Despues de</label>
            <?//=form_dropdown('cboOrderAfter', $comboProducts, 0, 'style="width:250px" onchange="$(\'#form1\')[0].optOrder[2].checked=true"');?>
        </div>
    </div>-->
    
    <?php if( isset($info) ){?>
    <div class="row">
        <label for="txtUploadFile" class="label-contact float-left">*Im&aacute;gen:</label>
        <a href="<?=UPLOAD_DIR_PRODUCTS.$info['image']?>" class="float-left jq-fancybox" rel="group"><img src="<?=UPLOAD_DIR_PRODUCTS.$info['thumb'];?>" alt="<?=$info['thumb'];?>" width="<?=$info['thumb_width'];?>" height="<?=$info['thumb_height'];?>" /></a>
    </div>    
    <?php }?>

    <div class="row">
        <label for="txtUploadFile" class="label-contact float-left"><?=isset($info) ? "&nbsp;" : "*Im&aacute;gen:";?></label>
        <div class="float-left"><input type="file" size="22" name="txtUploadFile" id="txtUploadFile" class="validate float-left" /></div>
    </div>

    <input type="hidden" name="products_id" id="products_id" value="<?=@$info['products_id']?>" />

    <div class="row prepend-top">
        <br />
        <center><button type="submit" id="btnSave">Guardar</button><img id="ajax-loader2" src="images/ajax-loader2.gif" alt="" width="32" height="32" class="hide" /></center>
    </div>
</form>



<script type="text/javascript">
<!--
    Products.initializer({
        mode   : '<?=$action?>',
        status : '<?=$this->session->flashdata('status')?>'
    });
-->
</script>