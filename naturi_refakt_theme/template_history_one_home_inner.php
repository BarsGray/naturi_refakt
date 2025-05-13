<?php
/*
Template Name: История одного дома внутренняя
*/ ?>

<?php get_header(); ?>
<main class="history_one_home_inner">
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
                    <?php echo the_title(); ?>
                </h1>
                <div class="history_house_detail_itog">
                    <div class="swiper history_house_detail_itog_slider">
                        <?php if (have_rows('elementy_posle_zagolovka')): ?>
                            <div class="swiper-wrapper history_house_detail_itog_slider_wrapper">
                                <?php while (have_rows('elementy_posle_zagolovka')):
                                    the_row(); ?>
                                    <div class="swiper-slide wow fadeInUp animated history_house_detail_itog_slide"
                                        data-wow-delay="0.1s">
                                        <div class="history_house_detail_itog_slide_content">
                                            <div class="history_house_detail_itog_slide_content_top">
                                                <?php if (get_sub_field("tekst_verhu_v_elemente_v_pervoj_sekczii")) { ?>
                                                    <?php the_sub_field("tekst_verhu_v_elemente_v_pervoj_sekczii"); ?><span>м<sup>2</sup></span>
                                                <?php } ?>
                                                <?php $izobrazhenie_sverhu_v_elemente_pri_otsutstvii_teksta_v_pervoj_sekczii = get_sub_field('izobrazhenie_sverhu_v_elemente_pri_otsutstvii_teksta_v_pervoj_sekczii'); ?>
                                                <?php if ($izobrazhenie_sverhu_v_elemente_pri_otsutstvii_teksta_v_pervoj_sekczii): ?>
                                                    <img src="<?php echo esc_url($izobrazhenie_sverhu_v_elemente_pri_otsutstvii_teksta_v_pervoj_sekczii['url']); ?>"
                                                        alt="<?php echo esc_attr($izobrazhenie_sverhu_v_elemente_pri_otsutstvii_teksta_v_pervoj_sekczii['alt']); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <div class="history_house_detail_itog_slide_content_text">
                                                <?php the_sub_field('opisanie_elementa_v_pervoj_sekczii'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="history_one_home_inner_detail_3d wow fadeInUp animated">
        <div class="container">
            <h2 class="wow fadeInUp animated">
                <?php the_field('zagolovok_vtorogo_bloka'); ?>
            </h2>

            <div class="history_one_home_inner_detail_3d_text wow fadeInUp animated" data-wow-delay="0.4s">
                <div class="history_one_home_inner_detail_3d_text">
                    <?php the_field('tekst_vtorogo_bloka'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="cost_calculation wow fadeInUp animated">
        <div class="container">
            <div class="cost_calculation_wrap">
                <div class="cost_calculation_wrap_title">
                    <?php $ikonka_plashki_besplatnogo_rascheta = get_field('ikonka_plashki_besplatnogo_rascheta'); ?>
                    <?php if ($ikonka_plashki_besplatnogo_rascheta): ?>
                        <img src="<?php echo esc_url($ikonka_plashki_besplatnogo_rascheta['url']); ?>"
                            alt="<?php echo esc_attr($ikonka_plashki_besplatnogo_rascheta['alt']); ?>" />
                    <?php endif; ?>
                    <?php the_field('lozung_na_sekczii'); ?>
                </div>
                <a href="<?php the_field('ssylka_na_knopke_s_besplatnym_raschetom'); ?>"
                    class="cost_calculation_wrap_btn btn" data-fancybox>
                    <?php the_field('nazvanie_knopki_s_besplatnym_raschetom'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="services_inner_sliders">
        <div class="services_inner_sliders_wrapper">
            <div class="services_inner_slider_text">
                <?php the_field('letayushhij_tekst_sleva_ot_slajdera'); ?>
            </div>
            <div class="swiper services_inner_slider">
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
                                        <?php // No rows found ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>

            <div class="container">
                <div class="services_inner_slider_navigation">
                    <div class="swiper-button-next services_inner_slider_navigation_next"></div>
                    <div class="services_inner_slider_pagination">
                        <div class="swiper-pagination services_inner_slider_pagination_inner"></div>
                    </div>
                    <div class="swiper-button-prev services_inner_slider_navigation_prev"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="services_inner_specifications">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_tehnicheskih_harakteristik'); ?>
            </h2>
            <div class="services_inner_specifications_items">


                <?php if (have_rows('elementy_tehnicheskih_harakteristik')): ?>
                    <?php while (have_rows('elementy_tehnicheskih_harakteristik')):
                        the_row(); ?>
                        <div class="services_inner_specifications_item wow fadeInUp animated">
                            <div class="services_inner_specifications_item_img">
                                <?php $izobrazhenie_tehnicheskoj_harakteristiki = get_sub_field('izobrazhenie_tehnicheskoj_harakteristiki'); ?>
                                <?php if ($izobrazhenie_tehnicheskoj_harakteristiki): ?>
                                    <img src="<?php echo esc_url($izobrazhenie_tehnicheskoj_harakteristiki['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_tehnicheskoj_harakteristiki['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <h3>
                                <?php the_sub_field('zagolovok_tehnicheskoj_harakteristiki'); ?>
                            </h3>
                            <?php the_sub_field('opisanie_tehnicheskoj_harakteristiki'); ?>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="history_house_detail_plaining wow fadeInUp animated">
        <div class="container">
            <div class="history_house_detail_plaining_items">
                <!-- <div class="history_house_detail_plaining_item hidden">
                    <div class="history-house-detail-plaining__title h2">
                        <?php the_field('planirovka_zagolovok'); ?>
                    </div>
                </div>

                <div class="history_house_detail_plaining_item hidden">
                    <div id="tabs"
                        class="history-house-detail-plaining__tabs ui-tabs ui-corner-all ui-widget ui-widget-content">
                        <ul class="history-house-detail-plaining__tab ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header"
                            role="tablist">
                            <li role="tab" tabindex="0"
                                class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active"
                                aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true"
                                aria-expanded="true">
                                <a href="#tabs-1" class="history-house-detail-plaining__tab-link ui-tabs-anchor"
                                    role="presentation" tabindex="-1" id="ui-id-1">1 этаж</a>
                            </li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                                aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false"
                                aria-expanded="false">
                                <a href="#tabs-2" class="history-house-detail-plaining__tab-link ui-tabs-anchor"
                                    role="presentation" tabindex="-1" id="ui-id-2">2 этаж</a>
                            </li>
                        </ul>
                        <div id="tabs-1" aria-labelledby="ui-id-1" role="tabpanel"
                            class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="false">
                            <a href="https://naturi.su/wp-content/uploads/2019/03/Korvet_00001pl.jpg" data-fancybox=""
                                class="history-house-detail-plaining__img">
                                <figure class="plaining-figure">
                                    <img src="https://naturi.su/wp-content/uploads/2019/03/Korvet_00001pl-324x300.jpg"
                                        class="plaining-figure__img" alt="План 1 этажа">
                                    <figcaption class="plaining-figcaption">
                                        <div class="plaining-figcaption__click">Увеличить изображение</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div id="tabs-2" aria-labelledby="ui-id-2" role="tabpanel"
                            class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true"
                            style="display: none;">
                            <a href="https://naturi.su/wp-content/uploads/2019/03/Korvet_00002pl.jpg" data-fancybox=""
                                class="history-house-detail-plaining__img">
                                <figure class="plaining-figure">
                                    <img src="https://naturi.su/wp-content/uploads/2019/03/Korvet_00002pl-324x300.jpg"
                                        class="plaining-figure__img" alt="План 2 этажа">
                                    <figcaption class="plaining-figcaption">
                                        <div class="plaining-figcaption__click">Увеличить изображение</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="history_house_detail_plaining_item hidden">
                    <div class="history-house-detail-plaining__area flex">

                        <div class="area-item">
                            <div class="area-title">Площадь 1 этажа</div>
                            <div class="area-number">138 <span>м<sup>2</sup></span></div>
                        </div>
                        <div class="area-item">
                            <div class="area-title">Площадь 2 этажа</div>
                            <div class="area-number">65 <span>м<sup>2</sup></span></div>
                        </div>
                    </div>
                </div> -->

                <div class="history_house_detail_plaining_item">
                    <h2>
                        <?php the_field('planirovka_zagolovok'); ?>
                    </h2>
                    <div class="history_house_detail_plaining_item_text">
                        <?php the_field('planirovka_opisanie'); ?>
                    </div>

                    <?php if (have_rows('planirovka_harakteristiki')): ?>
                        <div class="history_house_detail_plaining_item_elements">
                            <?php while (have_rows('planirovka_harakteristiki')):
                                the_row(); ?>
                                <div class="history_house_detail_plaining_item_element">
                                    <div class="history_house_detail_plaining_item_element_title">
                                        <?php the_sub_field('planirovka_etazhnost'); ?>
                                    </div>
                                    <div class="history_house_detail_plaining_item_element_number">
                                        <?php the_sub_field('planirovka_ploshhad'); ?> <span>м<sup>2</sup></span>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>

                    <?php else: ?>
                        <?php // No rows found ?>
                    <?php endif; ?>
                </div>

                <?php if (have_rows('planirovka_fotografii')): ?>
                    <?php while (have_rows('planirovka_fotografii')):
                        the_row(); ?>
                        <?php $planirovka_foto = get_sub_field('planirovka_foto'); ?>
                        <a href="<?php echo esc_url($planirovka_foto['url']); ?>" data-fancybox=""
                            class="history_house_detail_plaining_item">
                            <figure class="plaining_figure">
                                <?php if ($planirovka_foto): ?>
                                    <img src="<?php echo esc_url($planirovka_foto['url']); ?>"
                                        alt="<?php echo esc_attr($planirovka_foto['alt']); ?>" class="plaining_figure_img" />
                                <?php endif; ?>
                                <figcaption class="plaining_figcaption">
                                    <div class="plaining_figcaption_name">
                                        <?php the_sub_field('nomer_etazhnosti_v_planirovke_fotografii'); ?>
                                    </div>

                                    <div class="plaining_figcaption_click">

                                        <?php the_sub_field('nadpis_uvelichit_v_planirovke'); ?>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="cost_calculation wow fadeInUp animated">
        <div class="container">
            <div class="cost_calculation_wrap">
                <div class="cost_calculation_wrap_title">
                    <?php $ikonka_plashki_besplatnogo_rascheta_2 = get_field('ikonka_plashki_besplatnogo_rascheta_2'); ?>
                    <?php if ($ikonka_plashki_besplatnogo_rascheta_2): ?>
                        <img src="<?php echo esc_url($ikonka_plashki_besplatnogo_rascheta_2['url']); ?>"
                            alt="<?php echo esc_attr($ikonka_plashki_besplatnogo_rascheta_2['alt']); ?>" />
                    <?php endif; ?>
                    <?php the_field('lozung_na_sekczii_2'); ?>
                </div>
                <a href="<?php the_field('ssylka_na_knopke_s_besplatnym_raschetom_2'); ?>" data-fancybox
                    class="cost_calculation_wrap_btn btn">
                    <?php the_field('nazvanie_knopki_s_besplatnym_raschetom_2'); ?>
                </a>
            </div>
        </div>
    </section>

    <?php if (get_field('nuzhen_li_vtoroj_slajder') == 1): ?>
        <?php // echo 'true'; ?>


        <section class="history_one_home_inner_sliders">
            <div class="history_one_home_inner_sliders_wrapper">
                <div class="history_one_home_inner_slider_text">
                    <?php the_field('letayushhij_tekst_sleva_ot_slajdera_2'); ?>
                </div>
                <div class="swiper history_one_home_inner_slider">

                    <?php if (have_rows('elementy_slajdera_2')): ?>
                        <div class="swiper-wrapper">
                            <?php while (have_rows('elementy_slajdera_2')):
                                the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="history_one_home_inner_slide_block">
                                        <div class="history_one_home_inner_slide_block_img">
                                            <?php $izobrazhenie_slajdera = get_sub_field('izobrazhenie_slajdera_2'); ?>
                                            <?php if ($izobrazhenie_slajdera): ?>
                                                <img src="<?php echo esc_url($izobrazhenie_slajdera['url']); ?>"
                                                    alt="<?php echo esc_attr($izobrazhenie_slajdera['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>

                                        <?php if (have_rows('marker_na_fotografii_2')): ?>
                                            <?php while (have_rows('marker_na_fotografii_2')):
                                                the_row(); ?>
                                                <div class="history_one_home_inner_slide_block_img_point"
                                                    style="top: <?php the_sub_field('otstup_markera_sverhu_2'); ?>%;left: <?php the_sub_field('otstup_markera_snizu_2'); ?>%">
                                                    <div class="history_one_home_inner_slide_block_img_point_text">
                                                        <div class="name">
                                                            <?php the_sub_field('nazvanie_markera_2'); ?>
                                                        </div>
                                                        <div class="country">
                                                            <?php the_sub_field('opisanie_markera_2'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <?php // No rows found ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <?php // No rows found ?>
                    <?php endif; ?>
                </div>

                <div class="container">
                    <div class="history_one_home_inner_slider_navigation">
                        <div class="swiper-button-next history_one_home_inner_slider_navigation_next"></div>
                        <div class="history_one_home_inner_slider_pagination">
                            <div class="swiper-pagination history_one_home_inner_slider_pagination_inner"></div>
                        </div>
                        <div class="swiper-button-prev history_one_home_inner_slider_navigation_prev"></div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <?php // echo 'false'; ?>
    <?php endif; ?>

    <section class="services_inner_detail_text wow fadeInUp animated">
        <div class="container">
            <div class="services_inner_detail_text_title">
                <?php the_field('zagolovok_uslug'); ?>
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
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </section>
</main>


<?php get_footer(); ?>
