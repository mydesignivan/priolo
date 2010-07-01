<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status_sendmail')=="ok" ){?>
}
<div class="success">
    El formulario ha sido enviado con &eacute;xito.
</div>
<?php }elseif( $this->session->flashdata('status_sendmail')=="error_send" ){?>
<div class="error">
    El formuarlio no ha podido ser enviado, porfavor, intentelo nuevamente.
</div>
<?php }elseif( $this->session->flashdata('status_sendmail')=="" && $this->session->flashdata('error_upload') ){?>
<div class="error">
    <?=$this->session->flashdata('error_upload');?>
</div>
<?php }?>

<form id="form1" action="<?=site_url('/trabaje-con-nosotros/send');?>" method="post" enctype="multipart/form-data" onsubmit="return Trabnosotros.send()">
    <div class="contact-col1">
        <div class="row">
            <label for="txtName" class="label-contact">*Nombre:</label>
            <div class="float-left"><input type="text" name="txtName" id="txtName" class="input-contact validate" /></div>
        </div>

        <div class="row">
            <label for="txtEmail" class="label-contact">*Email:</label>
            <div class="float-left"><input type="text" name="txtEmail" id="txtEmail" class="input-contact validate" /></div>
        </div>

        <div class="row">
            <label for="txtFileCurri" class="label-contact">*Curriculum:</label>
            <div class="float-left">
                <div class="float-left">
                    <input type="file" name="txtFileCurri" id="txtFileCurri" size="20" class="validate" /><br />
                    <label class="clear label-legend">Extenci&oacute;n (.doc / .docx / .odt / .rtf / .pdf) 2Mb max</label>
                </div>
                <div id="msgbox-cv" class="clear float-left"></div>
            </div>
        </div>
        <div class="row">
            <label for="txtComment" class="label-contact">Comentario:</label>
            <textarea name="txtComment" id="txtComment" rows="8" cols="22" class="textarea-large2"></textarea>
        </div>

        <div class="row">
            <label class="label-contact">&nbsp;</label>            
            <button type="submit" class="float-right">Enviar</button>
        </div>
    </div>

    <div class="float-right">
        <br /><br /><br /><br /><img src="images/img_cv.jpg" alt="" width="260" height="281" />
    </div>
</form>

<script type="text/javascript">
<!--
    Trabnosotros.initializer();
-->
</script>