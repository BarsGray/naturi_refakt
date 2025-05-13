<?php
/*
Template Name: История одного дома
*/ ?>

<?php get_header(); ?>
<style>
    .preloader {
        display: none;
        text-align: center;
        margin: 20px 0;
    }
</style>

<main class="history_one_home">
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
            <div class="first_screen_cont">
                <h1>
                    <?php the_field('zagolovok_straniczy'); ?>
                </h1>
                <div class="first_screen_cont_text">
                    <?php the_field('tekst_na_stranicze'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="photo_galery">
        <div class="container">
            <?php if (have_rows('fotogalereya')): ?>
                <ul id="gallery" class="loadmore__container" data-acf_field="fotogalereya" data-count="4"
                    data-page_id="<?php echo get_queried_object_id(); ?>">
                    <?php
                    $count = 0;
                    while (have_rows('fotogalereya')):
                        the_row();
                        if ($count >= 4)
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
                <div class="preloader">Loading...</div>
                <div class="btn loadmore wow fadeInUp animated">Загрузить еще</div>
            <?php else: ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>
    </section>
</main>


<?php get_footer(); ?>
