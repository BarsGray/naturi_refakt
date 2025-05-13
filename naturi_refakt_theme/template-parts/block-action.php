<?php 
$postid = get_the_ID();
if(is_shop()){ // проверка если магазин
    $postid = wc_get_page_id('shop');
} else if(is_product_category()){ // проверка если категория
    $category = get_queried_object();
    $postid = 'product_cat_' . $category->term_id;
}
if(get_field('nuzhna_li_plashka_s_prizyvom', $postid)):?>
<section class="cost_calculation wow fadeInUp animated">
    <div class="container">
        <div class="cost_calculation_wrap">
            <?php $plashka = get_field('plashka_s_prizyvom', $postid);?>
            <div class="cost_calculation_wrap_title">
                <img src="<?php echo $plashka['ikonka_na_plashke_s_prizyvom'];?>" alt="">
                <p><?php echo $plashka['tekst_na_plashka_s_prizyvom'];?></p>                
            </div>
            <a href="<?php echo $plashka['ssylka_knopki_na_plashke'];?>" class="cost_calculation_wrap_btn btn"><?php echo $plashka['naimenovanie_knopki_na_plashke'];?></a>
        </div>
    </div>
</section>
<?php endif;?>