<?php

/**
 * Навигация по записям
 */
$post_nav = get_the_post_navigation( array(
    'prev_text' => '<span class="nav-buttons prev-button"><i class="fa fa-angle-double-left"></i> Предыдущая запись  <span class="post-title"> (%title)</span></span> ',
    'next_text' => '<span class="nav-buttons next-button"><span class="post-title"> (%title)</span> Следующая запись  <i class="fa fa-angle-double-right"></i> </span> '
));

/**
 * Кнопка "Назад к списку"
 */
$backButton = '<a class="back-button" href="' . site_url() . '/blog/">Назад к списку</a>';

/**
 * Основной контент страницы
 */

get_header(); ?>

<?php
/* Start the Loop */
while ( have_posts() ) : the_post();

    if(!is_single())
        get_template_part( 'template-parts/post/post', 'list' );
    else
        get_template_part( 'template-parts/post/post', 'single' );

    ?>
    <div class="post-navigation-container">
    <?
    echo $post_nav;
    echo $backButton;
    ?>
    </div>
    <?
endwhile; // End of the loop.
?>

<?php get_footer();
