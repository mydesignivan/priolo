<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="info-strip2 left">

    <div class="login">
        <form name="form1" action="<?=site_url('/panel/index/login');?>" method="post">
            <label for="txtUser">User</label><input type="text" name="txtUser" /><br class="clear" />
            <label for="txtPss">Password</label><input type="password" name="txtPss" /><br class="clear" />
            <input type="submit" value="Enter" class="submit">

            <?php if( $this->session->flashdata('message_login') ){?>
            <div class="error">                
                <?=$this->session->flashdata('message_login');?>
            </div>
            <?php }?>
        </form>
    </div>

</div>
