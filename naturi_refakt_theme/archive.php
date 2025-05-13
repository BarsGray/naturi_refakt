<? get_header(); ?>

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
                    <?php the_archive_title() ?>
                </h1>
                <? the_archive_description('<div class="archive-description">', '</div>'); ?>
            </div>
        </div>
    </section>

    <section class="news bg_light_grey">
        <div class="container">
            <div class="news_items">
                <?php
                if (have_posts()): ?>
                    <?php
                    /* Start the Loop */
                    while (have_posts()):
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_type());

                    endwhile;
                    the_posts_navigation();
                else:

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>
            </div>
            <!-- <div class="news_btn">
                <button class="btn">
                    Больше новостей
                </button>
            </div> -->
        </div>
    </section>
</main>
<? get_footer(); ?>