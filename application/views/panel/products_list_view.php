<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
    <div class="clear"></div>
<?php }?>

<div class="span-23">
<?php if( $listProducts->num_rows>0 ) {?>
    <!--<div class="span-8">
        <label>Buscar:</label>
        <input type="text" id="txtSearch" class="input-search" />
        <a href="javascript:void(0)"><img src="images/icon_search.png" alt="" width="16" height="16" /></a>
    </div>-->
    <div class="float-left">
        <label>Categor&iacute;a:</label>
        <?=form_dropdown('cboCategories', $comboCategories, $this->uri->segment(4), 'id="cboCategories" onchange="Products.show_cat(this.value)"');?>
    </div>
<?php }?>

    <div class="float-right">
        <button type="button" onclick="location.href='<?=site_url('/panel/products/form/')?>'">Nuevo</button>
    <?php if( $listProducts->num_rows>0 ) {?>
        <button type="button" onclick="Products.Delete()">Eliminar</button>
    <?php }?>
    </div>
</div>


<?php if( $listProducts->num_rows>0 ) {
$n=0;
$catname="";
?>

<table cellpadding="0" cellspacing="0" class="tbl-products clear">
    <thead>
        <tr>
            <td class="cell1"><input type="checkbox" value="0" onclick="Products.check_all()" /></td>
            <td class="cell2">Im&aacute;gen</td>
            <td class="cell3">Producto</td>
            <td class="cell4">Categor&iacute;a</td>
            <td class="cell5">Ordenar</td>
            <td class="cell6">Editar</td>
            <td class="cell7">Eliminar</td>
        </tr>
    </thead>

<?php foreach( $listProducts->result_array() as $row ) {

    if( $catname!=$row['categorie_name'] ) {
        if( $n>0 ) echo '</tbody>';
        echo '<tbody class="sortable">';
    }
    $n++;
    $class = $n%2 ? 'row-even' : '';
    $url = site_url('/panel/products/form/'.$row['products_id']);
?>
        <tr id="row<?=$row['products_id']?>" class="<?=$class?>">
            <td class="cell1"><input type="checkbox" value="<?=$row['products_id']?>" /></td>
            <td class="cell2"><a href="<?=$url?>"><img src="<?=UPLOAD_DIR_PRODUCTS.$row['thumb']?>" alt="<?=$row['thumb']?>" width="90" height="70" /></a></td>
            <td class="cell3"><a href="<?=$url?>"><?=character_limiter($row['product_name'], 35)?></a></td>
            <td class="cell4"><?=$row['categorie_name']?></td>
            <td class="cell5">
                <a href="javascript:void(0)" class="handle"><img src="images/icon_arrow_move.png" alt="" width="16" alt="16" /></a><!--&nbsp;&nbsp;
                <a href="javascript:void(0)" onclick="Products.order(this, 'up')"><img src="images/icon_order_up.png" alt="" width="16" alt="16" /></a>
                <a href="javascript:void(0)" onclick="Products.order(this, 'down')"><img src="images/icon_order_down.png" alt="" width="16" alt="16" /></a>-->
            </td>
            <td class="cell6"><a href="<?=$url?>"><img src="images/icon_edit.png" alt="" width="16" alt="16" /><span>Editar</span></a></td>
            <td class="cell7"><a href="javascript:Products.del(<?=$row['products_id']?>)"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></td>
        </tr>
<?php 
$catname = $row['categorie_name'];
} //end for?>

</table>


    <div class="clear"></div>
    <div class="float-left"><?=$this->pagination->create_links();?></div>
    <div class="float-right">Cantidad de productos: <b><?=$var_pag_countreg?></b></div>

<script type="text/javascript">
<!--
    Products.initializer({
        status : '<?=$this->session->flashdata('status')?>',
        page : {
            base_url     : '<?=$var_pag_base_url?>',
            offset       : <?=$var_pag_offset?>,
            countperpage : <?=$var_pag_countperpage?>,
            countreg     : <?=$var_pag_countreg?>
        }
    });
-->
</script>

<?php } //end if?>