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


<div class="catalog_item catalog_item_ad">
    <!--     <a class="catalog_item_img" href="<?= get_field('ssylka_na_straniczu', 10); ?>">
        <div class="catalog_item_img catalog_item-ad_text-foto">
            <img src="<?= get_field('fonovaya_kartinka', 10)['url']; ?>" alt="<?= get_field('tekst_1', 10); ?>"
                itemprop="image">
            <div class="catalog_item_info catalog_item_ad_text">
                <div class="catalog_item__title">
                    <?= get_field('tekst_1', 10); ?>
                </div>
            </div>
        </div>
        <div class="catalog_item-ad_text-2">
            <?= get_field('tekst_2', 10); ?>
        </div>
        <div class="catalog-item__desc catalog_item-ad_text-3">
            <?= get_field('tekst_3', 10); ?>
        </div>
    </a> -->

    <a href="<?= get_field('ssylka_na_straniczu', 10); ?>" class="catalog_item_img">
        <img src="<?= get_field('fonovaya_kartinka', 10)['url']; ?>" alt="<?= get_field('tekst_1', 10); ?>"
            itemprop="image" class="img_product">
        <div class="catalog_item_photo_info">
            <div class="catalog_item_title">
                <?= get_field('tekst_1', 10); ?>
            </div>
        </div>
    </a>
    <a href="<?= get_field('ssylka_na_straniczu', 10); ?>" class="catalog_item_info">
        <div class="catalog_item_info_desc">
            <div class="catalog_item_info_desc_text catalog_item_info_desc_text_title">
                <?= get_field('tekst_2', 10); ?>
            </div>
            <div class="catalog_item_info_desc_text">
                <?= get_field('tekst_3', 10); ?>
            </div>
        </div>
    </a>
</div>