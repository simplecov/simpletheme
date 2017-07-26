<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
?>

        </div><!--row-->
    </div><!--container-->
</div><!--body-wrapper-->


<footer>
    <a class="btn btn-primary" href="/contacts/">Контакты</a>
</footer>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Заказ вашего дизайн проекта</h5>
                <button type="button" class="close-it" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?=do_shortcode('[contact-form-7 id="74" title="Contact form 1"]')?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Смотреть дальше</button>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
