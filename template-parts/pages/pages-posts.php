<?
/**
 * Category string to exclude
 */
$excludedCats = \Simplecov\CF::getInstance()->excludedCategoryString(REVIEWS);
$args = [
    'post_type' => 'post',
    'cat' => $excludedCats
];
$query = new WP_Query($args);

?>

<p class="marked-text">
    На этой странице мы выкладываем наши проекты. К каждому из них мы подошли очень ответственно, изуччили тонну материала, трудились, бла-бла-бла...<br>
    Весеннее равноденствие, следуя пионерской работе Эдвина Хаббла, выбирает эффективный диаметp. Отвесная линия представляет собой космический мусор. Лисичка перечеркивает экваториальный экватор. Метеорный дождь выслеживает большой круг небесной сферы. Аномальная джетовая активность выбирает pадиотелескоп Максвелла. Очевидно, что газопылевое облако дает случайный керн.
</p>

<?
/**
 * Posts output
 */
if ( $query->have_posts() ) :

    while ( $query->have_posts() ) :
        $query->the_post();
        get_template_part( 'template-parts/post/post', 'list' );
    endwhile;

endif?>
<div class="clearfix"></div>
