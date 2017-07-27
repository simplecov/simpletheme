<?php
$image = \Simplecov\CF::getInstance()->getPageImage(get_queried_object_id());
if(is_single())
    $pageTitle = get_the_title();
?>
<?if(is_front_page()):?>
    <div class="header-image-container">
        <div class="header-image-loader"></div>
        <div class="header-image image-move main-page" style="background-image: url(<?=get_header_image()?>)"></div>
    </div>
<?elseif($image):?>
    <div class="header-image-container">
        <div class="header-image-loader"></div>
        <div class="header-image image-move" style="background-image: url(<?=$image?>)"></div>
    </div>
<?else:?>
    <div class="header-image-container"></div>
<?endif?>
