<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .add_to_wishlist {
            color: #000;
        }
    </style>
    <?php wp_head(); ?>
    <!-- calltouch --> 
<script> 
(function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},m=typeof Array.prototype.find === 'function',n=m?"init-min.js":"init.js";s.async=true;s.src="https://mod.calltouch.ru/"+n+"?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","2le3jabv"); 
</script> 
<!-- calltouch -->
</head>

<body <?php body_class(); ?>>
    <!-- Roistat Counter Start -->
<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
    var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', 'f7e2a0279db4b7b984eb77415deea666');
</script>
<!-- Roistat Counter End -->
    <header class="header" id="header">
        <div class="overlay"></div>
        <div class="container">
            <div class="header_inner">
                <div class="header_inner_top">
                    <a href="/" class="header_logo">
                        <?php $logotip = get_field('logotip', 'option'); ?>
                        <?php if ($logotip): ?>
                            <img src="<?php echo esc_url($logotip['url']); ?>"
                                alt="<?php echo esc_attr($logotip['alt']); ?>" />
                        <?php endif; ?>
                    </a>
                    <div class="header_inner_right">
                        <div class="header_inner_bottom">
                            <?php
                            wp_nav_menu(
                                array(
                                    'menu' => 'header_menu',
                                    'container' => 'nav',
                                    'menu_class' => 'topmenu',
                                    'depth' => 2
                                )
                            );
                            ?>
                        </div>
                        <div class="header_inner_right_items">

                            <a href="tel:<?php the_field('nomer_telefona', 'option'); ?>" class="header__phone">
                                <?php the_field('nomer_telefona', 'option'); ?>
                            </a>

                                    
                            <?php if (have_rows('ikonki_socz_setej_v_hedere', 'option')): ?>
                            <div class="header__inner_social">
                                <?php while (have_rows('ikonki_socz_setej_v_hedere', 'option')):
                                    the_row(); ?>
                                    <a href="<?php the_sub_field('ssylka_na_socz_set_v_hedere'); ?>" target="_blank"
                                        class="header_inner_right_icon">
                                        <?php $ikonka_socz_seti_v_hedere = get_sub_field('ikonka_socz_seti_v_hedere'); ?>
                                        <?php if ($ikonka_socz_seti_v_hedere): ?>
                                            <img src="<?php echo esc_url($ikonka_socz_seti_v_hedere['url']); ?>"
                                                alt="<?php echo esc_attr($ikonka_socz_seti_v_hedere['alt']); ?>" />
                                        <?php endif; ?>
                                    </a>
                                <?php endwhile; ?>
                                
                                    </div>
                            <?php else: ?>
                                <?php // No rows found 
                                    ?>
                            <?php endif; ?>

                           <!--  <a href="<?php the_field('ssylka_na_sravnit', 'option'); ?>"
                                class="header_inner_right_icon">
                                <?php $ikonka_sravnit = get_field('ikonka_sravnit', 'option'); ?>
                                <?php if ($ikonka_sravnit): ?>
                                    <img src="<?php echo esc_url($ikonka_sravnit['url']); ?>"
                                        alt="<?php echo esc_attr($ikonka_sravnit['alt']); ?>" />
                                <?php endif; ?>
                                <div class="header_inner_right_icon_amount compare_counter">
                                    <?php
                                    // шорт код вывода количества товаров для сравнения
                                    echo do_shortcode('[yith_compare_count]'); ?>
                                </div>
                            </a> -->
                            <div class="header_inner_right_whitchlist">
                                <?php echo do_shortcode('[fibosearch]'); ?>
                            </div>
                            
                            
                            <a href="<?php the_field('ssylka_na_izbrannoe', 'option'); ?>"
                                class="header_inner_right_icon">
                                <?php $ikonka_izbrannoe = get_field('ikonka_izbrannoe', 'option'); ?>
                                <?php if ($ikonka_izbrannoe): ?>
                                    <img src="<?php echo esc_url($ikonka_izbrannoe['url']); ?>"
                                        alt="<?php echo esc_attr($ikonka_izbrannoe['alt']); ?>" />
                                <?php endif; ?>
                                <div class="header_inner_right_icon_amount wishlist_counter">
                                    <?php $wishlist_count = YITH_WCWL()->count_products();
                                    echo $wishlist_count; ?>
                                </div>
                            </a>
                        </div>
                        <a href="" class="hamburger_menu">
                            <span></span>
                        </a>

                    </div>


                </div>

            </div>
        </div>

        <div class="header_menu_detail">
            <div class="container">
                <div class="header_menu_detail_items">
                    <div class="header_menu_detail_item">
                        <h2 class="header_menu_detail_item_title">
                            <?php the_field('zagolovok_punkta_menyu_kompaniya', 'option'); ?>
                        </h2>
                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'Header_menu_mobile_company',
                                'container' => null,
                                'menu_class' => 'header_menu_detail_item_list',
                                //'depth' => 1
                            )
                        );
                        ?>
                    </div>

                    <div class="header_menu_detail_item">
                        <h2 class="header_menu_detail_item_title">
                            <?php the_field('zagolovok_punkta_menyu_proekty', 'option'); ?>
                        </h2>
                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'Header_menu_mobile_projects',
                                'container' => null,
                                'menu_class' => 'header_menu_detail_item_list',
                                //'depth' => 1
                            )
                        );
                        ?>
                    </div>

                    <div class="header_menu_detail_item">
                        <h2 class="header_menu_detail_item_title">
                            <?php the_field('zagolovok_punkta_menyu_uslugi', 'option'); ?>
                        </h2>
                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'Header_menu_mobile_services',
                                'container' => null,
                                'menu_class' => 'header_menu_detail_item_list',
                                //'depth' => 1
                            )
                        );
                        ?>
                    </div>

                    <div class="header_menu_detail_item">
                        <h2 class="header_menu_detail_item_title">
                            <?php the_field('zagolovok_punkta_menyu_informacziya', 'option'); ?>
                        </h2>
                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'Header_menu_mobile_info',
                                'container' => null,
                                'menu_class' => 'header_menu_detail_item_list',
                                //'depth' => 1
                            )
                        );
                        ?>
                    </div>

                    <div class="header_menu_detail_item">
                        <div class="header_menu_detail_item_contacts">
                            <div class="header_menu_detail_item_contacts_title">
                                <?php the_field('glavnyj_ofis', 'option'); ?>
                            </div>
                            <div class="header_menu_detail_item_contacts_text">
                                <?php the_field('adres', 'option'); ?>
                            </div>
                            <div class="header_menu_detail_item_contacts_title">
                                <?php the_field('zagolovok_dostavki', 'option'); ?>
                            </div>
                            <a href="tel:<?php the_field('nomer_telefona', 'option'); ?>"
                                class="header_menu_detail_item_contacts_text">
                                <?php the_field('nomer_telefona', 'option'); ?>
                            </a>
                            <a href="<?php the_field('ssylka_knopki_obratnogo_zvonka', 'option'); ?>" data-fancybox=""
                                class="header_menu_detail_item_contacts_callback">
                                <?php the_field('naimenovanie_knopki_obratnogo_zvonka', 'option'); ?>
                            </a>
                            <div class="header_menu_detail_item_contacts_social">
                                <div class="header_menu_detail_item_contacts_social_title">
                                    <?php the_field('zagolovok_soczialnyh_setej_v_hedere', 'option'); ?>
                                </div>
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
                                    <?php // No rows found 
                                        ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php //echo do_shortcode('[wpf-filters id=1]'); 
    ?>