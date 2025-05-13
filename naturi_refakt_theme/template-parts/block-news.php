<?php
$postid = get_the_ID();
if (is_shop()) { // проверка если магазин
    $postid = wc_get_page_id('shop');
} else if (is_product_category()) { // проверка если категория
    $category = get_queried_object();
    $postid = 'product_cat_' . $category->term_id;
}
if (get_field('vklyuchit_novosti_na_dannoj_stranicze', $postid)):
    ?>
    <section class="catalog_news">
        <div class="container">
            <div class="catalog_news_items">
                <?php foreach (get_field('novosti', $postid) as $item): ?>
                    <!-- <div class="catalog_news_item" style="background: url(<?php // $item['izobrazhenie_novosti'] ?>);"> -->
                    <div class="catalog_news_item">
                        <?php if ($item['izobrazhenie_novosti']): ?>
                            <!-- <div class="catalog_news_item_head">
                                <?php //$item['zagolovok_topa_novosti']; ?>
                            </div> -->
                            <div class="catalog_news_item_img">
                                <?php if ($item['izobrazhenie_novosti']): ?>
                                    <img src="<?= $item['izobrazhenie_novosti'] ?>" alt="" />
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($item['zagolovok_novosti']): ?>
                            <div class="catalog_news_item_name">
                                <?= $item['zagolovok_novosti']; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($item['nazvanie_ssylka_na_novost']): ?>
                            <a href="<?= $item['ssylka_na_novost'] ?>" <?= ($item['novost_otkryvaet_modalku']) ? 'data-fancybox' : ''?>>
                                <?= $item['nazvanie_ssylka_na_novost']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>