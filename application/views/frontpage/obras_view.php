<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
$n=0;
foreach( $list['listObras'] as $row ){
    $n++;
    $rel = "obra".$n;
?>

<h2 class="title-obras"><?=$row['name'];?></h2>

    <ul class="gallery">
<?php if( isset($list['listGallery'][$row['obra_id']]) ) {?>

    <?php foreach( $list['listGallery'][$row['obra_id']] as $row2 ){?>

        <li><a href="<?=UPLOAD_DIR_OBRAS.$row2['image']?>" rel="<?=$rel?>" class="jq-fancybox"><img src="<?=UPLOAD_DIR_OBRAS.$row2['thumb']?>" alt="" width="153" height="103" /></a></li>
    <?php }
      }?>

    </ul>

<?php }?>

<div class="row text-center"><?=$this->pagination->create_links();?></div>