<? get_header(); ?>

<?php global $post; ?>
<?php
$bkg = wp_get_attachment_image_src(get_post_thumbnail_id($post->id), array(5600, 1000), false, '');
?>

<main class="news_inner">
    <section class="breadcrumbs">
        <div class="container">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div class="breadcrumbs_list">', '</div>');
            }
            ?>
        </div>
    </section>
    <section class="news_detail">
        <div class="container">
            <div class="news_detail_header" style="background-image: url(<?php echo $bkg[0]; ?> ) !important;">
                <div class="news_detail_header_info">
                    <h1>
                        <? the_title() ?>
                    </h1>
                    <p>
                        <? echo get_the_date(); ?>
                    </p>
                </div>
            </div>
            <div class="news_detail_content">
                <div class="news_detail_content_social">
                    <p>Поделиться с друзьями:</p>
                    <div class="news_detail_content_social_links">
                        <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= get_permalink(); ?>">
                            <img src="<? echo get_template_directory_uri(); ?>/html/stroi-copy/img/icon-fc.png" alt="">
                        </a>

                        <a href="https://twitter.com/intent/tweet?url=<?= get_permalink(); ?>&amp;text=<?= get_the_title(); ?>"
                            target="_blank">
                            <img src="<? echo get_template_directory_uri(); ?>/html/stroi-copy/img/icon-tw.png" alt="">
                        </a>

                        <a href="http://vk.com/share.php?url=<?= get_permalink(); ?>&amp;text=<?= get_the_title(); ?>"
                            target="_blank">
                            <img src="<? echo get_template_directory_uri(); ?>/html/stroi-copy/img/icon-vk.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="news_detail_content_inner">
                    <? the_content() ?>
                </div>

                <?php if (get_field('vklyuchit_slajder') == 1): ?>
                    <div class="galery_single_sliders">
                        <div class="swiper galery_single_slider">
                            <?php if (have_rows('elementy_slajdera')): ?>
                                <div class="swiper-wrapper">
                                    <?php while (have_rows('elementy_slajdera')):
                                        the_row(); ?>
                                        <div class="swiper-slide">
                                            <?php $izobrazhenie_slajdera = get_sub_field('izobrazhenie_slajdera'); ?>
                                            <?php if ($izobrazhenie_slajdera): ?>
                                                <a href="" data-fancybox="gallery"
                                                    data-src="<?php echo esc_url($izobrazhenie_slajdera['url']); ?>"
                                                    class="galery_single_slide_img">
                                                    <img src="<?php echo esc_url($izobrazhenie_slajdera['url']); ?>"
                                                        alt="<?php echo esc_attr($izobrazhenie_slajdera['alt']); ?>" />
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php else: ?>
                                <?php // No rows found ?>
                            <?php endif; ?>
                        </div>

                        <div class="galery_single_sliders_navigation">
                            <div class="swiper-button-next galery_single_slider_navigation_next"></div>
                            <div class="swiper-button-prev galery_single_slider_navigation_prev"></div>
                        </div>

                        <div class="galery_single_sliders_pagination">
                            <div class="swiper-pagination galery_single_slider_pagination_inner"></div>
                        </div>
                    </div>
                    <?php // echo 'true'; ?>
                <?php else: ?>
                    <?php // echo 'false'; ?>
                <?php endif; ?>
            </div>

            <div class="news_detail_navigation">
                <?php
                $prev_post = get_adjacent_post(false, '', true);
                echo '<div>';
                if (!empty($prev_post)) {
                    // echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . $prev_post->post_title . '</a>';
                    echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '"  class="news_detail_navigation_link_prev">Предыдущая новость</a>';
                }
                echo '</div>';
                $next_post = get_adjacent_post(false, '', false);
                echo '<div>';
                if (!empty($next_post)) {
                    // echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . $next_post->post_title . '</a>';
                    echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '"  class="news_detail_navigation_link_next">Следующая новость</a>';
                }
                echo '</div>';
                ?>
            </div>
        </div>
    </section>

    <section class="news_subscription wow fadeInUp animated">
        <div class="container">
            <div class="news_subscription_inner">
                <h3>
                    Подписаться <br> на новости и акции
                </h3>
                <div class="news_subscription_inner_form">
                    <form action="">
                        <input type="mail" placeholder="Введите ваш E-mail">
                        <button type="submit" class="btn">
                            Отправить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<? get_footer(); ?>