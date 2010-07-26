<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')=="ok" ){?>
<div class="success">
    Los datos han sido guardados con &eacute;xito.
</div>
<?php }elseif( $this->session->flashdata('status')=="error" ){?>
<div class="error">
    Los datos no han podido ser guardados.
</div>
<?php }?>

<form id="form1" action="<?=site_url('/panel/myaccount/save/');?>" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return Account.save();">
    <fieldset class="fieldset-form">
        <legend>Datos de Contacto</legend>

        <div class="span-10">
            <div class="row">
                <label for="txtEmail" class="label-contact">*Email:</label>
                <div class="float-left"><input type="text" name="txtEmail" id="txtEmail" class="input-contact validate" value="<?=$info['email']?>" /></div>
            </div>

            <div class="row">
                <label for="txtAddress1" class="label-contact">Domicilio1:</label>
                <div class="float-left"><input type="text" name="txtAddress1" id="txtAddress1" class="input-contact" value="<?=$info['address1']?>" /></div>
            </div>

            <div class="row">
                <label for="txtAddress2" class="label-contact">Domicilio2:</label>
                <div class="float-left"><input type="text" name="txtAddress2" id="txtAddress2" class="input-contact" value="<?=$info['address2']?>" /></div>
            </div>
        </div>

        <div class="span-11 float-right">
            <div class="row">
                <label for="txtPhone1" class="label-contact">Tel./Fax1:</label>
                <div class="float-left"><input type="text" name="txtPhone1" id="txtPhone1" class="input-contact" value="<?=$info['phone1']?>" /></div>
            </div>

            <div class="row">
                <label for="txtPhone2" class="label-contact">Tel./Fax2:</label>
                <div class="float-left"><input type="text" name="txtPhone2" id="txtPhone2" class="input-contact" value="<?=$info['phone2']?>" /></div>
            </div>
            
            <div class="row">
                <label for="txtEmailCV" class="label-contact">*Email CV:</label>
                <div class="float-left"><input type="text" name="txtEmailCV" id="txtEmailCV" class="input-contact validate" value="<?=$info['emailcv']?>" /></div>
            </div>
        </div>

    </fieldset>

    <fieldset class="clear fieldset-form">
        <legend>Datos del Usuario</legend>
        <div class="row">
            <label for="txtUsername" class="label-medium">*Usuario:</label>
            <div class="float-left"><input type="text" name="txtUsername" id="txtUsername" class="input-contact validate" value="<?=$info['username']?>" /></div>
        </div>
        <div class="row">
            <label for="txtPssCurrent" class="label-medium">Contrase&ntilde;a actual:</label>
            <div class="float-left"><input type="password" name="txtPssCurrent" id="txtPssCurrent" value="" class="input-contact" /></div>
        </div>

        <div class="row">
            <label for="txtPssNew" class="label-medium">Nueva Contrase&ntilde;a:</label>
            <div class="float-left"><input type="password" name="txtPssNew" id="txtPssNew" value="" class="input-contact validate" /></div>
        </div>

        <div class="row">
            <label for="txtPssVeri" class="label-medium">Repetir Contrase&ntilde;a:</label>
            <div class="float-left"><input type="password" id="txtPssVeri" id="txtPssVeri" value="" class="input-contact validate" /></div>
        </div>
    </fieldset>
    
    <div class="row text-center">
        <center><button type="submit">Guardar</button><img id="imgAL" src="images/ajax-loader2.gif" alt="Loading" width="24" height="24" class="hide" /></center>
    </div>
</form>

<script type="text/javascript">
<!--
    Account.initializer();
-->
</script>