<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status_sendmail')=="ok" ){?>
<div class="success">            
    Muchas gracias por comunicarse, en breve estaremos en contacto.
</div>
<?php }elseif( $this->session->flashdata('status_sendmail')=="error" ){?>
<div class="error">
    El formuarlio no ha podido ser enviado, porfavor, intentelo nuevamente.
</div>
<?php }?>

<form id="form1" action="<?=site_url('/contacto/send');?>" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return Contact.send();">
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
            <label for="txtConsult" class="label-contact">*Mensaje:</label>
            <div class="float-left"><textarea name="txtConsult" id="txtConsult" rows="8" cols="22" class="textarea-large float-left validate"></textarea></div>
        </div>

        <div class="row">
            <label class="label-contact">&nbsp;</label>            
            <button type="submit" class="float-right">Enviar</button>
        </div>
    </div>
    
    <div class="float-right">
        <iframe width="250" height="320" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Laprida+228&amp;sll=-33.207669,-68.7854&amp;sspn=0.73537,1.234589&amp;ie=UTF8&amp;hq=&amp;hnear=Laprida+228,+Mendoza,+Argentina&amp;ll=-32.89879,-68.833322&amp;spn=0.01153,0.027466&amp;z=15&amp;output=embed"></iframe>
    </div>

    <div class="contact-footer">
        - <?=$info['email']?><br />
        - <?=$info['address1']?> Tel./FAX <?=$info['phone1']?><br />
        - <?=$info['address2']?> Tel. <?=$info['phone2']?>
    </div>
</form>

<script type="text/javascript">
<!--
    Contact.initializer();
-->
</script>