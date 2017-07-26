<?php

//global $postName;
//$postName = the_title();
//\Simplecov\CF::getInstance()->deb(the_title());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>

    <small class="post-date">
        Опубликовано <?=get_the_date('d.m.Y')?>
    </small>
    <?the_content()?>

</article><!-- #post-## -->
