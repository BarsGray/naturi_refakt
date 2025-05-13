<?php
/*
Template Name: Галерея
*/ ?>

<?php get_header(); ?>

<main>
    <section class="breadcrumbs">
        <div class="container">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div class="breadcrumbs_list">', '</div>');
            }
            ?>
        </div>
    </section>

    <section class="photo_galery">
        <div class="container">
            <div class="galery_title wow fadeInUp animated">
                <h1>
                    <?php the_field('galereya_zagolovok'); ?>
                </h1>
                <a href="<?php the_field('ssylka_na_soczset_galerei'); ?>" target="_blank">
                    <?php if (get_field('ikonka_soczseti_galerei')): ?>
                        <img src="<?php the_field('ikonka_soczseti_galerei'); ?>" />
                    <?php endif ?>
                    <p>
                        <?php the_field('nazvanie_soczseti_galerei'); ?>
                    </p>
                </a>
            </div>
            <?php if (have_rows('fotogalereya')): ?>
                <ul id="gallery" class="loadmore__container" data-acf_field="fotogalereya" data-count="4"
                    data-page_id="<?php echo get_queried_object_id(); ?>">
                    <?php
                    $count = 0;
                    while (have_rows('fotogalereya')):
                        the_row();
                        if ($count >= 6)
                            break;
                        $count++;
                        ?>
                        <li class="wow fadeInUp animated">
                            <?php $ssylka_na_element_galerei = get_sub_field('ssylka_na_element_galerei'); ?>
                            <?php if ($ssylka_na_element_galerei): ?>
                                <?php foreach ($ssylka_na_element_galerei as $post): ?>
                                    <?php setup_postdata($post); ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <figure>
                                            <?php $zadnij_fona_elementa_fotogalerei = get_sub_field('zadnij_fona_elementa_fotogalerei');
                                            ?>
                                            <?php if ($zadnij_fona_elementa_fotogalerei): ?>
                                                <img src="<?php echo esc_url($zadnij_fona_elementa_fotogalerei['url']); ?>"
                                                    alt="<?php echo esc_attr($zadnij_fona_elementa_fotogalerei['alt']); ?>" />
                                            <?php endif; ?>
                                            <figcaption>
                                                <h2>
                                                    <?php the_title(); ?>
                                                </h2>

                                                <?php if (get_sub_field("opisanie_elementa_fotogalerei")): ?>
                                                    <h3>
                                                        <?php echo get_sub_field("opisanie_elementa_fotogalerei"); ?>
                                                    </h3>
                                                <?php else: ?>
                                                <?php endif; ?>
                                            </figcaption>
                                        </figure>
                                    </a>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <div class="preloader">Загружаю...</div>
                <div class="btn loadmore wow fadeInUp animated">Загрузить еще</div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="video_galery">
        <div class="container">
            <div class="galery_title wow fadeInUp animated">
                <h2>
                    <?php the_field('zagolovok_video_galereya'); ?>
                </h2>
                <a href="<?php the_field('ssylka_na_soczset_video_galerei'); ?>" target="_blank">
                    <?php if (get_field('ikonka_soczseti_video_galerei')): ?>
                        <img src="<?php the_field('ikonka_soczseti_video_galerei'); ?>" />
                    <?php endif ?>
                    <p>
                        <?php the_field('nazvanie_soczseti_video_galerei'); ?>
                    </p>
                </a>
            </div>

            <?php if (have_rows('video_galereya')): ?>
                <ul class="video_galery_items loadmore__container" data-acf_field="video_galereya" data-count="4"
                    data-page_id="<?php echo get_queried_object_id(); ?>">
                    <?php
                    $count = 0;
                    while (have_rows('video_galereya')):
                        the_row();
                        if ($count >= 6)
                            break;
                        $count++; ?>
                        <li class="wow fadeInUp animated">
                            <a href="<?php the_sub_field('ssylka_na_yutub_video_galerei'); ?>" data-fancybox data-type="iframe">
                                <div class="video_galery_item_info_others video_galery_item_info_others_icon_play">
                                    <div class="video_galery_item_info_others_icon"></div>
                                </div>
                                <figure>
                                    <?php $zadnij_fon_elementa_video_galerei = get_sub_field('zadnij_fon_elementa_video_galerei'); ?>
                                    <?php if ($zadnij_fon_elementa_video_galerei): ?>
                                        <img src="<?php echo esc_url($zadnij_fon_elementa_video_galerei['url']); ?>"
                                            alt="<?php echo esc_attr($zadnij_fon_elementa_video_galerei['alt']); ?>" />
                                    <?php endif; ?>
                                    <figcaption>
                                        <div class="video_galery_item_info">
                                            <h2>
                                                <?php the_sub_field('nazvanie_elementa_video_galerei'); ?>
                                            </h2>
                                            <div class="video_galery_item_info_others">
                                                <div class="video_galery_item_info_others_icon"></div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <div class="preloader">Загружаю...</div>
                <div class="btn loadmore wow fadeInUp animated">Загрузить еще</div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>