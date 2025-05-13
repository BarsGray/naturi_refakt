<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

?>

<?php $product_ID = get_the_ID(); ?>
<?php $post_thumbnail_id = $product->get_image_id(); ?>

<div class="catalog_item">
    <a href="<?= get_the_permalink($product->get_id()); ?>" class="catalog_item_img">
        <?php
        $url = '/wp-content/uploads/woocommerce-placeholder.png'; // адрес по-умолчанию
        if (wp_get_attachment_url($post_thumbnail_id)) {
            $url = wp_get_attachment_url($post_thumbnail_id);
        }
        ?>
        <img src="<?php echo $url; ?>" alt="" class="img_product">
        <div class="catalog_item_photo_info">
            <div class="catalog_item_title">
                <?php the_title(); ?>
            </div>

            <?php if ($price_html = $product->get_price_html()): ?>
                <? if ($product->get_price() > 0) { ?>
                    <div class="catalog_item_price">
                        <?php echo $price_html; ?>
                        <!-- &#8381; -->
                    </div>
                <? } else { ?>
                    <div class="catalog_item_price catalog_item_price_individual">
                        Индивидуальный Расчет
                    </div>

                <? } ?>
            <?php endif; ?>

        </div>
    </a>
    <a href="<?= get_the_permalink($product->get_id()); ?>" class="catalog_item_info">
        <div class="catalog_item_info_items">
            <!--             <?
            $planers = get_field('planirovki', $product_ID);
            if ($planers) {
                foreach ($planers as $k => $planer) { ?>
                    <div class="catalog_item_info_item">
                        <div class="catalog_item_info_inner_title">
                            <img src="<?php echo $planer['planirovka']; ?>" alt="">
                        </div>
                        <div class="catalog_item_info_inner_quantity">
                            <?php
                            switch ($planer['tip']) {
                                case 'Этажность':
                                    echo $product->get_attribute('pa_etazhi');
                                    break;
                                case 'Спальни':
                                    echo $product->get_attribute('pa_spalni');
                                    break;
                                case 'Санузел':
                                    echo $product->get_attribute('pa_sanuzel');
                                    break;
                            }
                            ; ?>
                        </div>
                    </div>

                <? }
            }
            ?> -->

            <?php if ($product->get_attribute('pa_etazhi')): ?>
                <div class="catalog_item_info_item">
                    <div class="catalog_item_info_inner_title">
                        <?php //if (get_field('izobrazhenie_etazhnosti')): ?>
                            <!-- <img src="<?php //the_field('izobrazhenie_etazhnosti'); ?>" /> -->
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/icon_floor_yarc.svg" />
                        <?php //endif ?>
                    </div>

                    <div class="catalog_item_info_inner_quantity">
                        <?php echo $product->get_attribute('pa_etazhi'); ?>
                        <span>этажа</span>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($product->get_attribute('pa_spalni')): ?>
                <div class="catalog_item_info_item">
                    <div class="catalog_item_info_inner_title">
                        <?php //if (get_field('izobrazhenie_spalen')): ?>
                            <!-- <img src="<?php //the_field('izobrazhenie_spalen'); ?>" /> -->
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/icon_bedroom_yarc.svg" />
                            <?php //endif ?>
                    </div>

                    <div class="catalog_item_info_inner_quantity">
                        <?php echo $product->get_attribute('pa_spalni'); ?>
                        <span>спальни</span>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($product->get_attribute('pa_sanuzel')): ?>
                <div class="catalog_item_info_item">
                    <div class="catalog_item_info_inner_title">
                        <?php //if (get_field('izobrazhenie_san_uzla')): ?>
                            <!-- <img src="<?php //the_field('izobrazhenie_san_uzla'); ?>" /> -->
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/icon_bathroom_yarc.svg" />
                            <?php //endif ?>
                    </div>

                    <div class="catalog_item_info_inner_quantity">
                        <?php echo $product->get_attribute('pa_sanuzel'); ?>
                        <span>санузла</span>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="catalog_item_info_desc">
            <?php
            $ploshhad = $product->get_attribute('ploshhad');
            if ($ploshhad) { ?>
                <div class="catalog_item_info_desc_inner">
                    <div class="catalog_item_info_desc_title">Дом</div>
                    <div class="catalog_item_info_desc_sq">
                        <?= $ploshhad; ?><span>м<sup>2</sup></span>
                    </div>
                </div>
            <?php }
            ?>
            <?php
            $ploshhad_terras = $product->get_attribute('ploshhad-terras');
            if ($ploshhad_terras) { ?>
                <div class="catalog_item_info_desc_inner">
                    <div class="catalog_item_info_desc_title">Терраса</div>
                    <div class="catalog_item_info_desc_sq">
                        <?= $ploshhad_terras; ?><span>м<sup>2</sup></span>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </a>

    <!-- <?php echo do_shortcode("[yith_compare_button]"); ?> -->
    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>

</div>