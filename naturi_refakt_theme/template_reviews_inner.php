<?php
/*
Template Name: Отзывы
*/ ?>

<?php get_header(); ?>

<main class="reviews_inner_page">
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
        <div class="container">
            <div class="first_screen_cont wow fadeInUp animated">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <section class="reviews_inner_page_block">
        <div class="container">
            <?php if (have_rows('element_otzyva')): ?>
                <div class="reviews_inner_page_items">
                    <?php while (have_rows('element_otzyva')):
                        the_row(); ?>
                        <div class="reviews_inner_page_item wow fadeInUp animated" data-wow-delay="0.2s">
                            <div class="reviews_inner_page_item_img">
                                <?php $izobrazhenie_doma_v_otzyve = get_sub_field('izobrazhenie_doma_v_otzyve'); ?>
                                <?php if ($izobrazhenie_doma_v_otzyve): ?>
                                    <img src="<?php echo esc_url($izobrazhenie_doma_v_otzyve['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_doma_v_otzyve['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <h2>
                                <?php the_sub_field('nazvanie_proekta_v_otzyve'); ?>
                            </h2>
                            <div class="reviews_inner_page_item_name">
                                <?php the_sub_field('imya_klienta_v_otzyve'); ?>
                            </div>
                            <div class="reviews_inner_page_item_text">
                                <?php the_sub_field('tekst_otzyva_klienta'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
