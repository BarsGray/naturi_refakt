<?php
/*
Template Name: Технологии
*/ ?>

<?php get_header(); ?>

<main class="technology">
    <section class="breadcrumbs">
        <div class="container">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div class="breadcrumbs_list">', '</div>');
            }
            ?>
        </div>
    </section>
    <section class="first_screen" style="background: url('<?php the_field('zadnij_fon_pervogo_bloka'); ?>')">
        <div class="shadow"></div>
        <div class="container">
            <div class="first_screen_cont">
                <h1 class="wow fadeInUp animated">
                    <?php the_field('zagolovok_straniczy'); ?>
                </h1>
                <h2 class="wow fadeInUp animated" data-wow-delay="0.3s">
                    <?php the_field('podzagolovok_straniczy'); ?>
                </h2>
                <a href="<?php the_field('ssylka_knopki_v_pervom_bloke'); ?>" data-fancybox=""
                    class="acquaintance_video wow fadeInUp animated" data-wow-delay="0.5s" data-type="iframe">
                    <div class="acquaintance_video_play play_btn">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/icon-play.png" alt="">
                    </div>
                    <p>
                        <?php the_field('tekst_knopki_v_pervom_bloke'); ?>
                    </p>
                </a>
            </div>
        </div>
    </section>

    <section class="technology_philosophy">
        <div class="container">
            <div class="technology_philosophy_inner wow fadeInUp animated">
                <h2>
                    <?php the_field('zagolovok_vtorogo_bloka'); ?>
                </h2>
                <div class="technology_philosophy_inner_inner">
                    <?php the_field('opisanie_vtorogo_bloka'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="cost_calculation wow fadeInUp animated">
        <div class="container">
            <div class="cost_calculation_wrap">
                <div class="cost_calculation_wrap_title">
                    <?php $izobrazhenie_tretego_bloka = get_field('izobrazhenie_tretego_bloka'); ?>
                    <?php if ($izobrazhenie_tretego_bloka): ?>
                        <img src="<?php echo esc_url($izobrazhenie_tretego_bloka['url']); ?>"
                            alt="<?php echo esc_attr($izobrazhenie_tretego_bloka['alt']); ?>" />
                    <?php endif; ?>
                    <p>
                        <?php the_field('tekst_tretego_bloka'); ?>
                    </p>
                </div>
                <a href="<?php the_field('ssylka_knopki_tretego_bloka'); ?>" data-fancybox
                    class="cost_calculation_wrap_btn btn">
                    <?php the_field('tekst_knopki_tretego_bloka'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="advantages">
        <div class="container">
            <?php if (have_rows('preimushhestva_v_4m_bloke')): ?>
                <div class="advantages_items">
                    <?php while (have_rows('preimushhestva_v_4m_bloke')):
                        the_row(); ?>
                        <div class="advantages_item wow fadeInUp animated">
                            <div class="advantages_item_img">
                                <?php $izobrazhenie_preimushhestva_v_4m_bloke = get_sub_field('izobrazhenie_preimushhestva_v_4m_bloke'); ?>
                                <?php if ($izobrazhenie_preimushhestva_v_4m_bloke): ?>
                                    <img src="<?php echo esc_url($izobrazhenie_preimushhestva_v_4m_bloke['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_preimushhestva_v_4m_bloke['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <h3>
                                <?php the_sub_field('zagolovok_preimushhestva_v_4m_bloke'); ?>
                            </h3>
                            <div class="advantages_item_text">
                                <?php the_sub_field('opisanie_preimushhestva_v_4m_bloke'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="technology_differences">
        <div class="container">
            <div class="technology_differences_inner">
                <div class="technology_differences_inner_left wow fadeInUp animated">
                    <?php $izobrazhenie_sleva_v_5m_bloke = get_field('izobrazhenie_sleva_v_5m_bloke'); ?>
                    <?php if ($izobrazhenie_sleva_v_5m_bloke): ?>
                        <img src="<?php echo esc_url($izobrazhenie_sleva_v_5m_bloke['url']); ?>"
                            alt="<?php echo esc_attr($izobrazhenie_sleva_v_5m_bloke['alt']); ?>" />
                    <?php endif; ?>
                </div>

                <div class="technology_differences_inner_right">
                    <p class="wow fadeInUp animated" data-wow-delay="0.2s">
                        <?php the_field('zagolovok_v_5m_bloke'); ?>
                    </p>
                    <?php if (have_rows('preimushhestva_v_5m_bloke')): ?>
                        <ul class="technology_differences_inner_right_list">
                            <?php while (have_rows('preimushhestva_v_5m_bloke')):
                                the_row(); ?>
                                <li class="wow fadeInUp animated">
                                    <?php the_sub_field('preimushhestvo_v_5m_bloke'); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <?php // No rows found ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="thickness wow fadeInUp animated hidden_h2_for_pc"
        style="background: url('<?php the_field('zadnij_fon_6go_bloka'); ?>');">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_vosmogo_bloka'); ?>
            </h2>
            <div class="thickness_top">
                <?php if (have_rows('verhnie_elementy_6go_bloka')): ?>
                    <div class="swiper-wrapper">
                        <?php while (have_rows('verhnie_elementy_6go_bloka')):
                            the_row(); ?>
                            <div class="swiper-slide">
                                <div class="thickness_top_inner">
                                    <div class="thickness_top_img">
                                        <?php $izobrazhenie_verhnego_elementa_6go_bloka = get_sub_field('izobrazhenie_verhnego_elementa_6go_bloka'); ?>
                                        <?php if ($izobrazhenie_verhnego_elementa_6go_bloka): ?>
                                            <img src="<?php echo esc_url($izobrazhenie_verhnego_elementa_6go_bloka['url']); ?>"
                                                alt="<?php echo esc_attr($izobrazhenie_verhnego_elementa_6go_bloka['alt']); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <h3>
                                        <?php the_sub_field('nazvanie_modeli_verhnego_elementa_6go_bloka'); ?>
                                    </h3>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>

            <div class="thickness_bottom">
                <?php if (have_rows('nizhnie_elementy_6go_bloka')): ?>
                    <div class="swiper-wrapper">
                        <?php while (have_rows('nizhnie_elementy_6go_bloka')):
                            the_row(); ?>
                            <div class="swiper-slide">
                                <div class="thickness_bottom_info">
                                    <h3>
                                        <?php the_sub_field('zagolovok_nizhnego_elementa_6go_bloka'); ?>
                                    </h3>
                                    <div class="thickness_bottom_info_inner">
                                        <div class="thickness_bottom_info_inner_item">
                                            <div class="thickness_bottom_info_inner_payment">
                                                <div class="thickness_bottom_info_text">
                                                    <?php the_sub_field('nazvanie_soprotivleniya_nizhnego_elementa_6go_bloka'); ?>
                                                </div>
                                                <div class="thickness_bottom_info_text_desc">
                                                    <?php the_sub_field('soprotivlenie_nizhnego_elementa_6go_bloka'); ?>
                                                </div>
                                                <p>
                                                    <?php the_sub_field('chej_analog_nizhnego_elementa_6go_bloka'); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="thickness_bottom_info_inner_item">
                                            <?php the_sub_field('tekst_sleva_nizhnego_elementa_6go_bloka'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="technology_privilege wow fadeInUp animated">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_sedmogo_bloka'); ?>
            </h2>
            <?php if (have_rows('elementy_sedmogo_bloka')): ?>
                <div class="technology_privilege_items">
                    <?php while (have_rows('elementy_sedmogo_bloka')):
                        the_row(); ?>
                        <div class="technology_privilege_item wow fadeInUp animated">
                            <div class="technology_privilege_item_img">
                                <?php $izobrazhenie_elementa_sedmogo_bloka = get_sub_field('izobrazhenie_elementa_sedmogo_bloka'); ?>
                                <?php if ($izobrazhenie_elementa_sedmogo_bloka): ?>
                                    <img src="<?php echo esc_url($izobrazhenie_elementa_sedmogo_bloka['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_elementa_sedmogo_bloka['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <h3>
                                <?php the_sub_field('zagolovok_elementa_sedmogo_bloka'); ?>
                            </h3>
                            <div class="technology_privilege_item_text">
                                <?php the_sub_field('opisanie_elementa_sedmogo_bloka'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>
            <div class="technology_privilege_bottom wow fadeInUp animated">
                <div class="technology_privilege_bottom_subtitle">
                    <?php the_field('tekst_posle_elementov_sedmogo_bloka'); ?>
                </div>

                <?php if (get_field('fajl_prikreplennyj_k_knopke')): ?>
                    <a href="<?php the_field('fajl_prikreplennyj_k_knopke'); ?>" class="btn wow fadeInUp animated">
                        <?php the_field('tekst_knopki_posle_elementov_sedmogo_bloka'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="technology_cut wow fadeInUp animated">
        <div class="container">
            <div class="technology_cut_item">
                <h2>
                    <?php the_field('zagolovok_vosmogo_bloka'); ?>
                </h2>
                <div class="technology_cut__foto" style="position:relative;">
                    <?php $izobrazhenie_doma = get_field('izobrazhenie_doma'); ?>
                    <?php if ($izobrazhenie_doma): ?>
                        <img src="<?php echo esc_url($izobrazhenie_doma['url']); ?>"
                            alt="<?php echo esc_attr($izobrazhenie_doma['alt']); ?>" />
                    <?php endif; ?>
                    <?php if (have_rows('elementy_na_izobrazhenii_doma')): ?>
                        <div class="mapHouse">
                            <?php while (have_rows('elementy_na_izobrazhenii_doma')):
                                the_row(); ?>
                                <label
                                    style="top:<?php the_sub_field('pozicziya_sverhu_elementa_na_izobrazhenii_doma'); ?>%;left:<?php the_sub_field('pozicziya_sleva_elementa_na_izobrazhenii_doma'); ?>%;">
                                    <div class="labelIn">
                                        <div class="hvost"></div>
                                        <?php the_sub_field('zagolovok_elementa_na_izobrazhenii_doma'); ?>
                                    </div>
                                </label>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <?php // No rows found ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="technology_cut_slider">
                <?php if (have_rows('elementy_na_izobrazhenii_doma')): ?>
                    <ul>
                        <?php while (have_rows('elementy_na_izobrazhenii_doma')):
                            the_row(); ?>
                            <li>
                                <?php the_sub_field('zagolovok_elementa_na_izobrazhenii_doma'); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="technology_history wow fadeInUp animated">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_devyatogo_bloka'); ?>
            </h2>
            <div class="technology_history_top">
                <?php if (have_rows('elementy_verhnego_slajdera_9go_bloka')): ?>

                    <?php
                    $history_count = 0;
                    $year_list_history = [];
                    if (have_rows('elementy_nizhnego_slajdera_9go_bloka')) {
                        while (have_rows('elementy_nizhnego_slajdera_9go_bloka')) {
                            the_row();
                            $year_list_history[] = get_sub_field('god_v_czifrah_v_elemente_nizhnego_slajdera_9go_bloka');
                        }
                    }
                    ?>

                    <!-- <div class="swiper-wrapper"> -->
                    <div class="technology_history-wrapper">
                        <?php while (have_rows('elementy_verhnego_slajdera_9go_bloka')):
                            the_row(); ?>
                            <!-- <div class="swiper-slide"> -->
                            <div class="technology_history-item">
                                <div class="technology_history_top_inner">
                                    <div class="technology_history_top_inner_img">
                                        <?php $izobrazhenie_sleva_v_verhnem_slajdere_9go_bloka = get_sub_field('izobrazhenie_sleva_v_verhnem_slajdere_9go_bloka'); ?>
                                        <?php if ($izobrazhenie_sleva_v_verhnem_slajdere_9go_bloka): ?>
                                            <img src="<?php echo esc_url($izobrazhenie_sleva_v_verhnem_slajdere_9go_bloka['url']); ?>"
                                                alt="<?php echo esc_attr($izobrazhenie_sleva_v_verhnem_slajdere_9go_bloka['alt']); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="technology_history_top_inner_info">
                                        <div class="technology_history_top_inner_info_number">
                                            <?php $izobrazhenie_sprava_v_verhnem_slajdere_9go_bloka = get_sub_field('izobrazhenie_sprava_v_verhnem_slajdere_9go_bloka'); ?>
                                            <?php if ($izobrazhenie_sprava_v_verhnem_slajdere_9go_bloka): ?>
                                                <img src="<?php echo esc_url($izobrazhenie_sprava_v_verhnem_slajdere_9go_bloka['url']); ?>"
                                                    alt="<?php echo esc_attr($izobrazhenie_sprava_v_verhnem_slajdere_9go_bloka['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <p>
                                            <?php the_sub_field('tekst_v_verhnem_slajdere_9go_bloka'); ?>
                                        </p>
                                        <span class="redis_year_history">
                                        <?php echo ($year_list_history[$history_count]) ? $year_list_history[$history_count] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php $history_count++; ?>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>
        </div>


        <!-- <div class="technology_history_bottom">
            <?php //if (have_rows('elementy_nizhnego_slajdera_9go_bloka')): ?>
                <div class="swiper-wrapper">
                    <?php // while (have_rows('elementy_nizhnego_slajdera_9go_bloka')):
                        //the_row(); ?>
                        <div class="swiper-slide">
                            <div class="technology_history_bottom_number">
                                <?php //the_sub_field('god_v_czifrah_v_elemente_nizhnego_slajdera_9go_bloka'); ?>
                            </div>
                        </div>
                    <?php //endwhile; ?>
                </div>
            <?php //else: ?>
                <?php // No rows found ?>
            <?php //endif; ?>
            <div class="swiper-pagination technology_history_bottom_pagination"></div>
            <div class="swiper-button-next technology_history_bottom_next"></div>
            <div class="swiper-button-prev technology_history_bottom_prev"></div>
        </div> -->
    </section>

    <section class="faq">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_10go_bloka'); ?>
            </h2>
            <?php if (have_rows('elementy_desyatogo_bloka')): ?>
                <div class="faq_items">
                    <?php while (have_rows('elementy_desyatogo_bloka')):
                        the_row(); ?>
                        <div class="faq_item wow fadeInUp animated">
                            <div class="faq_header">
                                <?php the_sub_field('vopros_v_10m_bloke'); ?>
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
                                    <?php the_sub_field('otvet_v_10m_bloke'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
        <div class="faq_btns wow fadeInUp animated" data-wow-delay="0.5s">
            <a href="<?php the_field('ssylka_pervoj_knopki_v_10m_bloke'); ?>" class="btn">
                <?php the_field('nazvanie_pervoj_knopki_v_10m_bloke'); ?>
            </a>
            <a href="<?php the_field('ssylka_vtoroj_knopki_v_10m_bloke'); ?>" class="btn" data-fancybox>
                <?php the_field('nazvanie_vtoroj_knopki_v_10m_bloke'); ?>
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>