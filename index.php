<?php
get_header();
?>

<h1 class="col-12"><?=wp_get_document_title()?></h1>
<div class="col-12">
    <?get_template_part( 'template-parts/pages/pages', 'posts' );?>
</div>

<?php //get_sidebar(); ?>

<?php get_footer();
