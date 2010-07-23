<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<ul class="lst-category">
<?php foreach( $listCategories->result_array() as $rowCat ) {
$listSubCategories = $model->get_categories($rowCat['categories_id']);
?>
    <li class="option"><a href="<?=site_url('/productos/'.$rowCat['reference']);?>"><?=$rowCat['categorie_name'];?></a>

<?php if( $listSubCategories->num_rows>0 ) {?>
        <ul class="lst-subcategory">
<?php foreach( $listSubCategories->result_array() as $rowSubCat ) {
$class = $rowSubCat['reference']==$this->uri->segment(2) ? 'option-select' : '';
?>
            <li class="option <?=$class?>"><a href="<?=site_url('/productos/'.$rowSubCat['reference']);?>"><?=$rowSubCat['categorie_name'];?></a></li>
<?php }?>
        </ul>
<?php }?>
    </li>

<?php }?>
</ul>

<div class="column-product">
    <h2 class="title-product"><?=$title_categorie?></h2>

<?php if( $listProducts->num_rows>0 ) {?>
<?php 
    $n=0;
    foreach( $listProducts->result_array() as $row ) {
    $n++;
    
        if( $n==1 ) echo '<ul class="gallery-product">';
?>
            <li>
                <div class="cont-image">
                    <div class="frame-image"><a href="<?=UPLOAD_DIR_PRODUCTS.$row['image'];?>" class="jq-fancybox" rel="group"><img src="<?=UPLOAD_DIR_PRODUCTS.$row['thumb'];?>" alt="<?=$row['thumb']?>" width="<?=$row['thumb_width']?>" height="<?=$row['thumb_height']?>" /></a></div>
                    <div class="label"><?=$row['product_name']?></div>
                </div>
            </li>
<?php 
        if( $n==3 || $listProducts->num_rows==$n ) {echo '</ul>';$n=0;}
    }?>
<?php }?>

    <div class="row text-center"><?=$this->pagination->create_links();?></div>
</div>

<script type="text/javascript">
<!--
$('a.jq-fancybox').fancybox();
-->
</script>