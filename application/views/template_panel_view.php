<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title><?=TITLE_GLOBAL . @$tlp_title;?></title>
    <meta name="robots" content="none" />

    <?php require('includes/head_inc.php');?>
    <?php if( isset($tlp_script) && !empty($tlp_script) ) {
        if( !is_array($tlp_script) ) $tlp_script = array($tlp_script);
        foreach( $tlp_script as $file ){
            require('js/includes/'.$file.'_inc.php');
        }
    }?>
</head>

<body>

    <div class="container">
        <!-- ================  HEADER  ================ -->
        <div class="span-24 last">
            <?php require('includes/header_inc.php');?>
        </div>
        <!-- ================  END HEADER  ================ -->

        <!-- =============== CONTAINER =============== -->
        <div class="clear span-18 main-container"> 
            <h1 class="title_section"><?=$tlp_title_section;?></h1>
            <?php require($tlp_section);?>
        </div>
        <!-- =============== END CONTAINER =============== -->

        <!-- =============== SIDEBAR =============== -->
        <div class="span-5 last"> 
            <?php require('includes/sidebar_inc.php');?>
        </div>
        <!-- =============== END SIDEBAR =============== -->

        <!-- =============== FOOTER =============== -->
        <div class="clear span-24 last footer"> 
            <?php require('includes/footer_inc.php');?>
        </div>
        <!-- =============== END FOOTER =============== -->
    </div>

</body>
</html>