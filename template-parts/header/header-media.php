<?php
$image = \Simplecov\CF::getInstance()->getPageImage(get_queried_object_id());
if(is_single())
    $pageTitle = get_the_title();
?>
<?//if(is_front_page()):?>
<!--    -->
<?//else:?>
<!--    <div class="header-media">-->
<!--        <div class="header-text container">-->
<!--            --><?//if($pageTitle):?>
<!--                <h1 class="header-title">--><?//=$pageTitle?><!--</h1>-->
<!--            --><?//else:?>
<!--                <div class="tiles">-->
<!--                    <span class="tile">Создаем уникальные решения</span>-->
<!--                    <span class="tile">Всегда в курсе последних тенденций</span>-->
<!--                    <span class="tile">Угадываем желания</span>-->
<!--                </div>-->
<!--            --><?//endif?>
<!--        </div>-->
<!--    </div>-->
<?//endif?>

<div class="header-image image-move"></div>
