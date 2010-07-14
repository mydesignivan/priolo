<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
<?php }?>

<form id="form1" action="" method="post">
    <div class="row">
        <label for="txtName" class="label-contact">*Proveedor:</label>
        <div class="float-left"><input type="text" name="txtName" id="txtName" class="input-contact validate" value="<?=@$info['name']?>" /></div>
    </div>
    <fieldset class="gallery-panel">
        <legend>Galer&iacute;a de Im&aacute;genes</legend>

        <ul id="gallery-image" <?php if( !isset($info) || (isset($info) && count($info['gallery'])==0) ){?>class="hide"<?php }?>>
<?php if( isset($info) && count($info['gallery'])>0 ){?>
    <?php foreach( $info['gallery'] as $row ){?>
            <li>
                <a href="<?=UPLOAD_DIR_PROV.$row['image']?>" class="float-left jq-image" rel="group"><img src="<?=UPLOAD_DIR_PROV.$row['thumb']?>" alt="<?=$row['thumb']?>" width="100" height="" /></a>
                <div class="clear">
                    <a href="javascript:void(0)" class="link2 float-left jq-removeimg">Quitar</a>
                    <a href="javascript:void(0)" class="float-right handle"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                </div>
            </li>
    <?php }?>
            
<?php }else{?>
            <li>
                <a href="" class="float-left jq-image" rel="group"><img src="" alt="" width="100" height="" /></a>
                <div class="clear">
                    <a href="javascript:void(0)" class="link2 float-left jq-removeimg">Quitar</a>
                    <a href="javascript:void(0)" class="float-right handle"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                </div>
            </li>
<?php }?>
        </ul>
    </fieldset>

    <div class="row">
        <label for="txtUploadFile" class="label-contact float-left">*Im&aacute;gen:</label>
        <div class="float-left">
            <div class="float-left append-1"><input type="file" size="22" name="txtUploadFile" id="txtUploadFile" class="float-left" /></div>
            <button id="btnUpload" type="button" onclick="PictureGallery.upluad()" class="float-left">Subir</button>
            <div id="ajax-loader1" class="float-left hide">
                <img src="images/ajax-loader2.gif" alt="" width="32" height="32" class="float-left" />
                <div class="float-left" style="margin-left:5px"><small>Subiendo imagen&nbsp;</small></div>
            </div>
        </div>
    </div>

    <input type="hidden" name="proveedor_id" value="<?=@$info['proveedor_id']?>" />
    <input type="hidden" name="au_dir" value="<?=UPLOAD_DIR_PROV?>" />
    <input type="hidden" name="au_image_width" value="<?=IMAGE_ORIGINAL_WIDTH_PROV?>" />
    <input type="hidden" name="au_image_height" value="<?=IMAGE_ORIGINAL_HEIGHT_PROV?>" />
    <input type="hidden" name="au_thumb_width" value="<?=IMAGE_THUMB_WIDTH_PROV?>" />
    <input type="hidden" name="au_thumb_height" value="<?=IMAGE_THUMB_HEIGHT_PROV?>" />
    <input type="hidden" name="json" id="json" value="" />
    <iframe id="iframe" name="iframe" src="about:blank" frameborder="1" width="600" height="150" style="border:1px solid green;"></iframe>
</form>


<div class="row prepend-top">
    <br />
    <center><button type="button" onclick="Proveedores.save(this)">Guardar</button><img id="ajax-loader2" src="images/ajax-loader2.gif" alt="" width="32" height="32" class="hide" /></center>
</div>


<script type="text/javascript">
<!--
    Proveedores.initializer({
        mode   : '<?=isset($info) ? 'edit' : 'create'?>',
        status : '<?=$this->session->flashdata('status')?>'
    });
-->
</script>