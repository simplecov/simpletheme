<div class="header-content">
    <?if( has_custom_logo() ):?>
        <?= the_custom_logo() ?>
    <?endif?>
    <? if ( has_nav_menu( 'top' ) ) : ?>
        <?php get_template_part( 'template-parts/header/header', 'navigation' ); ?>
    <? endif; ?>
</div>