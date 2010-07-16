<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="sidebar">
    <div class="top"></div>
    <div class="middle">

<?php foreach( $tlp_sidebar['listProv'] as $row ) {?>
        <h3><?=$row['name']?></h3>
        <div class="line"></div>

        <?php foreach( $tlp_sidebar['listGallery'][$row['proveedor_id']] as $row2 ){?>
            <img src="<?=UPLOAD_DIR_PROV.$row2['thumb'];?>" alt="<?=$row2['thumb']?>" width="<?=$row2['width']?>" height="<?=$row2['height']?>" /><br />
        <?php }?>
<?php }?>

    </div>
    <div class="bottom"></div>
</div>