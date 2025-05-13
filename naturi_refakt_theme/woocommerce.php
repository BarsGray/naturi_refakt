
<?
if (is_product_category()) {
    get_header('');
    wc_get_template_part('taxonomy', 'product_cat');
} else if (is_shop()) {
    get_header('');
    wc_get_template_part('shop');
    // wc_get_template_part('archive', 'product');
} else if (is_product()) {
    get_header('single_product');
    wc_get_template_part('content-single', 'product');
} else {
    get_header('');
    the_content();
}
get_footer();

/* 
else if (is_product_category()) {
    wc_get_template_part('templates/archive', 'product');
} */