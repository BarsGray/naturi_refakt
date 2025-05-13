<?php
/*
Template Name: Контакты
*/ ?>

<?php get_header(); ?>

<?php $form = get_field('kod_formy'); ?>

<main class="contact_page">
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

    <section class="map">
        <iframe src="<?php the_field('ssylka_na_kartu'); ?>"></iframe>
    </section>

    <section class="contact_info_items">
        <?php if (have_rows('elementy_kontaktov')): ?>
            <div class="container">
                <?php while (have_rows('elementy_kontaktov')):
                    the_row(); ?>
                    <div class="contact_info_item wow fadeInUp animated">
                        <div class="contact_info_item_adress_box">
                            <div class="contact_info_item_city">
                                <?php the_sub_field('gorod'); ?>
                            </div>
                            <div class="contact_info_item_info">
                                <div class="contact_info_item_info_company">
                                    <?php the_sub_field('nazvanie_kompanii'); ?>
                                </div>

                                <div class="contact_info_item_info_adress">
                                    <?php the_sub_field('adres_kompanii'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="contact_info_item_link_email_box">
                            <a href="mailto:<?php the_sub_field('e-mail_kompanii'); ?>" class="contact_info_item_link_email">
                                <?php the_sub_field('e-mail_kompanii'); ?>
                            </a>
                        </div>
                        <div class="contact_info_item_link_phone_box">
                            <a href="tel: <?php the_sub_field('nomer_kompanii'); ?>" class="contact_info_item_link_phone">
                                <?php the_sub_field('nomer_kompanii'); ?>
                            </a>
                        </div>
                        <!-- <div class="contact_info_item_link">
                        </div> -->
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>

            <div class="contact_form wow fadeInUp animated">
                <h2>
                    <?php the_field('zagolovok_formy'); ?>
                </h2>
                <?php if ($form != '') { ?>
                    <?php echo do_shortcode($form) ?>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>