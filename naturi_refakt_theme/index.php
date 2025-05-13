<?php get_header(); ?>



<?php

if (have_posts()) :

    if (is_home() && !is_front_page()) :
?>
        <!-- <header>
            <h1 class="page-title screen-reader-text">
                <?php single_post_title(); ?>
            </h1>
        </header> -->
    <?php
    endif; ?>
    <main class="news_page">
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
                        <?php
                        $page_for_posts_id = get_option('page_for_posts');
                        if ($page_for_posts_id == 29) {
                            the_field('zagolovok_bloga', $page_for_posts_id);
                        } else {
                            the_field('zagolovok_bloga');
                        }
                        ?>
                    </h1>
                </div>
            </div>
        </section>
        <section class="news bg_light_grey">
            <div class="container">
                <div class="news_items" id="post-container">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            get_template_part('template-parts/content', get_post_type());
                        endwhile;
                    endif;
                    ?>
                </div>

                <div class="news_btn">
                    <button id="load_news" class="btn" data-page="1">Больше новостей</button>
                </div>
            </div>
        </section>
        <section class="news_subscription">
            <div class="container">
                <div class="news_subscription_inner">
                    <h3>
                        <?php
                        if ($page_for_posts_id == 29) {
                            the_field('tekst_v_podpiske', $page_for_posts_id);
                        } else {
                            the_field('tekst_v_podpiske');
                        }
                        ?>
                    </h3>
                    <div class="news_subscription_inner_form">
                        <?php
                        if ($page_for_posts_id == 29) {
                            $ssylka_na_formu = get_field("shortkod_formy_podpiski", $page_for_posts_id);
                        } else {
                            $ssylka_na_formu = get_field("shortkod_formy_podpiski");
                        }
                        echo do_shortcode("$ssylka_na_formu"); ?>
                    </div>
                </div>
            </div>
        </section>
        <? the_posts_navigation(); ?>
    </main>



<?php
else :
    get_template_part('template-parts/content', 'none');
endif;
?>




<?php get_footer(); ?>