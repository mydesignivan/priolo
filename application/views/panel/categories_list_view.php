<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="float-right">
    <button type="button" onclick="Categories.open_popup()">Insertar</button>
    <?php if( count($listCategories)>0 ){?><button type="button">Eliminar</button><?php }?>
</div>


<?php if( count($listCategories)>0 ){?>

<table id="tblList" cellpadding="0" cellspacing="0" class="clear tbl-categorie">
    <thead>
        <tr>
            <td class="cell1"><input type="checkbox" value="0" /></td>
            <td class="cell2">Nombre Categor&iacute;a</td>
            <td class="cell3">Ordenar</td>
            <td class="cell4">Editar</td>
            <td class="cell5">Eliminar</td>
        </tr>
    </thead>
    <tbody>
<?php 
$n=0;
$level=-1;
foreach( $listCategories as $row ) {
    $n++;
    $class='';
    //if( $row['count_child']!=0 ) $class = 'class="row-even"';
?>
<?php if( $level!=$row['level'] ) {?>
    </tbody>
    <tbody>
<?php }?>

        <tr>
            <td class="cell1"><input type="checkbox" value="<?=$row['categories_id']?>" /></td>
            <td class="cell2"><?= $row['count_child']>0 ? '<b>'.$row['categorie_name'].'</b>' : $row['categorie_name']?></td>
            <td class="cell3"><a href="javascript:void(0)" class="handle"><img src="images/icon_arrow_move.png" alt="" width="16" alt="16" /></a></td>
            <td class="cell4"><a href="javascript:void(Categories.open_popup(<?=$row['categories_id']?>))"><img src="images/icon_edit.png" alt="" width="16" alt="16" /><span>Editar</span></a></td>
            <td class="cell5"><a href="javascript:Categories.del(<?=$row['categories_id']?>)"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></td>
        </tr>
<?php 
$level = $row['level'];
}?>


</table>
<?php }?>

<div id="window" class="window" style="left:0; top:0; position: absolute;"></div>

<script type="text/javascript">
<!--
    //Categories.initializer();
-->
</script>