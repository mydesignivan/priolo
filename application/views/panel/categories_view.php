<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<div class="tbl-categories">
    <ul>
        <li class="parent">
            <div class="jq-cont1 float-left hide">
                <label>Nombre categor&iacute;a: </label>
                <input type="text" class="input-categorie" />
            </div>

            <div class="jq-cont2 label hide"></div>

            <div class="float-right">
                <button type="button" class="jq-btn-new" onclick="Categories.New(this)"><img src="images/icon_new.png" alt="" width="16" height="16" />&nbsp;Nuevo</button>
                <button type="button" class="jq-btn-save hide" onclick="Categories.Save(this)"><img src="images/icon_save.png" alt="" width="16" height="16" />&nbsp;Guardar</button>
                <button type="button" class="jq-btn-cancel hide" onclick="Categories.Cancel(this)"><img src="images/icon_cancel.png" alt="" width="16" height="16" />&nbsp;Cancelar</button>
                <button type="button" class="jq-btn-edit hide" onclick="Categories.Edit(this)"><img src="images/icon_edit.png" alt="" width="16" height="16" />&nbsp;Editar</button>
                <button type="button" class="jq-btn-delete hide" onclick="Categories.Del(this)"><img src="images/icon_delete.png" alt="" width="16" height="16" />&nbsp;Eliminar</button>
            </div>
        </li>
    </ul>
</div>

<script type="text/javascript">
<!--
    //Categories.initializer();
-->
</script>