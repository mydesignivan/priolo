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

    <table cellpadding="5px" cellspacing="5px" class="gallery-product">
<?php 
    $n=0;
    foreach( $listProducts->result_array() as $row ) {
    $n++;
    
        if( $n==1 ) echo '<tr>';
?>
            <td>
                <div class="frame-image"><a href="<?=UPLOAD_DIR_PRODUCTS.$row['image'];?>" class="jq-fancybox" rel="group"><img src="<?=UPLOAD_DIR_PRODUCTS.$row['thumb'];?>" alt="<?=$row['thumb']?>" width="<?=$row['thumb_width']?>" height="<?=$row['thumb_height']?>" /></a></div>
                <div class="label"><?=nl2br($row['product_name'])?></div>
            </td>
<?php 
        if( $n==3 || $listProducts->num_rows==$n ) {
            if( $n<3 ){
                for( $z=1; $z<=(3-$n); $z++ ) echo '<td class="empty">&nbsp;</td>';
            }

            echo '</tr>';
            $n=0;
        }
    }?>
    </table>

<?php }?>

    <div class="row text-center"><?=$this->pagination->create_links();?></div>
</div>

<script type="text/javascript">
<!--
$('a.jq-fancybox').fancybox();
-->
</script>