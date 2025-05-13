<?php
defined('ABSPATH') || exit;
global $product;
?>
<main class="product_project_page">
    <section class="section_project_page_top">
        <div class="breadcrumbs">
            <div class="container">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<div class="breadcrumbs_list">', '</div>');
                }
                ?>
            </div>
        </div>
        <div class="product_prev_next_products">
            <div class="container">
                <?php
                // get next and prev products
                ?>
                <ul>
                    <?
                    function ShowLinkToProduct($post_id, $categories_as_array, $label)
                    {
                        // get post according post id
                        $query_args = array(
                            'post__in' => array($post_id),
                            'posts_per_page' => 1,
                            'post_status' => 'publish',
                            'post_type' => 'product',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'id',
                                    'terms' => $categories_as_array
                                )
                            )
                        );
                        $r_single = new WP_Query($query_args);
                        if ($r_single->have_posts()) {
                            $r_single->the_post();
                            global $product;
                            ?>
                            <a href="<?php the_permalink() ?>"
                                title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                                <img src="<? bloginfo('template_url'); ?>/assets/img/prev_arr.svg" alt=""
                                    class="arrow_in_next_prev_products">
                                <?php echo $label; ?>
                                <p>
                                    <?php if (get_the_title())
                                        the_title();
                                    else
                                        the_ID(); ?>
                                </p>
                            </a>
                            <?php
                            wp_reset_query();
                        } ?>
                        <?
                    }

                    if (is_singular('product')) {
                        global $post;
                        // get categories
                        $terms = wp_get_post_terms($post->ID, 'product_cat');
                        foreach ($terms as $term)
                            $cats_array[] = $term->term_id;
                        // get all posts in current categories
                        $query_args = array(
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'post_type' => 'product',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'id',
                                    'terms' => $cats_array
                                )
                            )
                        );
                        $r = new WP_Query($query_args);
                        // show next and prev only if we have 3 or more
                        if ($r->post_count > 2) {
                            $prev_product_id = -1;
                            $next_product_id = -1;
                            $found_product = false;
                            $i = 0;
                            $current_product_index = $i;
                            $current_product_id = get_the_ID();
                            if ($r->have_posts()) {
                                while ($r->have_posts()) {
                                    $r->the_post();
                                    $current_id = get_the_ID();
                                    if ($current_id == $current_product_id) {
                                        $found_product = true;
                                        $current_product_index = $i;
                                    }
                                    $is_first = ($current_product_index == $first_product_index);
                                    if ($is_first) {
                                        $prev_product_id = get_the_ID(); // if product is first then 'prev' = last product
                                    } else {
                                        if (!$found_product && $current_id != $current_product_id) {
                                            $prev_product_id = get_the_ID();
                                        }
                                    }
                                    if ($i == 0) { // if product is last then 'next' = first product
                                        $next_product_id = get_the_ID();
                                    }
                                    if ($found_product && $i == $current_product_index + 1) {
                                        $next_product_id = get_the_ID();
                                    }
                                    $i++;
                                }
                                ?>

                                <li class="prev_product">
                                    <?
                                    if ($prev_product_id != -1) {
                                        ShowLinkToProduct($prev_product_id, $cats_array, "Предыдущий проект:");
                                    } ?>
                                </li>
                                <li class="next_product">
                                    <?php
                                    if ($next_product_id != -1) {
                                        ?>
                                        <?php
                                        ShowLinkToProduct($next_product_id, $cats_array, "Следущий проект:");
                                    }
                                    ?>
                                </li>
                                <?
                            }
                            wp_reset_query();
                        }
                    } ?>
                </ul>
            </div>
        </div>
    </section>


    <section class="project_page_info_about_project">
        <div class="container container_top">
            <div class="product_slider_photo wow fadeInUp animated">
                <?php do_action('woocommerce_before_single_product'); ?>
                <?php
                $product = wc_get_product(get_the_ID());
                $attachment_ids = $product->get_gallery_image_ids();
                ?>

                <!-- style -->
                <!-- <style>
  .product_slider_photo .swiper-slide{
      width: auto;
  }
  .product_slider-item{
      max-width: 100%;
      max-height: initial;
  }
  .product_slider-item a{
      height: 100%;
      width: 100%;
  }
</style> -->
                <!-- #style -->

                <div class="product_slider">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($attachment_ids as $k => $id) { ?>
                            <div class="swiper-slide product_slider-item">
                                <!-- <div class="product_slide_img_galery"> -->
                                <a href="<?= wp_get_attachment_image_url($id, 'full'); ?>" data-fancybox="group"
                                    class="header-product-slider__foto">
                                    <img src="<?= wp_get_attachment_image_url($id, 'full'); ?>" alt="">
                                </a>
                                <!-- </div> -->

                                <?php
                                if (get_field('planirovki_etazhej')): ?>
                                    <div class="product_slide_btn">
                                        <?
                                        foreach (get_field('planirovki_etazhej') as $key => $plan) {
                                            ?>
                                            <a href="<?= $plan['planirovka_etazha']['url']; ?>"
                                                data-fancybox="plans_etazha-<?= $k ?>" tabindex="<?= $k ?>">
                                                <div class="product_slide_btn_icon">
                                                    <img src="<?= $plan['planirovka_etazha']['url']; ?>" alt="" class="plan_1">
                                                    <img src="<? echo get_template_directory_uri(); ?>/html/stroi-copy/img/icon-plan.svg"
                                                        alt="" class="plan_2">
                                                </div>
                                                <p>Смотреть план
                                                    <?= ++$key ?> этажа
                                                </p>
                                            </a>
                                            <?
                                        }
                                        ?>
                                    </div>
                                    <?
                                endif;
                                ?>
                            </div>
                            <?
                        }
                        ?>
                    </div>

                    <!-- <div class="product_slider_photo_navigation">
                        <div class="swiper-button-next product_slider_photo_navigation_next"></div>
                        <div class="swiper-button-prev product_slider_photo_navigation_prev"></div>
                    </div> -->
                </div>

                <div class="product_mini_slider">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($attachment_ids as $k => $id) { ?>
                            <div class="swiper-slide product_slider-item">
                                <!-- <div class="product_slide_img_galery"> -->
                                <img src="<?= wp_get_attachment_image_url($id, 'full'); ?>" alt="">
                                <!-- </div> -->
                            </div>
                            <?
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="product_info wow fadeInUp animated">
                <!-- <div class="container"> -->
                <div class="product_info_inner">
                    <div class="product_info_inner_top">
                        <h3>
                            Проект деревянного дома
                        </h3>
                        <h1>
                            <? the_title(); ?>
                        </h1>
                        <div class="product_info_inner_top_price">
                            <?php if ($price_html = $product->get_price_html()): ?>
                                <? if ($product->get_price() > 0) { ?>
                                    <div class="catalog_item_price">
                                        <?php echo $price_html; ?>
                                    </div>
                                <? } else { ?>
                                    <div class="catalog_item_price catalog_item_price_individual">
                                        Индивидуальный Расчет
                                    </div>

                                <? } ?>
                            <?php endif; ?>
                        </div>
                        <div class="product_info_inner_order">
                            <a href="#product_order" data-fancybox="" class="btn">
                                Подать заявку
                                <?php //the_field('zagolovok_knopki_na_plashke_besplatnogo_rascheta'); ?>
                            </a>
                            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                        </div>
                    </div>

                    <div class="product_info_inner_items">
                        <?php if ($product->get_attribute('pa_ploshhad')): ?>
                            <div class="product_info_inner_item product_info_inner_item_dom">
                                <p>Площадь дома</p>
                                <div class="product_info_inner_item_square">
                                    <? echo $product->get_attribute('pa_ploshhad'); ?>
                                    <span>м<sup>2</sup></span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($product->get_attribute('pa_ploshhad-terras')): ?>
                            <div class="product_info_inner_item product_info_inner_item_terras">
                                <p>Площадь террас</p>
                                <div class="product_info_inner_item_square">
                                    <? echo $product->get_attribute('pa_ploshhad-terras'); ?>
                                    <span>м<sup>2</sup></span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($product->get_attribute('pa_etazhi')): ?>
                            <div class="product_info_inner_item product_info_inner_item_etazh">
                                <p>Кол-во этажей</p>
                                <div class="product_info_inner_item_square">
                                    <? echo $product->get_attribute('pa_etazhi'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($product->get_attribute('pa_spalni')): ?>
                            <div class="product_info_inner_item product_info_inner_item_spalen">
                                <p>Кол-во спален</p>
                                <div class="product_info_inner_item_square">
                                    <? echo $product->get_attribute('pa_spalni'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($product->get_attribute('pa_sanuzel')): ?>
                            <div class="product_info_inner_item product_info_inner_item_sanuzlov">
                                <p>Кол-во санузлов</p>
                                <div class="product_info_inner_item_square">
                                    <?php echo $product->get_attribute('pa_sanuzel'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($product->get_attribute('pa_dopolnitelno')): ?>
                            <div class="product_info_inner_item  product_info_inner_item_garazh">
                                <p>Гараж и навес</p>
                                <div class="product_info_inner_item_square">
                                    <?php
                                    $array = explode(", ", $product->get_attribute('pa_dopolnitelno'));
                                    foreach ($array as $item) {
                                        if ($item == 'Гараж')
                                            echo '<img src="/wp-content/themes/mars-web.ru/assets/img/icon-garage.png">';
                                        if ($item == 'Навес')
                                            echo '<img src="/wp-content/themes/mars-web.ru/assets/img/icon-shed.png">';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <div class="container container_bottom">
            <div class="product_info_inner_bottom">
                <div class="product__excerpt">
                    <? woocommerce_template_single_excerpt(); ?>
                </div>

                <div class="product_info_inner_bottom_social">
                    <p>Поделиться с друзьями:</p>
                    <div class="product_info_inner_bottom_social_items">
                        <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= get_permalink(); ?>">
                            <img src="<? echo get_template_directory_uri(); ?>/html/stroi-copy/img/icon-fc.png" alt="">
                        </a>

                        <a href="https://twitter.com/intent/tweet?url=<?= get_permalink(); ?>&amp;text=<?= get_the_title(); ?>"
                            target="_blank">
                            <img src="<? echo get_template_directory_uri(); ?>/html/stroi-copy/img/icon-tw.png" alt="">
                        </a>

                        <a href="http://vk.com/share.php?url=<?= get_permalink(); ?>&amp;text=<?= get_the_title(); ?>"
                            target="_blank">
                            <img src="<? echo get_template_directory_uri(); ?>/html/stroi-copy/img/icon-vk.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <?php if (get_field('vklyuchit_li_vkladki_na_dannom_tovare') == 1): ?>
                <!-- <div class="included_price wow fadeInUp animated" style="background-image:url(<?= get_field('fon') ?>);"> -->
                <div class="included_price wow fadeInUp animated">
                    <div class="container">
                        <h2>
                            <?php the_field('zagolovok_vkladok'); ?>
                        </h2>
                        <div class="included_price_tabs included_price_tabs_container">
                            <ul class="included_price_tabs_container_list">
                                <?php if (get_field('zagolovok_pervoj_vkladki')): ?>
                                    <li class="included_price_tabs_container_item included_price_tabs_container_item_active">
                                        <?php the_field('zagolovok_pervoj_vkladki'); ?>
                                    </li>
                                <? endif; ?>

                                <?php if (get_field('zagolovok_vtoroj_vladki')): ?>
                                    <li class="included_price_tabs_container_item">
                                        <?php the_field('zagolovok_vtoroj_vladki'); ?>
                                    </li>
                                <? endif; ?>

                                <?php if (get_field('zagolovok_tretej_vkladki')): ?>
                                    <li class="included_price_tabs_container_item">
                                        <?php the_field('zagolovok_tretej_vkladki'); ?>
                                    </li>
                                <? endif; ?>

                                <?php if (get_field('zagolovok_chetvertoj_vkladki')): ?>
                                    <li class="included_price_tabs_container_item">
                                        <?php the_field('zagolovok_chetvertoj_vkladki'); ?>
                                    </li>
                                <? endif; ?>

                                <?php if (get_field('zagolovok_chetvertoj_vkladki')): ?>
                                    <li class="included_price_tabs_container_item">
                                        <?php the_field('zagolovok_pyatoj_vkladki'); ?>
                                    </li>
                                <? endif; ?>
                            </ul>

                            <?php if (get_field('opisanie_v_pervoj_vkladke')): ?>
                                <div class="included_price_tabs_container_info">
                                    <h2>
                                        <?php the_field('zagolovok_pervoj_vkladki'); ?>
                                    </h2>
                                    <div class="included_price_tabs_container_info_text">
                                        <?= get_field('opisanie_v_pervoj_vkladke'); ?>
                                    </div>
                                </div>
                            <? endif; ?>

                            <?php if (get_field('opisanie_v_pervoj_vkladke')): ?>
                                <div class="included_price_tabs_container_info included_price_tabs_container_info_hidden">
                                    <h2>
                                        <?php the_field('zagolovok_vtoroj_vladki'); ?>
                                    </h2>
                                    <div class="included_price_tabs_container_info_text">
                                        <?= get_field('opisanie_vo_vtoroj_kladke'); ?>
                                    </div>
                                </div>
                            <? endif; ?>

                            <?php if (get_field('opisanie_v_pervoj_vkladke')): ?>
                                <div class="included_price_tabs_container_info included_price_tabs_container_info_hidden">
                                    <h2>
                                        <?php the_field('zagolovok_tretej_vkladki'); ?>
                                    </h2>
                                    <div class="included_price_tabs_container_info_text">
                                        <?= get_field('opisanie_tretej_vkladki'); ?>
                                    </div>
                                </div>
                            <? endif; ?>

                            <?php if (get_field('opisanie_v_pervoj_vkladke')): ?>
                                <div class="included_price_tabs_container_info included_price_tabs_container_info_hidden">
                                    <h2>
                                        <?php the_field('zagolovok_chetvertoj_vkladki'); ?>
                                    </h2>
                                    <div class="included_price_tabs_container_info_text">
                                        <?= get_field('opisanie_chetvertoj_vkladki'); ?>
                                    </div>
                                </div>
                            <? endif; ?>

                            <?php if (get_field('opisanie_v_pervoj_vkladke')): ?>
                                <div class="included_price_tabs_container_info included_price_tabs_container_info_hidden">
                                    <h2>
                                        <?php the_field('zagolovok_pyatoj_vkladki'); ?>
                                    </h2>
                                    <div class="included_price_tabs_container_info_text">
                                        <?= get_field('opisanie_pyatoj_vkladki'); ?>
                                    </div>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </section>



    <?php if (get_field('vklyuchit_li_tehnologii_na_etom_tovare') == 1): ?>
        <section class="сonstruction_technology">
            <div class="container">
                <div class="сonstruction_technology_info wow fadeInUp animated">
                    <!-- <?php if (get_field('fon_sleva_v_tehnologiyah')): ?>
                        <img src="<?php the_field('fon_sleva_v_tehnologiyah'); ?>" class="сonstruction_technology_info_img_fly">
                    <?php endif ?> -->

                    <!-- <div class="сonstruction_technology_info_img">
                        <?php if (get_field('ikonka_sleva_v_tehnologiyah')): ?>
                            <img src="<?php the_field('ikonka_sleva_v_tehnologiyah'); ?>" />
                        <?php endif ?>
                    </div> -->

                    <h2>
                        <?php the_field('zagolovok_tehnologij'); ?>
                    </h2>

                    <?php the_field('tekst_sleva_v_tehnologiyah'); ?>

                    <a href="<?php the_field('ssylka_knopki_sleva_v_tehnologiyah'); ?>" class="btn">
                        <?php the_field('zagolovok_knopki_sleva_v_tehnologiyah'); ?>
                    </a>
                </div>

                <?php if (have_rows('elementy_sprava_v_tehnologiyah')): ?>
                    <div class="сonstruction_technology_advantages_items wow fadeInUp animated" data-wow-delay="0.2s">
                        <?php while (have_rows('elementy_sprava_v_tehnologiyah')):
                            the_row(); ?>
                            <div class="сonstruction_technology_advantages_item">
                                <div class="сonstruction_technology_advantages_item_img">
                                    <?php $ikonka_pervogo_elementa_v_tehnologiyah = get_sub_field('ikonka_pervogo_elementa_v_tehnologiyah'); ?>
                                    <?php if ($ikonka_pervogo_elementa_v_tehnologiyah): ?>
                                        <img src="<?php bloginfo('template_url'); ?>/assets/img/icons technology.svg" alt="" />
                                        <!-- <img src="<?php echo esc_url($ikonka_pervogo_elementa_v_tehnologiyah['url']); ?>"
                                            alt="<?php echo esc_attr($ikonka_pervogo_elementa_v_tehnologiyah['alt']); ?>" /> -->
                                    <?php endif; ?>
                                </div>
                                <h3>
                                    <?php the_sub_field('zagolovok_pervogo_elementa_v_tehnologiyah'); ?>
                                </h3>
                                <?php the_sub_field('opisanie_pervogo_elementa_v_tehnologiyah'); ?>
                            </div>

                            <div class="сonstruction_technology_advantages_item">
                                <div class="сonstruction_technology_advantages_item_img">
                                    <?php $ikonka_vtorogo_elementa_v_tehnologiyah = get_sub_field('ikonka_vtorogo_elementa_v_tehnologiyah'); ?>
                                    <?php if ($ikonka_vtorogo_elementa_v_tehnologiyah): ?>
                                        <img src="<?php bloginfo('template_url'); ?>/assets/img/icons technology(1).svg" alt="" />
                                        <!-- <img src="<?php echo esc_url($ikonka_vtorogo_elementa_v_tehnologiyah['url']); ?>"
                                            alt="<?php echo esc_attr($ikonka_vtorogo_elementa_v_tehnologiyah['alt']); ?>" /> -->
                                    <?php endif; ?>
                                </div>
                                <h3>
                                    <?php the_sub_field('zagolovok_vtorogo_elementa_v_tehnologiyah'); ?>
                                </h3>
                                <?php the_sub_field('opisanie_vtorogo_elementa_v_tehnologiyah'); ?>
                            </div>

                            <div class="сonstruction_technology_advantages_item">
                                <div class="сonstruction_technology_advantages_item_img">
                                    <?php $ikonka_tretego_elementa_v_tehnologiyah = get_sub_field('ikonka_tretego_elementa_v_tehnologiyah'); ?>
                                    <?php if ($ikonka_tretego_elementa_v_tehnologiyah): ?>
                                        <img src="<?php bloginfo('template_url'); ?>/assets/img/icons technology(2).svg" alt="" />
                                        <!-- <img src="<?php echo esc_url($ikonka_tretego_elementa_v_tehnologiyah['url']); ?>"
                                            alt="<?php echo esc_attr($ikonka_tretego_elementa_v_tehnologiyah['alt']); ?>" /> -->
                                    <?php endif; ?>
                                </div>
                                <h3>
                                    <?php the_sub_field('zagolovok_tretego_elementa_v_tehnologiyah'); ?>
                                </h3>
                                <?php the_sub_field('opisanie_tretego_elementa_v_tehnologiyah'); ?>
                            </div>

                            <div class="сonstruction_technology_advantages_item">
                                <div class="сonstruction_technology_advantages_item_img">
                                    <?php $ikonka_chetvertogo_elementa_v_tehnologiyah = get_sub_field('ikonka_chetvertogo_elementa_v_tehnologiyah'); ?>
                                    <?php if ($ikonka_chetvertogo_elementa_v_tehnologiyah): ?>
                                        <img src="<?php bloginfo('template_url'); ?>/assets/img/icons technology(3).svg" alt="" />
                                        <!-- <img src="<?php echo esc_url($ikonka_chetvertogo_elementa_v_tehnologiyah['url']); ?>"
                                            alt="<?php echo esc_attr($ikonka_chetvertogo_elementa_v_tehnologiyah['alt']); ?>" /> -->
                                    <?php endif; ?>
                                </div>
                                <h3>
                                    <?php the_sub_field('zagolovok_chetvertogo_elementa_v_tehnologiyah'); ?>
                                </h3>
                                <?php the_sub_field('opisanie_chetvertogo_elementa_v_tehnologiyah'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                </div>
            <?php endif; ?>
        </section>
    <?php else: ?>
    <?php endif; ?>

    <?php if (get_field('pohozhie_tovary_vyvesti')): ?>
        <section class="popular_projects wow fadeInUp animated">
            <div class="container">
                <h2>
                    <?php the_field('zagolovok_pohozhie_tovary'); ?>
                </h2>
                <div class="catalog_items">
                    <?php if (have_rows('pohozhie_tovary_elementy')): ?>
                        <?php $pohozhie_tovary_elementy = get_field('pohozhie_tovary_elementy'); ?>
                        <?php if ($pohozhie_tovary_elementy): ?>
                            <?php foreach ($pohozhie_tovary_elementy as $post): ?>
                                <?php setup_postdata($post);
                                wc_get_template_part('content', 'product');
                                ?>

                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php //display_custom_related_products(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (get_field('vklyuchit_li_sekcziyu_otzyvy_v_tovarah', 'option') == 1): ?>
        <section class="reviews wow fadeInUp animated">
            <div class="container">
                <h2>
                    <?php the_field('zagolovok_otzyvov', 'option'); ?>
                </h2>
                <div class="swiper reviews_slider">
                    <?php if (have_rows('elementy_slajdera_otzyvov', 'option')): ?>
                        <div class="swiper-wrapper">
                            <?php while (have_rows('elementy_slajdera_otzyvov', 'option')):
                                the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="reviews_slider_inner">
                                        <div class="reviews_slider_inner_text">
                                            <div class="reviews_slider_inner_name">
                                                <?php the_sub_field('imya_klienta_ostavivshego_otzyv'); ?>
                                            </div>
                                            <div class="reviews_slider_inner_title">
                                                <?php the_sub_field('lejbl_v_otzyve'); ?>
                                            </div>
                                            <div class="reviews_slider_inner_description">
                                                <?php the_sub_field('tekst_otzyva'); ?>
                                            </div>
                                        </div>

                                        <a href="<?php the_sub_field('ssylka_na_video_otzyv'); ?>" data-fancybox data-type="iframe">
                                            <?php $izobrazhenie_ostavivshego_otzyv = get_sub_field('izobrazhenie_ostavivshego_otzyv'); ?>
                                            <?php if ($izobrazhenie_ostavivshego_otzyv): ?>
                                                <img src="<?php echo esc_url($izobrazhenie_ostavivshego_otzyv['url']); ?>"
                                                    alt="<?php echo esc_attr($izobrazhenie_ostavivshego_otzyv['alt']); ?>" />
                                            <?php endif; ?>
                                            <div class="play_btn">
                                                <!-- <img src="/wp-content/uploads/2024/07/icon-play.png" alt=""> -->
                                                <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="52" height="52" fill="#FF8156"></rect>
                                                        <path d="M38 26L20 15.6077L20 36.3923L38 26Z" fill="white"></path>
                                                    </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <?php // No rows found ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination reviews_slider_pagination"></div>
                <div class="swiper-button-next reviews_slider_nagination-next"></div>
                <div class="swiper-button-prev reviews_slider_nagination-prev"></div>
            </div>
        </section>
    <?php else: ?>
    <?php endif; ?>

    <?php if (get_field('vklyuchit_plashku_besplatnogo_rascheta') == 1): ?>
        <section class="cost_calculation wow fadeInUp animated">
            <div class="container">
                <div class="cost_calculation_wrap">
                    <div class="cost_calculation_wrap_title">
                        <?php $ikonka_na_plashke_besplatnogo_rascheta = get_field('ikonka_na_plashke_besplatnogo_rascheta'); ?>
                        <?php if ($ikonka_na_plashke_besplatnogo_rascheta): ?>
                            <img src="<?php echo esc_url($ikonka_na_plashke_besplatnogo_rascheta['url']); ?>"
                                alt="<?php echo esc_attr($ikonka_na_plashke_besplatnogo_rascheta['alt']); ?>" />
                        <?php endif; ?>
                        <?php the_field('tekst_na_plashke_besplatnogo_rasscheta'); ?>
                    </div>

                    <a href="<?php the_field('ssylka_knopki_na_plashke_besplatnogo_rascheta'); ?>"
                        class="cost_calculation_wrap_btn btn" data-fancybox>
                        <?php the_field('zagolovok_knopki_na_plashke_besplatnogo_rascheta'); ?>
                    </a>
                </div>
            </div>
        </section>
    <?php else: ?>
    <?php endif; ?>

    <?php if (get_field('vklyuchit_video_galereyu_v_tovare', 'option') == 1): ?>
        <section class="video_galery wow fadeInUp animated">
            <div class="container">
                <div class="galery_title">
                    <h2>
                        <?php the_field('zagolovok_video_galerei', 'option'); ?>
                    </h2>
                    <a href="<?php the_field('ssylka_na_socz_set_v_video_galerei', 'option'); ?>" target="_blank">
                        <?php $ikonka_soczialnoj_seti_video_galerei = get_field('ikonka_soczialnoj_seti_video_galerei', 'option'); ?>
                        <?php if ($ikonka_soczialnoj_seti_video_galerei): ?>
                            <img src="<?php echo esc_url($ikonka_soczialnoj_seti_video_galerei['url']); ?>"
                                alt="<?php echo esc_attr($ikonka_soczialnoj_seti_video_galerei['alt']); ?>" />
                        <?php endif; ?>
                        <p>
                            <?php the_field('tekst_socz_seti_video_galerei', 'option'); ?>
                        </p>
                    </a>
                </div>
                <?php if (have_rows('elementy_videogalerii', 'option')): ?>
                    <ul class="video_galery_items">
                        <?php while (have_rows('elementy_videogalerii', 'option')):
                            the_row(); ?>
                            <li class="wow fadeInUp animated">
                                <a href="<?php the_sub_field('ssylka_elementa_video_galerei_v_tovare_na_video'); ?>" data-fancybox
                                    data-type="iframe">
                                    <div class="video_galery_item_info_others video_galery_item_info_others_icon_play">
                                        <div class="video_galery_item_info_others_icon"></div>
                                    </div>
                                    <figure>
                                        <?php $izobrazhenie_video_galerei_v_tovare = get_sub_field('izobrazhenie_video_galerei_v_tovare'); ?>
                                        <?php if ($izobrazhenie_video_galerei_v_tovare): ?>
                                            <img src="<?php echo esc_url($izobrazhenie_video_galerei_v_tovare['url']); ?>"
                                                alt="<?php echo esc_attr($izobrazhenie_video_galerei_v_tovare['alt']); ?>" />
                                        <?php endif; ?>
                                        <figcaption>
                                            <div class="video_galery_item_info">
                                                <h2>
                                                    <?php the_sub_field('zagolovok_elementa_video_galerei_v_tovare'); ?>
                                                </h2>
                                                <div class="video_galery_item_info_others">
                                                    <div class="video_galery_item_info_others_icon"></div>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
                <?php // echo 'true'; ?>
            </div>
        </section>
    <?php else: ?>
        <?php // echo 'false'; ?>
    <?php endif; ?>
</main>