<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<table id="tblList" cellpadding="0" cellspacing="0" class="clear tbl-pages">
    <tbody>
<?php 
$n=0;
foreach( $listPages->result_array() as $row ) {
    $n++;
    $class = $n%2 ? 'row-even' : '';
?>
        <tr class="<?=$class?>">
            <td class="cell1"><a href="<?=site_url($row['pagename'])?>" class="left" target="_blank" style="position: relative;"><?=$row['title']?></a>
                <div id="cont<?=$n?>" class="clear float-left hide">
                    <div class="success hide" style="margin-bottom:10px;">Los datos han sido guardado con &eacute;xito</div>
                    <div class="error hide" style="margin-bottom:10px;">Los datos no han podido ser guardados con &eacute;xito</div>

                    T&iacute;tulo:&nbsp;<input type="text" class="jq-title input-form" value="<?=$row['title']?>" /><br /><br />
                    <textarea id="txtCont<?=$n?>" rows="5" cols="20"><?=$row['content']?></textarea>
                    <button type="button" class="submit" onclick="Pages.save(this, '<?=$row['pagename']?>', 'txtCont<?=$n?>');">Save</button>
                    <img src="images/ajax-loader2.gif" alt="Loading" width="32" height="32" style="position:relative; top: 12px;" class="jq-ajaxloader hide" />
                </div>
            </td>
            <td class="cell2"><a href="#cont<?=$n?>" onclick="Pages.slideCont(this); return false;"><img src="images/icon_arrow_down2.png" alt="Abrir" width="16" height="16" class="jq-icon" /></a></td>
        </tr>
<?php }?>
    </tbody>
</table>

<script type="text/javascript">
<!--
    Pages.initializer();
-->
</script>