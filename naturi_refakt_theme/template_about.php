<?php
/*
Template Name: О компании
*/ ?>

<?php get_header(); ?>

<main class="about_page">
    <section class="breadcrumbs">
        <div class="container">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div class="breadcrumbs_list">', '</div>');
            }
            ?>
        </div>
    </section>
    <section class="first_screen" style="background-image: url(<?php the_field('zadnij_fon'); ?>)">
        <div class="container">
            <div class="first_screen_cont">
                <h1 class="wow fadeInUp animated">
                    <?php the_title(); ?>
                </h1>
                <h2 class="wow fadeInUp animated" data-wow-delay="0.2s">
                    <?php the_field('lozung'); ?>
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

    <section class="about_info">
        <div class="container">
            <div class="about_info_text wow fadeInUp animated" data-wow-delay="0.3s">
                <?php the_field('tekstovaya_informacziya'); ?>
            </div>

            <?php if (have_rows('elementy_preimushhestv')): ?>
                <div class="about_advantages_items">
                    <?php while (have_rows('elementy_preimushhestv')):
                        the_row(); ?>
                        <div class="about_advantages_item wow fadeInUp animated">
                            <div class="about_advantages_item_img">
                                <?php $izobrazhenie_preimushhestva = get_sub_field('izobrazhenie_preimushhestva'); ?>
                                <?php if ($izobrazhenie_preimushhestva): ?>
                                    <img src="<?php echo esc_url($izobrazhenie_preimushhestva['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_preimushhestva['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <?php the_sub_field('tekst_preimushhestva'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>

            <div class="about_info_blockquote wow fadeInUp animated">
                <?php the_field('tekst_posle_preimushhestv'); ?>
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


    <section class="about_info about_info_slider_taem">
        <div class="container">
            <div class="about_info_sliders wow fadeInUp animated">
                <div class="swiper about_info_slider">
                    <?php if (have_rows('element_slajdera')): ?>
                        <div class="swiper-wrapper">
                            <?php while (have_rows('element_slajdera')):
                                the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="about_info_slider_img">
                                        <?php if (get_sub_field('izobrazhenie_slajda')): ?>
                                            <img src="<?php the_sub_field('izobrazhenie_slajda'); ?>" />
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <?php // No rows found ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination about_info_slider_pagination"></div>
            </div>
            <div class="about_info_text wow fadeInUp animated">
                <?php the_field('tekst_nad_slajderom'); ?>
            </div>
        </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
