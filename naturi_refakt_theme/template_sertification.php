<?php
/*
Template Name: Сертификаты
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
            <?php if (have_rows('elementy_sertifikata')): ?>
                <div class="partners_items">
                    <?php while (have_rows('elementy_sertifikata')):
                        the_row(); ?>
                        <?php $izobrazhenie_sertifikata = get_sub_field('izobrazhenie_sertifikata'); ?>
                        <a href="<?php echo esc_url($izobrazhenie_sertifikata['url']); ?>" data-fancybox="certificat"
                            class="partners_item">
                            <div class="partners_item_img">
                                <?php if ($izobrazhenie_sertifikata): ?>
                                    <img src="<?php echo esc_url($izobrazhenie_sertifikata['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_sertifikata['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="partners_item_name">
                                <?php the_sub_field('nazvanie_sertifikata'); ?>
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
