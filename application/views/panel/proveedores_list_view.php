<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
    <div class="clear"></div>
<?php }?>

<button type="button" class="float-right" onclick="location.href='<?=site_url('/panel/proveedores/form/')?>'">Nuevo</button>

<div class="clear table tbl-obras">
    <ul class="head">
        <li class="cell1">T&iacute;tulo</li>
        <li class="cell2">Ordenar</li>
        <li class="cell3">Editar</li>
        <li class="cell4">Eliminar</li>
    </ul>

<?php if( $listProveedores->num_rows>0 ) {?>
    <ul id="sortable" class="body">
<?php
$n=0;
foreach( $listProveedores->result_array() as $row ) {
    $n++;
    $url = site_url('/panel/proveedores/form/'.$row['proveedor_id']);
    $class = $n%2 ? 'row-even' : '';
?>
        <li id="row<?=$row['proveedor_id']?>" class="row <?=$class?>">
            <ul>
                <li class="cell1"><a href="<?=$url?>"><?=$row['name']?></a></li>
                <li class="cell2"><a href="javascript:void(0)" class="handle"><img src="images/icon_arrow_move.png" alt="" width="16" alt="16" /></a></li>
                <li class="cell3"><a href="<?=$url?>"><img src="images/icon_edit.png" alt="" width="16" alt="16" /><span>Editar</span></a></li>
                <li class="cell4"><a href="javascript:Proveedores.del(<?=$row['proveedor_id']?>)"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></li>
            </ul>
        </li>
<?php }?>
    </ul>
<?php }?>
</div>


<script type="text/javascript">
<!--
    Proveedores.initializer('<?=$this->session->flashdata('status')?>');
-->
</script>