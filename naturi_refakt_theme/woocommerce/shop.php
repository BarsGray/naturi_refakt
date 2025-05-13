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
                        if (isset($_GET['wpf_fbv'])) { // если есть параметр get фильтрации
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
                        } else { // вывод всех с кнопкой Загрузить еще
                            
                            $paged = isset($_GET['paged']) ? intval($_GET['paged']) : 1;
                            $args = array(
                                'post_type' => 'product',
                                // 'posts_per_page' => 16,
                                'paged' => $paged,
                                'post_status' => 'publish',
                            );
                            $loop = new WP_Query($args);

                            if ($loop->have_posts()) {
                                $count = 0;
                                $poryadok_vyvod = 0;
                                
                                if (get_field('poryadok_vyvoda', 10)) {
                                    $poryadok_vyvod = get_field('poryadok_vyvoda', 10);
                                }

                                while ($loop->have_posts()) {
                                    $loop->the_post();

                                    if ($poryadok_vyvod != 0) {
                                        if ($count % $poryadok_vyvod == 0 && $count != 0) {
                                            wc_get_template_part('woocommerce/content', 'product_ad');
                                        }
                                        $count++;
                                    }

                                    wc_get_template_part('woocommerce/content', 'product');
                                }
                                
                                if ($loop->max_num_pages > $paged) {
                                    ?>
                                    <div class="news_btn">
                                        <button id="load_products" class="btn" data-page="<?php echo $paged + 2; // 2 т.к. выводим в начале выводим 24 товара в настройка админки а выводится по 12?>">Больше домов</button>
                                    </div>
                                    <?php
                                }
                            } else {
                                do_action('woocommerce_no_products_found');
                            }
                            wp_reset_postdata();
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