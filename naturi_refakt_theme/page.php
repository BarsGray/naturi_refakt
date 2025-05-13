<?php get_header(); ?>

<main class="content_pages">
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
                <h1 class="wow fadeInUp animated">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
