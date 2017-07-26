<?

/**
 * Create query to execute review posts
 */
$excludedCats = \Simplecov\CF::getInstance()->excludedCategoryString(PROJECTS);
$args = [
    'post_type' => 'post',
    'cat' => $excludedCats
];
$query = new WP_Query($args);

/**
 * Set class
 */
$reviewListClass = [
    'review-item'
];

?>

<section class="col-12 reviews red-stuff">
    <div class="row">

        <h2 class="col-12 stylish">Отзывы наших клиентов</h2>
        <?if ( $query->have_posts() ) :

            while ( $query->have_posts() ) : ?>

                <?
                $query->the_post();
                $image = \Simplecov\CF::getInstance()->resizeImage( wp_get_attachment_url(get_post_thumbnail_id()), 600);
                ?>

                <article id="post-<?the_ID()?>" <?post_class($reviewListClass); ?> data-toggle="modal" data-target="#reviewModal<?the_ID()?>">
                    <h2 class="review-title"><?=get_the_title()?></h2>
                    <div class="background absolute" style="background: url(<?=$image?>); background-position: 0 100%; -webkit-background-size: cover;background-size: cover;: "></div>
                    <div class="gradient"></div>
                </article>

                <!-- Modal -->
                <div class="modal fade" id="reviewModal<?the_ID()?>" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel<?the_ID()?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reviewModalLabel<?the_ID()?>"><?=get_the_title()?></h5>
                                <button type="button" class="close-it" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <img class="img-fluid" src="<?=$image?>" title="Одна из фотографий отзыва <?=get_the_title()?>">

                                <?the_content();?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Посмотреть другие</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?endwhile;
        endif?>

    </div>
</section>