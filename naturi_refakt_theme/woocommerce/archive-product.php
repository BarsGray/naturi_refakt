<main class="catalog">
    <section class="breadcrumbs">
        <div class="container">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div class="breadcrumbs_list">', '</div>');
            }
            ?>
        </div>
    </section>
    <section class="first_screen">
        <div class="shadow"></div>
        <div class="container">
            <div class="first_screen_content sr-animate">
                <h1 class="wow fadeInUp animated">
                    <? the_archive_title(); ?>
                </h1>
                <h2 class="wow fadeInUp animated" data-wow-delay="0.3s">
                    Мы работаем в экосистеме здоровья и комфорта
                </h2>
            </div>
        </div>
    </section>
    <section class="catalog_inner">
        <div class="container">
            <div class="catalog_inner_items">
                <div class="catalog_inner_sidebar">
                    <?php echo do_shortcode("[wpf-filters id=1]"); ?>
                </div>
                <div class="catalog_items">
                    <ul class="products">
                        <?php
                        if (woocommerce_product_loop()) {
                            if (wc_get_loop_prop('total')) {
                                $count = 0;
                                $poryadok_vyvod = 0;
                                if (get_field('poryadok_vyvoda', 10)) {
                                    $poryadok_vyvoda = get_field('poryadok_vyvoda', 10);
                                }
                                while (have_posts()) {
                                    the_post();
                                    if ($poryadok_vyvoda != 0) {
                                        if ($count % $poryadok_vyvoda == 0 && $count != 0) {
                                            wc_get_template_part('woocommerce/content', 'product_ad');
                                        }
                                        $count++;
                                    }
                                    wc_get_template_part('woocommerce/content', 'product');
                                }
                            }
                        } else {
                            do_action('woocommerce_no_products_found');
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/block', 'news'); ?>
    <?php get_template_part('template-parts/block', 'after_news'); ?>
    <?php get_template_part('template-parts/block', 'action'); ?>
    <?php get_template_part('template-parts/block', 'cat_description'); ?>
</main>