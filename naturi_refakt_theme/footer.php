<footer class="footer">
    <div class="container">
                <?php if (have_rows('footer', 'option')): ?>
                    <?php while (have_rows('footer', 'option')):
                        the_row(); ?>
                <div class="footer_bottom_items">
                    <div class="footer_bottom_item">
                        <p>
                            <?php the_sub_field('nazvanie_menyu_1'); ?>
                        </p>
                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'footer_menu_in_bottom',
                                'container' => 'ul',
                            )
                        );
                        ?>
                    </div>

                    <div class="footer_bottom_item">
                        <p>
                            <?php the_sub_field('nazvanie_menyu_2'); ?>
                        </p>
                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'footer_menu_in_bottom_2',
                                'container' => 'ul',
                            )
                        );
                        ?>
                    </div>
                </div>



                <?php endwhile; ?>
            <?php endif; ?>
        <div class="footer_top_items">
            <div class="footer_top_item">
                <a href="/" class="footer_logo">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/headerLogo.png" alt="logo">
                </a>
                <?php if (have_rows('footer', 'option')): ?>
                    <?php while (have_rows('footer', 'option')):
                        the_row(); ?>
                        <p>
                            ©2008-
                            <?php echo date("Y"); ?>
                            <?php the_sub_field('kopirajt_futera'); ?>
                        </p>
                        <div class="footer_top_item_social">
                            <?php if (have_rows('soczialnye_seti', 'option')): ?>
                                <?php while (have_rows('soczialnye_seti', 'option')):
                                    the_row(); ?>
                                    <a href="<?php the_sub_field('ssylka_na_soczialnuyu_set'); ?>">
                                        <?php $izobrazhenie_soczialnoj_seti = get_sub_field('izobrazhenie_soczialnoj_seti'); ?>
                                        <?php if ($izobrazhenie_soczialnoj_seti): ?>
                                            <img src="<?php echo esc_url($izobrazhenie_soczialnoj_seti['url']); ?>"
                                                alt="<?php echo esc_attr($izobrazhenie_soczialnoj_seti['alt']); ?>" />
                                        <?php endif; ?>
                                    </a>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <?php // No rows found ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="footer_top_item footer_nav">
                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'footer_1',
                                'container' => 'ul',
                            )
                        );
                        ?>

                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'footer_2',
                                'container' => 'ul',
                            )
                        );
                        ?>

                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'footer_3',
                                'container' => 'ul',
                            )
                        );
                        ?>
                    </div>

                    <div class="footer_top_item_contact">
                        <a href="tel:<?php the_field('nomer_telefona', 'option'); ?>" class="footer_top_item_contact_phone">
                            <?php the_field('nomer_telefona', 'option'); ?>
                        </a>
                        <a href="<?php the_sub_field('ssylka_knopki_obratnogo_zvonka_v_futere'); ?>" data-fancybox=""
                            class="footer_top_item_contact_callback">
                            <?php the_sub_field('nazvanie_knopki_obratnogo_zvonka_v_futere'); ?>
                        </a>
                        <a href="naturi_tehnol_booklet.pdf" target="_blank"
                            class="footer_top_item_contact_file">
                            <div class="footer_top_item_contact_file_img">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/file-text-footer-icon.svg" alt="">
                            </div>
                            <div class="footer_top_item_contact_file_info">
                                <div>
                                    <?php the_sub_field('skachajte_buklet_tekst_sverhu'); ?>
                                </div>
                                <div>
                                    <?php the_sub_field('skachajte_buklet_tekst_snizu'); ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="footer_copyright">
                    <div class="footer_copyright_item">
                        <?php if (get_sub_field('dokument_1')): ?>
                            <a href="<?php the_sub_field('dokument_1'); ?>">
                                <?php the_sub_field('nazvanie_dokumenta_1'); ?>
                            </a>
                        <?php endif; ?>

                        <?php if (get_sub_field('dokument_2')): ?>
                            <a href="<?php the_sub_field('dokument_2'); ?>">
                                <?php the_sub_field('nazvanie_dokumenta_2'); ?>
                            </a>
                        <?php endif; ?>

                        <?php if (get_sub_field('dokument_3')): ?>
                            <a href="<?php the_sub_field('dokument_3'); ?>">
                                <?php the_sub_field('nazvanie_dokumenta_3'); ?>
                            </a>
                        <?php endif; ?>
                    </div>



                <?php endwhile; ?>
            <?php endif; ?>

            <div class="footer_copyright_item">
            </div>
        </div>
    </div>
</footer>


<div id="product_order" style="display:none;max-width:500px;">
    <div class="contact_form">
        <h2>Оставить заявку</h2>
        <? echo do_shortcode('[contact-form-7 id="566bc22" title="Заказ товара"]') ?>
    </div>
</div>

<div id="modal_consultation" style="display:none;max-width:500px;">
    <div class="contact_form">
        <h2>Оставить заявку</h2>
        <p>Оставьте заявку и мы перезвоним Вам через 5 минут!</p>
        <?php echo do_shortcode('[contact-form-7 id="af8c640" title="Заказать бесплатный расчет/консультацию"]') ?>
    </div>
</div>

<div class="upbtn" style="right: -220px; bottom: -220px;"></div>

<?php wp_footer(); ?>

</body>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(34848260, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/34848260" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</html>