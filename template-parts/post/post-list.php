<?
$image = \Simplecov\CF::getInstance()->resizeImage( wp_get_attachment_url(get_post_thumbnail_id()), 600);
$postListClass = [
    'post-item'
];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($postListClass); ?>>
    <?the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
    <div class="background absolute" style="background: url(<?=$image?>); background-position: 0 100%; -webkit-background-size: cover;background-size: cover;: "></div>
    <div class="gradient"></div>

    <div class="post-text">
        <?the_content()?>
    </div>
</article>
