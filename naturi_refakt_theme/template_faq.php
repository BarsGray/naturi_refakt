<?php
/*
Template Name: Faq
*/ ?>

<?php get_header(); ?>

<main class="faq_inner">
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
            </div>
        </div>
    </section>

    <section class="faq wow fadeInUp animated">
        <div class="container">
            <?php if (have_rows('elementy_voprosov')): ?>
                <div class="faq_items">
                    <?php while (have_rows('elementy_voprosov')):
                        the_row(); ?>
                        <div class="faq_item wow fadeInUp animated">
                            <div class="faq_header">
                                <?php the_sub_field('vopros'); ?>
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
                                    <?php the_sub_field('otvet'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // No rows found 
                    ?>
            <?php endif; ?>
            <div class="faq_btns wow fadeInUp animated" data-wow-delay="0.5s">
                <a href="<?php the_field('ssylka_pervoj_knopki_vopros-otveta'); ?>" class="btn">
                    <?php the_field('nazvanie_pervoj_knopki_vopros-otveta'); ?>
                </a>

                <a href="<?php the_field('ssylka_vtoroj_knopki_vopros-otveta'); ?>" class="btn" data-fancybox>
                    <?php the_field('nazvanie_vtoroj_knopki_vopros-otveta'); ?>
                </a>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>
