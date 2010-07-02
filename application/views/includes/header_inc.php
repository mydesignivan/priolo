<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- =============== TOP HEADER =============== -->
<div class="span-24 last"> 
    <h1 class="title_header">INGENIERIA TERMOMECANICA PRIOLO</h1>
    <a href="<?=$this->config->item('base_url');?>"><img src="images/logo.png" alt="Ingenieria Termomecanica Priolo" width="149" height="117" class="float-right" /></a>
</div>

<!-- =============== SLIDER =============== -->
<div class="clear span-24 last"> 
    <div id="slider" class="header_slider">
        <img src="images/slider/imagen1.jpg" alt="" width="942" height="323" />
        <img src="images/slider/imagen1.jpg" alt="" width="938" height="240" />
        <img src="images/slider/imagen1.jpg" alt="" width="938" height="240" />
        <img src="images/slider/imagen1.jpg" alt="" width="938" height="240" />
    </div>
</div>

<!-- =============== MENU =============== -->

<?php if( $this->session->userdata('logged_in') && $this->uri->segment(1)=="panel" ) {
    $page = $this->uri->segment(2);?>

<div class="clear span-24 last"> 
    <ul class="menu">
        <li><a href="<?=$this->config->item('base_url');?>">Home</a><div class="shadow"></div></li>
        <li <?php if( $page=="myaccount" ) echo 'class="current"';?>><a href="<?=site_url('/panel/myaccount/')?>">Mi Cuenta</a><div class="shadow"></div></li>
        <li <?php if( $page=="category" ) echo 'class="current"';?>><a href="<?=site_url('/panel/category/')?>">Categor&iacute;as</a><div class="shadow"></div></li>
        <li <?php if( $page=="products" ) echo 'class="current"';?>><a href="<?=site_url('/panel/products/')?>">Productos</a><div class="shadow"></div></li>
        <li <?php if( $page=="proveedores" ) echo 'class="current"';?>><a href="<?=site_url('/panel/proveedores/')?>">Proveedores</a><div class="shadow"></div></li>
        <li <?php if( $page=="logout" ) echo 'class="current"';?>><a href="<?=site_url('/panel/logout/')?>">Logout</a><div class="shadow"></div></li>
    </ul>
</div>

<?php }else{
    $page = $this->uri->segment(1);?>

<div class="clear span-24 last"> 
    <ul class="menu">
        <li <?php if( $page=="" || $page=="index" ) echo 'class="current"';?>><a href="<?=$this->config->item('base_url');?>">Home</a><div class="shadow"></div></li>
        <li <?php if( $page=="empresa" ) echo 'class="current"';?>><a href="<?=site_url('/empresa/')?>">Empresa</a><div class="shadow"></div></li>
        <li <?php if( $page=="obras" ) echo 'class="current"';?>><a href="<?=site_url('/obras/')?>">Obras</a><div class="shadow"></div></li>
        <li <?php if( $page=="servicios" ) echo 'class="current"';?>><a href="<?=site_url('/servicios/')?>">Servicios</a><div class="shadow"></div></li>
        <li <?php if( $page=="productos" ) echo 'class="current"';?>><a href="<?=site_url('/productos/')?>">Productos</a><div class="shadow"></div></li>
        <li <?php if( $page=="trabaje-con-nosotros") echo 'class="current"';?>><a href="<?=site_url('/trabaje-con-nosotros/')?>">Trabaje con Nosotros</a><div class="shadow"></div></li>
        <li <?php if( $page=="contacto" ) echo 'class="current"';?>><a href="<?=site_url('/contacto/')?>">Contacto</a><div class="shadow"></div></li>
    </ul>
</div>

<?php }?>