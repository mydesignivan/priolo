<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<base href="<?=base_url();?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="images/favicon.ico" rel="stylesheet icon" type="image/ico" />

<!-- Framework CSS (BLUE PRINT) -->
<link rel="stylesheet" href="css/blueprint/screen<?=$this->config->item('sufix_pack_css');?>.css" type="text/css" media="screen, projection"/>
<link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print"/>
<!--[if lt IE 8]><link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection"/><![endif]-->
<!-- END FRAMEWORK -->

<link href="css/style<?=$this->config->item('sufix_pack_css');?>.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link href="css/styleIE7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<link href="css/styleIE6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--========== LIBRARIES ============-->
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/helpers/helpers<?=$this->config->item('sufix_pack_js');?>.js"></script>
<script type="text/javascript" src="js/comun.js"></script>
<!--========== END LIBRARIES =======-->


<script type="text/javascript">
<!--
<?php $indexphp = index_page();if( !empty($indexphp) ) $indexphp.="/";?>
    var baseURI = $("base").attr("href")+"<?=$indexphp;?>";

    /*if( $.browser.opera ) $('head').append($('<link href="css/styleOpera.css" rel="stylesheet" type="text/css" />'));
    if( $.browser.safari ) $('head').append($('<link href="css/styleSafari.css" rel="stylesheet" type="text/css" />'));*/
-->
</script>

<?php if( $this->uri->segment(1)!="panel" ) {?>
<link type="text/css" href="js/plugins/nivoslider-1.9/nivo-slider.min.css" rel="stylesheet"  />
<script type="text/javascript" src="js/plugins/nivoslider-1.9/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/plugins/nivoslider-1.9/execute.js"></script>
<?php }?>

<!--[if IE 6]>
<script type="text/javascript">
    var IE6UPDATE_OPTIONS = {
        icons_path: "js/plugins/ie6update/ie6update/images/"
    }
</script>
<script type="text/javascript" src="js/plugins/ie6update/ie6update/ie6update.js"></script>
<![endif]-->

<!--[if IE 6]>
<script type="text/javascript" src="js/plugins/DD_belatedPNG.js"></script>
<![endif]-->