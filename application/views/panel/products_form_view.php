<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
<?php }?>

<?php $action = isset($info) ? 'edit' : 'create';?>

<form id="form1" action="<?=site_url('panel/products/'.$action)?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <label for="txtName" class="label-contact">*Producto:</label>
        <div class="float-left"><input type="text" name="txtName" id="txtName" class="input-contact validate" value="<?=@$info['product_name']?>" /></div>
    </div>
    <div class="row">
        <label for="cboCategories" class="label-contact">*Categor&iacute;a:</label>
        <div class="float-left">
            <?=form_dropdown('cboCategories', $listCategories, @$info['categories_id'], 'id="cboCategories" class="validate float-left"');?>
        </div>
    </div>
    
    <?php if( isset($info) ){?>
    <div class="row">
        <label for="txtUploadFile" class="label-contact float-left">*Im&aacute;gen:</label>
        <img src="<?=UPLOAD_DIR_PRODUCTS.$info['thumb'];?>" alt="<?=$info['thumb'];?>" width="<?=$info['thumb_width'];?>" height="<?=$info['thumb_height'];?>" class="float-left" />
    </div>    
    <?php }?>

    <div class="row">
        <label for="txtUploadFile" class="label-contact float-left"><?=isset($info) ? "&nbsp;" : "*Im&aacute;gen:";?></label>
        <div class="float-left"><input type="file" size="22" name="txtUploadFile" id="txtUploadFile" class="validate float-left" /></div>
    </div>

    <input type="hidden" name="products_id" id="products_id" value="<?=@$info['products_id']?>" />
</form>


<div class="row prepend-top">
    <br />
    <center><button type="button" onclick="Products.save(this)">Guardar</button><img id="ajax-loader2" src="images/ajax-loader2.gif" alt="" width="32" height="32" class="hide" /></center>
</div>


<script type="text/javascript">
<!--
    Products.initializer({
        mode   : '<?=isset($info) ? 'edit' : 'create'?>',
        status : '<?=$this->session->flashdata('status')?>'
    });
-->
</script>