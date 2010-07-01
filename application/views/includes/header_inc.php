<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- =============== TOP HEADER =============== -->
<div class="span-24 last"> 
    <h1 class="title_header">INGENIERIA TERMOMECANICA PRIOLO</h1>
    <a href="<?=$this->config->item('base_url');?>"><img src="images/logo.png" alt="Ingenieria Termomecanica Priolo" width="149" height="117" class="float-right" /></a>
</div>

<!-- =============== SLIDER =============== -->
<div class="clear span-24 last"> 
    <div class="header_slider"></div>
</div>

<!-- =============== MENU =============== -->
<div class="clear span-24 last"> 
    <?php $page = $this->uri->segment(1);?>
    <ul class="menu">
        <li <?php if( $page=="empresa" || $page=="" ) echo 'class="current"';?>><a href="<?=site_url('/empresa/')?>">Empresa</a></li>
        <li <?php if( $page=="obras" ) echo 'class="current"';?>><a href="<?=site_url('/obras/')?>">Obras</a></li>
        <li <?php if( $page=="servicios" ) echo 'class="current"';?>><a href="<?=site_url('/servicios/')?>">Servicios</a></li>
        <li <?php if( $page=="productos" ) echo 'class="current"';?>><a href="<?=site_url('/productos/')?>">Productos</a></li>
        <li <?php if( $page=="trabaje-con-nosotros") echo 'class="current"';?>><a href="<?=site_url('/trabaje-con-nosotros/')?>">Trabaje con Nosotros</a></li>
        <li <?php if( $page=="contacto" ) echo 'class="current"';?>><a href="<?=site_url('/contacto/')?>">Contacto</a></li>
    </ul>
</div>