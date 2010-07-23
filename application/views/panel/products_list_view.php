<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
    <div class="clear"></div>
<?php }?>

<div class="span-23">
<?php if( count($listCategories)>1 ) {?>
    <div class="float-left">
        Categor&iacute;a:
        <?=form_dropdown('cboCategories', $listCategories, $categories_id, 'id="cboCategories" onchange="location.href=\''.site_url('/panel/products/display/').'/\'+this.value"');?>
    </div>
<?php }?>

    <div class="float-right">
        <button type="button" onclick="location.href='<?=site_url('/panel/products/form/')?>'">Nuevo</button>
    <?php if( count($listProducts)>0 ) {?>
        <button type="button" onclick="Products.Delete()">Eliminar</button>
    <?php }?>
    </div>
</div>


<?php if( count($listProducts)>0 ) {
$n=0;

foreach( $listProducts as $key=>$val ) {?>

<?php if( count($listProducts)>1 ){?>
<h2><?=$key?></h2>
<?php }?>

<table cellpadding="0" cellspacing="0" class="tbl-products clear">
    <thead>
        <tr>
            <td class="cell1"><input type="checkbox" value="0" onclick="Products.check_all()" /></td>
            <td class="cell2">Im&aacute;gen</td>
            <td class="cell3">Producto</td>
            <td class="cell4">Ordenar</td>
            <td class="cell5">Editar</td>
            <td class="cell6">Eliminar</td>
        </tr>
    </thead>
    <tbody class="sortable">

<?php foreach( $val as $row ) {
    $n++;
    $class = $n%2 ? 'row-even' : '';
    $url = site_url('/panel/products/form/'.$row['products_id']);
?>
        <tr id="row<?=$row['products_id']?>" class="<?=$class?>">
            <td class="cell1"><input type="checkbox" value="<?=$row['products_id']?>" /></td>
            <td class="cell2"><a href="<?=$url?>"><img src="<?=UPLOAD_DIR_PRODUCTS.$row['thumb']?>" alt="<?=$row['thumb']?>" width="90" height="70" /></a></td>
            <td class="cell3"><a href="<?=$url?>"><?=character_limiter($row['product_name'], 35)?></a></td>
            <td class="cell4"><a href="javascript:void(0)" class="handle"><img src="images/icon_arrow_move.png" alt="" width="16" alt="16" /></a></td>
            <td class="cell5"><a href="<?=$url?>"><img src="images/icon_edit.png" alt="" width="16" alt="16" /><span>Editar</span></a></td>
            <td class="cell6"><a href="javascript:Products.del(<?=$row['products_id']?>)"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></td>
        </tr>
<?php } //end for?>

    </tbody>
</table>

<?php } //end for?>


    <div class="row text-center"><?=$this->pagination->create_links();?></div>
<?php } //end if?>


<script type="text/javascript">
<!--
    Products.initializer('<?=$this->session->flashdata('status')?>');
-->
</script>