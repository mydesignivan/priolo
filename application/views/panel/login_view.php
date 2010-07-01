<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="login">
    <form name="form1" action="<?=site_url('/panel/login');?>" method="post">
        <div class="row">
            <label for="txtUser" class="label-login">Usuario</label>
            <input type="text" name="txtUser" class="input-login" />
        </div>
        <div class="row">
            <label for="txtPss" class="label-login">Contrase&ntilde;a</label>
            <input type="password" name="txtPss" class="input-login" />
        </div>
        <div class="row text-center">
            <center><button type="submit">Ingresar</button></center>
        </div>

        <?php if( $this->session->flashdata('message_login') ){?>
        <div class="clear error text-center">
            <?=$this->session->flashdata('message_login');?>
        </div>
        <?php }?>
    </form>
    <div class="clear" style="font-size: 20%;">&nbsp;</div>
</div>
