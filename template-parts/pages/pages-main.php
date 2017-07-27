<?php


\Simplecov\CF::getInstance()->deb(wp_title());
?>
<h1 class="col-12"><?=wp_get_document_title()?></h1>
<div class="col-12 content">
    <?the_content()?>
</div>

<?//do_shortcode('[objections]')?>
<?//do_shortcode('[workscheme]')?>
<?//do_shortcode('[order]')?>
<?//do_shortcode('[reviews]')?>
<?//do_shortcode('[discount]')?>
<?//do_shortcode('[blog]')?>

