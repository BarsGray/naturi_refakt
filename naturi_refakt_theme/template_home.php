<?php
/*
Template Name: Главная страница
*/ ?>

<?php get_header(); ?>

<main class="home_page">
    <section class="first_screen">
        <video playsinline autoplay loop muted>
            <source src="https://naturi.su/wp-content/uploads/2024/11/homebg.webm" type="video/webm" />
        </video>
        <div class="shadow"></div>
        <div class="container">
            <div class="first_screen_content sr-animate">
                <h1 class="wow fadeInUp animated"
                    style="-webkit-user-select: none; -moz-user-select: none;-ms-user-select: none; user-select: none;">
                    <?php the_field('zagolovok_straniczy'); ?>
                </h1>
                <h2 class="wow fadeInUp animated" data-wow-delay="0.3s"
                    style="-webkit-user-select: none; -moz-user-select: none;-ms-user-select: none; user-select: none;">
                    <?php the_field('podzagolovok_straniczy'); ?>
                </h2>

                <div class="first_screen_content_order">
                    <a href="<?php the_field('ssylka_knopki_sleva'); ?>" data-fancybox=""
                        class="first_screen_content_order_btn btn wow fadeInUp animated">
                        <?php the_field('nazvanie_knopki_sleva'); ?>
                    </a>
                    <a href="<?php the_field('ssylka_na_yutub-video'); ?>"
                        class="first_screen_content_order_video wow fadeInUp animated" data-wow-delay="0.5s"
                        data-fancybox data-type="iframe">
                        <div class="first_screen_content_video-button">
                            <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="52" height="52" fill="#FF8156" />
                                <path d="M38 26L20 15.6077L20 36.3923L38 26Z" fill="white" />
                            </svg>
                            <p>Видео о технологии</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="advantages">
        <div class="container">
            <?php if (have_rows('preimushhestva')): ?>
                <div class="advantages_items sl-arrow-orange">
                    <?php while (have_rows('preimushhestva')):
                        the_row(); ?>
                        <div class="advantages_item wow fadeInUp animated">
                            <?php $izobrazhenie_preimushhestva = get_sub_field('izobrazhenie_preimushhestva'); ?>
                            <?php if ($izobrazhenie_preimushhestva): ?>
                                <div class="advantages_item_img">
                                    <img src="<?php echo esc_url($izobrazhenie_preimushhestva['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_preimushhestva['alt']); ?>" />
                                </div>
                            <?php endif; ?>
                            <h3>
                                <?php the_sub_field('zagolovok_preimushhestva'); ?>
                            </h3>
                            <?php the_sub_field('opisanie_preimushhestva'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found 
                    ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="technology_differences">
        <div class="container">
            <div class="technology_differences_inner">
                <div class="technology_differences_inner_left wow fadeInUp animated">
                    <?php $otlichitelnyj_priznak_izobrazhenie_sleva = get_field('otlichitelnyj_priznak_izobrazhenie_sleva'); ?>
                    <?php if ($otlichitelnyj_priznak_izobrazhenie_sleva): ?>
                        <img src="<?php echo esc_url($otlichitelnyj_priznak_izobrazhenie_sleva['url']); ?>"
                            alt="<?php echo esc_attr($otlichitelnyj_priznak_izobrazhenie_sleva['alt']); ?>" />
                    <?php endif; ?>
                </div>

                <div class="technology_differences_inner_right">
                    <p class="wow fadeInUp animated" data-wow-delay="0.2s">
                        <?php the_field('otlichitelnyj_priznak_zagolovok'); ?>
                    </p>

                    <?php if (have_rows('otlichitelnyj_priznak_elementy')): ?>
                        <ul class="technology_differences_inner_right_list">
                            <?php while (have_rows('otlichitelnyj_priznak_elementy')):
                                the_row(); ?>
                                <li class="wow fadeInUp animated">
                                    <?php the_sub_field('otlichitelnyj_priznak_tekst'); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <?php // No rows found 
                            ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="services_inner_sliders section_slider_galerei">
        <div class="services_inner_sliders_wrapper">
            <div class="swiper slider_galerei">
                <?php if (have_rows('elementy_slajdera_galerei')): ?>
                    <div class="swiper-wrapper">
                        <?php while (have_rows('elementy_slajdera_galerei')):
                            the_row(); ?>
                            <div class="swiper-slide">
                                <div class="services_inner_slide_block">
                                    <div class="services_inner_slide_block_img">
                                        <?php $izobrazhenie_slajdera_galerei = get_sub_field('izobrazhenie_slajdera_galerei'); ?>
                                        <?php if ($izobrazhenie_slajdera_galerei): ?>
                                            <img src="<?php echo esc_url($izobrazhenie_slajdera_galerei['url']); ?>"
                                                alt="<?php echo esc_attr($izobrazhenie_slajdera_galerei['alt']); ?>" />
                                        <?php endif; ?>
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
            <div class="swiper-button-next slider_galerei_navigation_next"></div>
            <div class="services_inner_slider_pagination">
                <div class="swiper-pagination services_inner_slider_pagination_inner"></div>
            </div>
            <div class="swiper-button-prev slider_galerei_navigation_prev"></div>
        </div>
    </section>

    <section class="home-quiz wow fadeInUp animated">
        <div class="home-acquaintance wow fadeInUp animated"
            style="background-image: url(<?php the_field('izobrazhenie_sekczii_s_kvizom'); ?>)">
            <div class="home-quiz_bottom container">
                <div class="home-quiz__wrapper">
                    <div class="home-quiz__inner">

                        <h2>
                            <?php the_field('zagolovok_kviza'); ?>
                        </h2>
                        <?php echo do_shortcode('[contact-form-7 id="cc43b1f" title="Квиз на главной"]'); ?>
                    </div>
                    <div class="home-quiz__manager-wrapper">
                        <span>
                            <?php the_field('status_menedzhera'); ?>
                        </span>
                        <?php $izobrazhenie_menedzhera = get_field('izobrazhenie_menedzhera'); ?>
                        <?php if ($izobrazhenie_menedzhera): ?>
                            <img src="<?php echo esc_url($izobrazhenie_menedzhera['url']); ?>"
                                alt="<?php echo esc_attr($izobrazhenie_menedzhera['alt']); ?>" />
                        <?php endif; ?>
                        <h4 class="home-quiz__manager-title">
                            <?php the_field('imya_menedzhera'); ?>
                        </h4>
                        <p class="home-quiz__manager-description">
                            <?php the_field('dolzhnost_menedzhera'); ?>
                        </p>
                    </div>
                </div>
            </div>
    </section>

    <section class="popular_projects wow fadeInUp animated" data-wow-delay="0.2s">
        <div class="container">
            <h2>
                <?php the_field('populyarnye_proekty_zagolovok'); ?>
            </h2>
            <div class="catalog_items">
                <?
                $product_ids = get_field('elementy_populyarnyh_proektov');
                $args = array(
                    'post_type' => 'product',
                    'post__in' => $product_ids,
                    'posts_per_page' => -1
                );
                $query = new WP_Query($args);
                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                        wc_get_template_part('content', 'product');
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo 'Популярные товары не выбраны';
                endif;
                ?>
            </div>
            <a href="<?php the_field('ssylka_knopki_vedushhej_na_katalog'); ?>"
                class="house_design btn wow fadeInUp animated">
                <?php the_field('nazvanie_knopki_vedushhej_na_katalog'); ?>
            </a>
        </div>
    </section>

    <section class="reviews wow fadeInUp animated">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_bloka_otzyvy'); ?>
            </h2>
            <?php if (have_rows('elementy_otzyvov')): ?>
                <div class="swiper reviews_slider">
                    <?php while (have_rows('elementy_otzyvov')):
                        the_row(); ?>
                        <?php if (have_rows('element_otzyva')): ?>
                            <div class="swiper-wrapper">
                                <?php while (have_rows('element_otzyva')):
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
                                                <?php the_sub_field('tekst_otzyva'); ?>
                                            </div>

                                            <a href="<?php the_sub_field('ssylka_na_otzyv'); ?>" data-fancybox data-type="iframe">
                                                <?php $izobrazhenie_otzyva = get_sub_field('izobrazhenie_otzyva'); ?>
                                                <?php if ($izobrazhenie_otzyva): ?>
                                                    <img src="<?php echo esc_url($izobrazhenie_otzyva['url']); ?>"
                                                        alt="<?php echo esc_attr($izobrazhenie_otzyva['alt']); ?>" />
                                                <?php endif; ?>
                                                <div class="play_btn">
                                                    <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="52" height="52" fill="#FF8156"></rect>
                                                        <path d="M38 26L20 15.6077L20 36.3923L38 26Z" fill="white"></path>
                                                    </svg>
                                                    <!-- <img src="<?php bloginfo('template_url'); ?>/assets/img/icon-play.png" alt=""> -->
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <?php // No rows found 
                                        ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found 
                    ?>
            <?php endif; ?>
            <!-- <div class="swiper-pagination reviews_slider_pagination"></div> -->
            <div class="swiper-button-next reviews_slider_nagination-next"></div>
            <div class="swiper-button-prev reviews_slider_nagination-prev"></div>
        </div>
    </section>

    <section class="cost_calculation wow fadeInUp animated">
        <div class="container">
            <div class="cost_calculation_wrap">
                <div class="cost_calculation_wrap_title">
                    <?php $izobrazhenie_besplatnogo_rascheta = get_field('izobrazhenie_besplatnogo_rascheta'); ?>
                    <?php if ($izobrazhenie_besplatnogo_rascheta): ?>
                        <img src="<?php echo esc_url($izobrazhenie_besplatnogo_rascheta['url']); ?>"
                            alt="<?php echo esc_attr($izobrazhenie_besplatnogo_rascheta['alt']); ?>" />
                    <?php endif; ?>
                    <p class="zagolovok_besplatnogo_rascheta">
                        <?php the_field('zagolovok_besplatnogo_rascheta'); ?>
                    </p>
                    <p class="podzagolovok_besplatnogo_rascheta">
                        <?php the_field('podzagolovok_besplatnogo_rascheta'); ?>
                    </p>
                </div>
                <a href="<?php the_field('ssylka_knopki_besplatnogo_rascheta'); ?>" data-fancybox=""
                    class="cost_calculation_wrap_btn btn">
                    <?php the_field('nazvanie_knopki_besplatnogo_rascheta'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="сonstruction_technology wow fadeInUp">
        <div class="container">
            <div class="сonstruction_technology_info wow fadeInUp animated">
                <?php if (get_field('zdanij_fon_tehnologii_stroitelstva')): ?>
                    <img src="<?php the_field('zdanij_fon_tehnologii_stroitelstva'); ?>"
                        class="сonstruction_technology_info_img_fly" />
                <?php endif ?>
                <div class="сonstruction_technology_info_img">
                    <?php if (get_field('kartinka_po_seredine_sleva_tehnologii_stroitelstva')): ?>
                        <img src="<?php the_field('kartinka_po_seredine_sleva_tehnologii_stroitelstva'); ?>" />
                    <?php endif ?>
                </div>
                <h2>
                    <?php the_field('zagolovok_tehnologii_stroitelstva'); ?>
                </h2>
                <p>
                    <?php the_field('opisanie_tehnologiya_stroitelstva'); ?>
                </p>
                <a href="https://naturi.su/texnologiya/" class="btn">
                    <span>подробнее</span>
                </a>
            </div>

            <?php if (have_rows('elementy_tehnologii_stroitelstva')): ?>
                <div class="сonstruction_technology_advantages_items wow fadeInUp animated" data-wow-delay="0.2s">
                    <?php while (have_rows('elementy_tehnologii_stroitelstva')):
                        the_row(); ?>
                        <div class="сonstruction_technology_advantages_item">
                            <div class="сonstruction_technology_advantages_item_img">
                                <?php if (get_sub_field('element_tehnologii_stroitelstva_izobrazhenie')): ?>
                                    <img src="<?php the_sub_field('element_tehnologii_stroitelstva_izobrazhenie'); ?>" />
                                <?php endif ?>
                            </div>
                            <h3>
                                <?php the_sub_field('zagolovok_elementa_tehnologii_stroitelstva'); ?>
                            </h3>
                            <p>
                                <?php the_sub_field('tekst_elementa_tehnologii_stroitelstva'); ?>
                            </p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found 
                    ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="acquaintance wow fadeInUp animated"
        style="background-image: url('<?php the_field('zadnij_fon_bloka_s_uslugami'); ?>')">
        <div class="container">

            <div class="services_items wow fadeInUp animated" data-wow-delay="0.2s">
                <?php if (have_rows('elementy_bloka_s_uslugami')): ?>
                    <div class="services_items_inner_title_list">Наши Услуги</div>
                    <div class="services_items_inner">
                        <?php while (have_rows('elementy_bloka_s_uslugami')):
                            the_row(); ?>
                            <?php $ssylka_elementa_bloka_s_uslugami = get_sub_field('ssylka_elementa_bloka_s_uslugami'); ?>
                            <?php if ($ssylka_elementa_bloka_s_uslugami): ?>
                                <?php foreach ($ssylka_elementa_bloka_s_uslugami as $post): ?>
                                    <?php setup_postdata($post); ?>
                                    <a href="<?php the_permalink(); ?>" class="services_item">
                                        <div class="services_item_img">
                                            <?php $izobrazhenie_elementa_bloka_s_uslugami = get_sub_field('izobrazhenie_elementa_bloka_s_uslugami'); ?>
                                            <?php if ($izobrazhenie_elementa_bloka_s_uslugami): ?>
                                                <img src="<?php echo esc_url($izobrazhenie_elementa_bloka_s_uslugami['url']); ?>"
                                                    alt="<?php echo esc_attr($izobrazhenie_elementa_bloka_s_uslugami['alt']); ?>" />
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
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>

            <div class=" acquaintance_info">
                <h2>
                    <?php the_field('zagolovok_bloka_s_uslugami'); ?>
                </h2>
                <?php the_field('opisanie_bloka_s_uslugami'); ?>
                <a href="<?php the_field('ssylka_knopki_bloka_s_uslugami'); ?>" data-fancybox data-type="iframe"
                    class="acquaintance_video">
                    <div class="acquaintance_video_play play_btn">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/Play.svg" alt="">
                    </div>
                    <p>
                        <?php the_field('tekst_knopki_bloka_s_uslugami'); ?>
                    </p>
                </a>
            </div>
        </div>
    </section>

    <?php if (get_field('vklyuchit_li_blok_komanda_v_liczah_na_starinczah', 'option') == 1): ?>
        <section class="the_team_of_employees wow fadeInUp animated">
            <div class="container">
                <h2>
                    <?php the_field('zagolovok_komandy_v_liczah', 'option'); ?>
                </h2>
                <div class="the_team_of_employees_inner tabs">
                    <ul class="tabs_head">
                        <?php if (get_field('vklyuchit_pervuyu_vkladku_v_bloke_komanda', 'option') == 1): ?>
                            <li class="tabs_caption" data-tab='stroi'>
                                <?php the_field('zagolovok_1j_vkladki_v_komande', 'option'); ?>
                            </li>
                            <?php // echo 'true'; ?>
                        <?php else: ?>
                            <?php // echo 'false'; ?>
                        <?php endif; ?>

                        <?php if (get_field('vklyuchit_2yu_vkladku_v_bloke_komanda', 'option') == 1): ?>
                            <li class="tabs_caption" data-tab="management">
                                <?php the_field('zagolovok_2j_vkladki_v_komande', 'option'); ?>
                            </li>
                            <?php // echo 'true'; ?>
                        <?php else: ?>
                            <?php // echo 'false'; ?>
                        <?php endif; ?>

                        <?php if (get_field('vklyuchit_3yu_vkladku_v_bloke_komanda', 'option') == 1): ?>
                            <li class="tabs_caption" data-tab="design_department">
                                <?php the_field('zagolovok_3j_vkladki_v_komande', 'option'); ?>
                            </li>
                            <?php // echo 'true'; ?>
                        <?php else: ?>
                            <?php // echo 'false'; ?>
                        <?php endif; ?>

                        <?php if (get_field('vklyuchit_4yu_vkladku_v_bloke_komanda', 'option') == 1): ?>
                            <li class="tabs_caption" data-tab="sales_department">
                                <?php the_field('zagolovok_4j_vkladki_v_komande', 'option'); ?>
                            </li>
                            <?php // echo 'true'; ?>
                        <?php else: ?>
                            <?php // echo 'false'; ?>
                        <?php endif; ?>

                        <?php if (get_field('vklyuchit_5yu_vkladku_v_bloke_komanda', 'option') == 1): ?>
                            <li class="tabs_caption" data-tab="marketing_and_IT">
                                <?php the_field('zagolovok_5j_vkladki_v_komande', 'option'); ?>
                            </li>
                            <?php // echo 'true'; ?>
                        <?php else: ?>
                            <?php // echo 'false'; ?>
                        <?php endif; ?>
                    </ul>

                    <div class="tabs_body">
                        <?php if (have_rows('elementy_1j_vkladki_v_komande', 'option')): ?>
                            <div class="tabs_content" data-tab='stroi'>
                                <?php while (have_rows('elementy_1j_vkladki_v_komande', 'option')):
                                    the_row(); ?>
                                    <div class="about_command_item">
                                        <div class="about_command_item_img">
                                            <?php $izobrazhenie_sotrudnika_1j_vkladki_v_komande = get_sub_field('izobrazhenie_sotrudnika_1j_vkladki_v_komande'); ?>
                                            <?php if ($izobrazhenie_sotrudnika_1j_vkladki_v_komande): ?>
                                                <img src="<?php echo esc_url($izobrazhenie_sotrudnika_1j_vkladki_v_komande['url']); ?>"
                                                    alt="<?php echo esc_attr($izobrazhenie_sotrudnika_1j_vkladki_v_komande['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="about_command_item_text">
                                            <div class="about_command_item_text_name">
                                                <?php the_sub_field('imya_sotrudnika_1j_vkladki_v_komande'); ?>
                                            </div>
                                            <p>
                                                <?php the_sub_field('dolzhnost_sotrudnika_1j_vkladki_v_komande'); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <?php // No rows found ?>
                        <?php endif; ?>

                        <?php if (have_rows('elementy_2j_vkladki_v_komande', 'option')): ?>
                            <div class="tabs_content" data-tab="management">
                                <?php while (have_rows('elementy_2j_vkladki_v_komande', 'option')):
                                    the_row(); ?>
                                    <div class="about_command_item">
                                        <div class="about_command_item_img">
                                            <?php $izobrazhenie_sotrudnika_2j_vkladki_v_komande = get_sub_field('izobrazhenie_sotrudnika_2j_vkladki_v_komande'); ?>
                                            <?php if ($izobrazhenie_sotrudnika_2j_vkladki_v_komande): ?>
                                                <img src="<?php echo esc_url($izobrazhenie_sotrudnika_2j_vkladki_v_komande['url']); ?>"
                                                    alt="<?php echo esc_attr($izobrazhenie_sotrudnika_2j_vkladki_v_komande['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="about_command_item_text">
                                            <div class="about_command_item_text_name">
                                                <?php the_sub_field('imya_sotrudnika_2j_vkladki_v_komande'); ?>
                                            </div>
                                            <p>
                                                <?php the_sub_field('dolzhnost_sotrudnika_2j_vkladki_v_komande'); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <?php // No rows found ?>
                        <?php endif; ?>

                        <?php if (have_rows('elementy_3j_vkladki_v_komande', 'option')): ?>
                            <div class="tabs_content" data-tab="design_department">
                                <?php while (have_rows('elementy_3j_vkladki_v_komande', 'option')):
                                    the_row(); ?>
                                    <div class="about_command_item">
                                        <div class="about_command_item_img">
                                            <?php $izobrazhenie_sotrudnika_3j_vkladki_v_komande = get_sub_field('izobrazhenie_sotrudnika_3j_vkladki_v_komande'); ?>
                                            <?php if ($izobrazhenie_sotrudnika_3j_vkladki_v_komande): ?>
                                                <img src="<?php echo esc_url($izobrazhenie_sotrudnika_3j_vkladki_v_komande['url']); ?>"
                                                    alt="<?php echo esc_attr($izobrazhenie_sotrudnika_3j_vkladki_v_komande['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="about_command_item_text">
                                            <div class="about_command_item_text_name">
                                                <?php the_sub_field('imya_sotrudnika_3j_vkladki_v_komande'); ?>
                                            </div>
                                            <p>
                                                <?php the_sub_field('dolzhnost_sotrudnika_3j_vkladki_v_komande'); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <?php // No rows found ?>
                        <?php endif; ?>

                        <?php if (have_rows('elementy_4j_vkladki_v_komande', 'option')): ?>
                            <div class="tabs_content" data-tab="sales_department">
                                <?php while (have_rows('elementy_4j_vkladki_v_komande', 'option')):
                                    the_row(); ?>
                                    <div class="about_command_item">
                                        <div class="about_command_item_img">
                                            <?php $izobrazhenie_sotrudnika_4j_vkladki_v_komande = get_sub_field('izobrazhenie_sotrudnika_4j_vkladki_v_komande'); ?>
                                            <?php if ($izobrazhenie_sotrudnika_4j_vkladki_v_komande): ?>
                                                <img src="<?php echo esc_url($izobrazhenie_sotrudnika_4j_vkladki_v_komande['url']); ?>"
                                                    alt="<?php echo esc_attr($izobrazhenie_sotrudnika_4j_vkladki_v_komande['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="about_command_item_text">
                                            <div class="about_command_item_text_name">
                                                <?php the_sub_field('imya_sotrudnika_4j_vkladki_v_komande'); ?>
                                            </div>
                                            <p>
                                                <?php the_sub_field('dolzhnost_sotrudnika_4j_vkladki_v_komande'); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <?php // No rows found ?>
                        <?php endif; ?>

                        <?php if (have_rows('elementy_5j_vkladki_v_komande', 'option')): ?>
                            <div class="tabs_content" data-tab="marketing_and_IT">
                                <?php while (have_rows('elementy_5j_vkladki_v_komande', 'option')):
                                    the_row(); ?>
                                    <div class="about_command_item">
                                        <div class="about_command_item_img">
                                            <?php $izobrazhenie_sotrudnika_5j_vkladki_v_komande = get_sub_field('izobrazhenie_sotrudnika_5j_vkladki_v_komande'); ?>
                                            <?php if ($izobrazhenie_sotrudnika_5j_vkladki_v_komande): ?>
                                                <img src="<?php echo esc_url($izobrazhenie_sotrudnika_5j_vkladki_v_komande['url']); ?>"
                                                    alt="<?php echo esc_attr($izobrazhenie_sotrudnika_5j_vkladki_v_komande['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="about_command_item_text">
                                            <div class="about_command_item_text_name">
                                                <?php the_sub_field('imya_sotrudnika_5j_vkladki_v_komande'); ?>
                                            </div>
                                            <p>
                                                <?php the_sub_field('dolzhnost_sotrudnika_5j_vkladki_v_komande'); ?>
                                            </p>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php // echo 'true'; ?>
    <?php else: ?>
        <?php // echo 'false'; ?>
    <?php endif; ?>

    <section class="faq wow fadeInUp animated">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_vopros-otveta'); ?>
            </h2>
            <?php if (have_rows('elementy_voprosov')): ?>
                <div class="faq_items">
                    <?php while (have_rows('elementy_voprosov')):
                        the_row(); ?>
                        <div class="faq_item wow fadeInUp animated">
                            <div class="faq_header">
                                <?php the_sub_field('vopros'); ?>
                                <div class="faq_header_arrow">
                                    <span class="down">
                                        открыть
                                    </span>
                                    <span class="up">
                                        закрыть
                                    </span>
                                </div>
                            </div>
                            <div class="faq_body">
                                <div class="faq_content">
                                    <?php the_sub_field('otvet'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found 
                    ?>
            <?php endif; ?>
            <div class="faq_btns wow fadeInUp animated" data-wow-delay="0.5s">
                <a href="<?php the_field('ssylka_pervoj_knopki_vopros-otveta'); ?>" class="btn">
                    <?php the_field('nazvanie_pervoj_knopki_vopros-otveta'); ?>
                </a>

                <a href="<?php the_field('ssylka_vtoroj_knopki_vopros-otveta'); ?>" class="btn" data-fancybox="">
                    <?php the_field('nazvanie_vtoroj_knopki_vopros-otveta'); ?>
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>