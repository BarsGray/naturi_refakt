<?php
/*
Template Name: Страница услуг
*/ ?>

<?php get_header(); ?>

<main class="services">
    <section class="breadcrumbs">
        <div class="container">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div class="breadcrumbs_list">', '</div>');
            }
            ?>
        </div>
    </section>

    <section class="first_screen" style="background-image: url('https://naturi.su/wp-content/uploads/2019/03/bg-header.249166c9-1920x516.jpg')">
        <div class="shadow"></div>
        <div class="container">
            <div class="first_screen_content sr-animate">
                <h1 class="wow fadeInUp animated">
                    <?php the_title(); ?>
                </h1>
                <h2 class="wow fadeInUp animated" data-wow-delay="0.2s">
                    <?php the_field('podzagolovok'); ?>
                </h2>
            </div>
        </div>
    </section>

    <section class="services_items wow fadeInUp animated" data-wow-delay="0.2s">
        <div class="container">
            <?php if (have_rows('elementy_uslug')) : ?>
                <div class="services_items_inner">
                    <?php while (have_rows('elementy_uslug')) :
                        the_row(); ?>
                        <?php $ssylka_na_uslugu = get_sub_field('ssylka_na_uslugu'); ?>
                        <?php if ($ssylka_na_uslugu) : ?>
                            <?php foreach ($ssylka_na_uslugu as $post) : ?>
                                <?php setup_postdata($post); ?>
                                <a href="<?php the_permalink(); ?>" class="services_item">
                                    <div class="services_item_img">
                                        <?php $izobrazhenie_uslugi = get_sub_field('izobrazhenie_uslugi'); ?>
                                        <?php if ($izobrazhenie_uslugi) : ?>
                                            <img src="<?php echo esc_url($izobrazhenie_uslugi['url']); ?>" alt="<?php echo esc_attr($izobrazhenie_uslugi['alt']); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                </a>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <?php // No rows found 
                ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="services_text_after_items wow fadeInUp animated">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_etapy_stroitelstva'); ?>
            </h2>

            <div class="services_text_after_items-text">
                <?php the_field('tekst_v_etapah_stroitelstva'); ?>
            </div>
        </div>
    </section>


    <section class="popular_projects wow fadeInUp animated" data-wow-delay="0.2s">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_gotovyh_proektov'); ?>
            </h2>

            <div class="catalog_items">
                <?
                $product_ids = get_field('populyarnye_tovary')[0]['populyarnyj_tovary'];
                if (sizeof($product_ids)) {
                    $args = array(
                        'post_type' => 'product',
                        'post__in' => $product_ids,
                        'posts_per_page' => -1
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) :
                            $query->the_post();
                            wc_get_template_part('woocommerce/content', 'product');
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo 'Популярные товары не выбраны';
                    endif;
                }

                ?>
            </div>
            <a href="<?php the_field('ssylka_knopki_vedushhej_na_katalog'); ?>" class="house_design btn wow fadeInUp animated">
                <?php the_field('nazvanie_knopki_vedushhej_na_katalog'); ?>
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
