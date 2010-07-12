<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('msgerror')!='' ){?>
<div class="error">
    Los datos no han podido ser guardados.
</div>
<?php }?>

<form id="form1" action="" method="post">
    <div class="row">
        <label for="txtName" class="label-contact">*Obra:</label>
        <div class="float-left"><input type="text" name="txtName" id="txtName" class="input-contact validate" value="<?=@$info['name']?>" /></div>
    </div>
    <fieldset class="gallery-panel">
        <legend>Galer&iacute;a de Im&aacute;genes</legend>

        <ul id="gallery-image" class="hide">
<?php if( isset($info) ){?>
        <?php foreach( $info['gallery'] as $row ){?>
            <li>
                <a href="<?=$row['image']?>" class="float-left jq-image"><img src="<?=$row['thumb']?>" alt="<?=$row['thumb']?>" width="100" height="" /></a>
                <div class="clear">
                    <a href="javascript:void(0)" class="link2 float-left jq-removeimg">Quitar</a>
                    <a href="javascript:void(0)" class="float-right"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                </div>
            </li>

        <?php }?>
<?php }else{?>
            <li>
                <a href="" class="float-left jq-image"><img src="" alt="" width="100" height="" /></a>
                <div class="clear">
                    <a href="javascript:void(0)" class="link2 float-left jq-removeimg">Quitar</a>
                    <a href="javascript:void(0)" class="float-right"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                </div>
            </li>
<?php }?>
        </ul>
    </fieldset>
    <div class="row">
        <label for="txtUploadFile" class="label-contact float-left">Im&aacute;gen:</label>
        <div class="float-left">
            <input type="file" size="22" name="txtUploadFile" id="txtUploadFile" class="float-left append-1" />
            <button id="btnUpload" type="button" onclick="PictureGallery.upluad()" class="float-left">Subir</button>
            <div id="ajax-loader1" class="float-left hide">
                <img src="images/ajax-loader2.gif" alt="" width="32" height="32" class="float-left" />
                <div class="float-left" style="margin-left:5px"><small>Subiendo imagen&nbsp;</small></div>
            </div>

        </div>
    </div>

    <input type="hidden" name="au_dir" value="<?=UPLOAD_DIR_OBRAS?>" />
    <input type="hidden" name="au_image_width" value="<?=IMAGE_ORIGINAL_WIDTH_OBRAS?>" />
    <input type="hidden" name="au_image_height" value="<?=IMAGE_ORIGINAL_HEIGHT_OBRAS?>" />
    <input type="hidden" name="au_thumb_width" value="<?=IMAGE_THUMB_WIDTH_OBRAS?>" />
    <input type="hidden" name="au_thumb_height" value="<?=IMAGE_THUMB_HEIGHT_OBRAS?>" />
    <input type="hidden" name="json" id="json" value="" />
    <iframe id="iframe" name="iframe" src="about:blank" frameborder="1" width="600" height="150" style="border:1px solid green;"></iframe>
</form>


<div class="row prepend-top">
    <br />
    <center><button type="button" onclick="Obras.save(this)">Guardar</button><img id="ajax-loader2" src="images/ajax-loader2.gif" alt="" width="32" height="32" class="hide" /></center>
</div>


<script type="text/javascript">
<!--
    Obras.initializer({
        mode       : '<?=isset($info) ? 'edit' : 'create'?>'
    });
-->
</script>