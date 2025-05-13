<?php
$postid = get_the_ID();
if (is_shop()) { // проверка если магазин
    $postid = wc_get_page_id('shop');
} else if (is_product_category()) { // проверка если категория
    $category = get_queried_object();
    $postid = 'product_cat_' . $category->term_id;
}
if (get_field('nuzhno_li_opisanie_posle_novostej', $postid)):
    ?>

<section class="catalog_each_house_is_unique wow fadeInUp animated" data-wow-delay="0.2s">
    <div class="container">
        <h2><?php echo get_field('zagolovok_opisanie_posle_novostej', $postid); ?></h2>
        <div class="catalog_each_house_is_unique_text">
        <?php echo get_field('tekst_opisanie_posle_novostej', $postid); ?>
         </div>
    </div>
</section>

<?php endif; ?>