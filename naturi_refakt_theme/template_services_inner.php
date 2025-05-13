<?php
/*
Template Name: Услуги внутреняя
*/ ?>

<?php get_header(); ?>

<main class="services_inner">
    <section class="breadcrumbs">
        <div class="container">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div class="breadcrumbs_list">', '</div>');
            }
            ?>
        </div>
    </section>

    <section class="first_screen" style="background-image: url('<?php the_field('zadnij_fon'); ?>')">
        <div class="container">
            <div class="first_screen_cont">
                <h1 class="wow fadeInUp animated">
                    <?php the_field('zagolovok_straniczy'); ?>
                </h1>
                <h2 class="wow fadeInUp animated" data-wow-delay="0.3s">
                    <?php the_field('tekst_posle_zagolovka'); ?>
                </h2>
                <a href="<?php the_field('ssylka_knopki_v_pervom_bloke'); ?>" data-fancybox=""
                    class="btn wow fadeInUp animated" data-wow-delay="0.4s">
                    <?php the_field('nazvanie_knopki_v_pervom_blok'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="services_inner_description sr-animate wow fadeInUp animated">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_vtorogo_bloka'); ?>
            </h2>
            <div class="services_inner_description_text">
                <?php the_field('tekst_vtorogo_bloka'); ?>
            </div>
        </div>
    </section>

    <section class="services_inner_specifications">
        <div class="container">
            <?php if (have_rows('speczifikaczii')): ?>
                <div class="services_inner_specifications_items">
                    <?php while (have_rows('speczifikaczii')):
                        the_row(); ?>
                        <div class="services_inner_specifications_item wow fadeInUp animated">
                            <div class="services_inner_specifications_item_img">
                                <?php $izobrazhenie_speczifikaczii = get_sub_field('izobrazhenie_speczifikaczii'); ?>
                                <?php if ($izobrazhenie_speczifikaczii): ?>
                                    <img src="<?php echo esc_url($izobrazhenie_speczifikaczii['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_speczifikaczii['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <h3>
                                <?php the_sub_field('zagolovok_speczifikaczii'); ?>
                            </h3>
                            <?php the_sub_field('opisanie_speczifikaczii'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found 
                    ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="services_inner_philosophy technology_philosophy">
        <div class="container">
            <div class="services_inner_philosophy technology_philosophy_inner wow fadeInUp animated">
                <?php the_field('lozung_na_sekczii'); ?>
            </div>
        </div>
    </section>

    <section class="services_inner_sliders">
        <div class="services_inner_sliders_wrapper">
            <div class="swiper services_inner_slider ">
                <?php if (have_rows('elementy_slajdera')): ?>
                    <div class="swiper-wrapper">
                        <?php while (have_rows('elementy_slajdera')):
                            the_row(); ?>
                            <div class="swiper-slide">
                                <div class="services_inner_slide_block">
                                    <div class="services_inner_slide_block_img">
                                        <?php $izobrazhenie_slajdera = get_sub_field('izobrazhenie_slajdera'); ?>
                                        <?php if ($izobrazhenie_slajdera): ?>
                                            <img src="<?php echo esc_url($izobrazhenie_slajdera['url']); ?>"
                                                alt="<?php echo esc_attr($izobrazhenie_slajdera['alt']); ?>" />
                                        <?php endif; ?>
                                    </div>

                                    <?php if (have_rows('marker_na_fotografii')): ?>
                                        <?php while (have_rows('marker_na_fotografii')):
                                            the_row(); ?>
                                            <div class="services_inner_slide_block_img_point"
                                                style="top: <?php the_sub_field('otstup_markera_sverhu'); ?>%;left: <?php the_sub_field('otstup_markera_snizu'); ?>%">
                                                <div class="services_inner_slide_block_img_point_text">
                                                    <div class="name">
                                                        <?php the_sub_field('nazvanie_markera'); ?>
                                                    </div>
                                                    <div class="country">
                                                        <?php the_sub_field('opisanie_markera'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <?php // No rows found 
                                                    ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <?php // No rows found 
                        ?>
                <?php endif; ?>
            </div>

            <!-- <div class="container"> -->
                <!-- <div class="services_inner_slider_navigation"> -->
                    <div class="swiper-button-next services_inner_slider_navigation_next"></div>
                    <div class="services_inner_slider_pagination">
                        <div class="swiper-pagination services_inner_slider_pagination_inner"></div>
                    </div>
                    <div class="swiper-button-prev services_inner_slider_navigation_prev"></div>
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </section>

    <section class="services_inner_description sr-animate wow fadeInUp animated">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_teksta_posle_slajdera'); ?>
            </h2>
            <div class="services_inner_description_text">
                <?php the_field('sam_tekst_posle_slajdera'); ?>
            </div>
        </div>
    </section>

    <?php if (get_field('pokazat_etapy_rabot') == 1): ?>
        <section class="services_inner_detail_stages">
            <div class="container">
                <?php if (have_rows('etapy_rabot')): ?>
                    <div class="services_inner_detail_stages_items">
                        <?php while (have_rows('etapy_rabot')):
                            the_row(); ?>
                            <div class="services_inner_detail_stages_item">
                                <div class="services_inner_detail_stages_item_number">
                                    <span><?php the_sub_field('nomer_etapa_rabot'); ?></span>
                                </div>

                                <div class="services_inner_detail_stages_item_description">
                                    <h3>
                                        <?php the_sub_field('zagolovok_etapa_rabot'); ?>
                                    </h3>
                                    <div class="services_inner_detail_stages_item_description_text">
                                        <?php the_sub_field('opisanie_etapa_rabot'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <?php // No rows found 
                            ?>
                <?php endif; ?>
            </div>
        </section>
    <?php else: ?>
        <?php // echo 'false'; 
            ?>
    <?php endif; ?>

    <section class="services_inner_form">
        <div class="container">
            <div class="contact_form wow fadeInUp animated">
                <h2>
                    <?php the_field('zagolovok_formy'); ?>
                </h2>
                <?php
                $ssylka_na_formu = get_field("ssylka_na_formu");
                echo do_shortcode("$ssylka_na_formu"); ?>
            </div>
        </div>
    </section>

    <section class="services_inner_detail_text wow fadeInUp animated">
        <div class="container">
            <div class="services_inner_detail_text_title">
                <?php the_field('tekst_pered_uslugami'); ?>
            </div>
        </div>
    </section>

    <section class="services_items wow fadeInUp animated services_items_none_margin" data-wow-delay="0.2s">
        <div class="container">
            <?php if (have_rows('uslugi', 'option')): ?>
                <div class="services_items_inner">
                    <?php while (have_rows('uslugi', 'option')):
                        the_row(); ?>
                        <?php $ssylka_na_uslugu = get_sub_field('ssylka_na_uslugu'); ?>
                        <?php if ($ssylka_na_uslugu): ?>
                            <?php foreach ($ssylka_na_uslugu as $post): ?>
                                <?php setup_postdata($post); ?>
                                <a href="<?php the_permalink(); ?>" class="services_item">
                                    <div class="services_item_img">
                                        <?php $ikonka_uslugi = get_sub_field('ikonka_uslugi'); ?>
                                        <?php if ($ikonka_uslugi): ?>
                                            <img src="<?php echo esc_url($ikonka_uslugi['url']); ?>"
                                                alt="<?php echo esc_attr($ikonka_uslugi['alt']); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <?php the_title(); ?>
                                </a>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found 
                    ?>
            <?php endif; ?>
        </div>
    </section>



</main>

<?php get_footer(); ?>
