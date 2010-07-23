<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
<?php }?>

<div class="float-right">
    <button type="button" onclick="Categories.open_popup()">Insertar</button>
    <?php if( $listCategories!='' ){?><button type="button" onclick="Categories.Delete()">Eliminar</button><?php }?>
</div>

<?php if( $listCategories!='' ){?>

<div class="table tbl-categorie">
    <ul class="head">
        <li class="cell1"><input type="checkbox" value="0" onclick="Categories.check_all()" /></li>
        <li class="cell2">Nombre Categor&iacute;a</li>
        <li class="cell3">Cant.Prod.</li>
        <li class="cell4">Ordenar</li>
        <li class="cell5">Editar</li>
        <li class="cell6">Eliminar</li>
    </ul>

    <div id="table" class="body">
        <?=$listCategories?>
    </div>
</div>

<?php }?>

<div id="window" class="window">
  <iframe id="winIframe" src="about:blank" width="100%" height="100%" style="border: 0px;" frameborder="0"></iframe>
  <div id="iframeHelper"></div>
</div>

<script type="text/javascript">
<!--
    Categories.initializer();
-->
</script>