<?php
/*
Template Name: Партнеры
*/ ?>

<?php get_header(); ?>



<main class="partners">
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

    <section class="partners_inner wow fadeInUp animated" data-wow-delay="0.3s">
        <div class="container">
            <?php if (have_rows('elementy_partnera')): ?>
                <div class="partners_items">
                    <?php while (have_rows('elementy_partnera')):
                        the_row(); ?>
                        <a target="_blank" href="<?php the_sub_field('ssylka_na_partnera'); ?>" class="partners_item"
                            rel="nofollow">
                            <div class="partners_item_img">
                                <?php $izobrazhenie_partnera = get_sub_field('izobrazhenie_partnera'); ?>
                                <?php if ($izobrazhenie_partnera): ?>
                                    <img src="<?php echo esc_url($izobrazhenie_partnera['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_partnera['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="partners_item_name">
                                <?php the_sub_field('imya_partnera'); ?>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
