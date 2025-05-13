<?php
/*
Template Name: СМИ о нас
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
            <div class="partners_items">
                <?php if (have_rows('elementy_smi')): ?>
                    <?php while (have_rows('elementy_smi')):
                        the_row(); ?>
                        <?php $ssylka_na_fajl_smi = get_sub_field('ssylka_na_fajl_smi'); ?>
                        <?php if ($ssylka_na_fajl_smi): ?>
                            <a target="_blank" href="<?php echo esc_url($ssylka_na_fajl_smi['url']); ?>" class="partners_item">
                                <div class="partners_item_img">
                                    <?php $izobrazhenie_smi = get_sub_field('izobrazhenie_smi'); ?>
                                    <?php if ($izobrazhenie_smi): ?>
                                        <img src="<?php echo esc_url($izobrazhenie_smi['url']); ?>"
                                            alt="<?php echo esc_attr($izobrazhenie_smi['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class=" partners_item_name">
                                    <?php the_sub_field('nazvanie_smi_elementa'); ?>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
