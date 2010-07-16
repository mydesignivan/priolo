<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
    <div class="clear"></div>
<?php }?>

<div class="span-23">
<?php if( count($listCategories)>0 ) {?>
    <div class="float-left">
        Categor&iacute;a:
        <?=form_dropdown('cboCategories', $listCategories, $categories_id, 'id="cboCategories" onchange="location.href=\''.site_url('/panel/products/display/').'/\'+this.value"');?>
    </div>
<?php }?>
    <button type="button" class="float-right" onclick="location.href='<?=site_url('/panel/products/form/')?>'">Nuevo</button>
</div>


<?php if( count($listProducts)>0 ) {
$n=0;

foreach( $listProducts as $key=>$val ) {?>

<?php if( count($listProducts)>1 ){?>
<h2><?=$key?></h2>
<?php }?>

<div class="table tbl-products">
    <ul class="head">
        <li class="cell1">Producto</li>
        <li class="cell2">&nbsp;</li>
        <li class="cell3">Ordenar</li>
        <li class="cell4">Editar</li>
        <li class="cell5">Eliminar</li>
    </ul>

    <ul class="body sortable">

<?php foreach( $val as $row ) {
    $n++;
    $class = $n%2 ? 'row-even' : '';
    $url = site_url('/panel/products/form/'.$row['products_id']);
?>

        <li id="row<?=$row['products_id']?>" class="row <?=$class?>">
            <ul>
                <li class="cell1"><a href="<?=$url?>"><img src="<?=UPLOAD_DIR_PRODUCTS.$row['thumb']?>" alt="<?=$row['thumb']?>" width="90" height="70" /></a></li>
                <li class="cell2"><a href="<?=$url?>"><?=character_limiter($row['product_name'], 35)?></a></li>
                <li class="cell3"><a href="javascript:void(0)" class="handle"><img src="images/icon_arrow_move.png" alt="" width="16" alt="16" /></a></li>
                <li class="cell4"><a href="<?=$url?>"><img src="images/icon_edit.png" alt="" width="16" alt="16" /><span>Editar</span></a></li>
                <li class="cell5"><a href="javascript:Products.del(<?=$row['products_id']?>)"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></li>
            </ul>
        </li>

<?php } //end for?>

    </ul>
</div>
<?php } //end for?>

    <div class="row text-center"><?=$this->pagination->create_links();?></div>
<?php } //end if?>


<script type="text/javascript">
<!--
    Products.initializer('<?=$this->session->flashdata('status')?>');
-->
</script>