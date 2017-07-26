<?php

namespace Simplecov;

class Shortcodes
{

    public function __construct()
    {
        add_shortcode('reviews', [__CLASS__, 'reviewsTemplate']);
        add_shortcode('workscheme', [__CLASS__, 'workSchemeTemplate']);
        add_shortcode('objections', [__CLASS__, 'objectionsTemplate']);
        add_shortcode('order', [__CLASS__, 'orderTemplate']);
        add_shortcode('discount', [__CLASS__, 'discountTemplate']);
        add_shortcode('blog', [__CLASS__, 'blogTemplate']);
    }

    public function reviewsTemplate()
    {
        get_template_part('template-parts/relative-templates/reviews', 'reviews');
    }

    public function workSchemeTemplate()
    {
        get_template_part('template-parts/relative-templates/workscheme', 'workscheme');
    }

    public function objectionsTemplate()
    {
        get_template_part('template-parts/relative-templates/objections', 'objections');
    }

    public function orderTemplate()
    {
        get_template_part('template-parts/relative-templates/orders', 'orders');
    }

    public function discountTemplate()
    {
        get_template_part('template-parts/relative-templates/discount', 'discount');
    }

    public function blogTemplate()
    {
        get_template_part('template-parts/relative-templates/blog', 'blog');
    }

}

new \Simplecov\Shortcodes();