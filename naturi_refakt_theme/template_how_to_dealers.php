<?php
/*
Template Name: Как стать диллером
*/ ?>

<?php get_header(); ?>

<main class="how_do_i_become_a_dealer">

    <section class="first_screen">
        <div class="container">
            <div class="first_screen_cont">
                <h1>
                    <?php the_title(); ?>
                </h1>
                <div class="how_do_i_become_a_dealer_text">
                    <?php the_field('opisanie_pervoj_sekczii'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="how_do_i_become_a_dealer_our_offer wow fadeInUp animated" data-wow-delay="0.3s">
        <div class="container">
            <div class="how_do_i_become_a_dealer_our_offer_items"
                style="background-image:url('<?php the_field('zadnij_fon_vtorogo_bloka'); ?>');">
                <div class="how_do_i_become_a_dealer_our_offer_item how_do_i_become_a_dealer_our_offer_title">
                    <?php the_field('tekst_sleva_vo_vtorom_bloke'); ?>
                </div>
                <div class="how_do_i_become_a_dealer_our_offer_item how_do_i_become_a_dealer_our_offer_desc">
                    <?php the_field('tekst_sprava_vo_vtorom_bloke'); ?>
                </div>
                <div class="how_do_i_become_a_dealer_our_offer_items_btn">
                    <a href="<?php the_field('ssylka_knopki_vo_vtorom_bloke'); ?>" data-fancybox class="btn">
                        <?php the_field('nazvanie_knopki_vo_vtorom_bloke'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="partner_standard wow fadeInUp animated">
        <div class="container">
            <h2>
                <?php the_field('zagolovok_standartov'); ?>
            </h2>
            <div class="partner_standard_items">
                <?php if (have_rows('standarty')): ?>
                    <?php while (have_rows('standarty')):
                        the_row(); ?>
                        <div class="partner_standard_item" data-wow-delay="0.2s">
                            <div class="partner_standard_item_img">
                                <?php $izobrazhenie_standarta = get_sub_field('izobrazhenie_standarta'); ?>
                                <?php if ($izobrazhenie_standarta): ?>
                                    <img src="<?php echo esc_url($izobrazhenie_standarta['url']); ?>"
                                        alt="<?php echo esc_attr($izobrazhenie_standarta['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="partner_standard_item_title">
                                <?php the_sub_field('zagolovok_standarta'); ?>
                            </div>
                            <div class="partner_standard_item_desc">
                                <?php the_sub_field('opisanie_standarta'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <section class="services_inner_detail_stages">
        <div class="container">
            <div class="services_inner_detail_stages_items">
                <?php if (have_rows('etap_rabot')): ?>
                    <?php while (have_rows('etap_rabot')):
                        the_row(); ?>
                        <div class="services_inner_detail_stages_item" data-wow-delay="0.15s">
                            <div class="services_inner_detail_stages_item_number">
                                <?php the_sub_field('nomer_etapa_rabot'); ?>
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
                <?php else: ?>
                    <?php // No rows found ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="how_do_i_become_a_dealer_info wow fadeInUp animated"
        style="background-image: url('<?php the_field('fon_lozunga'); ?>');">
        <div class="container">
            <?php the_field('tekst_lozunga_snizu'); ?>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="contact_form wow fadeInUp animated">
                <h2>
                    <?php the_field('zagolovok_formy'); ?>
                </h2>
                <?php
                $form = get_field('shortkod_formy');
                echo do_shortcode($form); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
