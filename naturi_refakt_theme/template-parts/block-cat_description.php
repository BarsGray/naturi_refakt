<?php 
$postid = get_the_ID();
if(is_shop()){ // проверка если магазин
    $postid = wc_get_page_id('shop');
} else if(is_product_category()){ // проверка если категория
    $category = get_queried_object();
    $postid = 'product_cat_' . $category->term_id;
}
if(get_field('nuzhno_li_opisanie_kategorii_vnizu_straniczy', $postid)):?>
<section class="catalog_category_description ">
        <div class="container">  
            <h2><?php echo get_field('zagolovok_opisaniya_kategorii_vnizu_straniczy', $postid);?></h2>
            <div class="catalog_category_description_text content_block_hide">
            <?php echo get_field('tekst_opisaniya_kategorii_vnizu_straniczy', $postid);?>
            </div>
            <a class="content_toggle" href="#">Читать далее</a>
        </div>
    </section>
<?php endif;?>