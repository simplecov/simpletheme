<?php
get_header();
?>

<?php
    while ( have_posts() ) : the_post();

    if(is_front_page())
        get_template_part( 'template-parts/pages/pages', 'main' );
    elseif(is_home())
        get_template_part( 'template-parts/pages/pages', 'posts' );
    elseif(get_the_title() == 'Контакты')
        get_template_part( 'template-parts/pages/pages', 'contacts' );
    else
        get_template_part( 'template-parts/pages/pages', 'pages' );

endwhile;?>

<?php get_footer();?>
