<?php
add_action(
    'wp_enqueue_scripts',
    function () {
        //подключаем стили
        wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css');
        wp_enqueue_style('font', get_template_directory_uri() . '/assets/font/stylesheet.css');
        wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper.css');
        wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/css/fancybox.css');
        //wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
        wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.min.css');
        wp_enqueue_style('redesign', get_template_directory_uri() . '/assets/css/redesign.css');
        //подключаем jquery
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.js');
        wp_enqueue_script('jquery');
        //подключаем скрипты
        wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper.js', array('jquery'), 'null', true);
        wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/js/fancybox.js', array('jquery'), 'null', true);
        wp_enqueue_script('wow.min.js', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), 'null', true);
        //wp_enqueue_script('scrollreveal.js', get_template_directory_uri() . '/assets/js/scrollreveal.js', array('jquery'), 'null', true);
        wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), 'null', true);
    }
);
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('menus');
// Remove <p> and <br/> from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wp_is_application_passwords_available', '__return_false');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: same-origin');
header('X-Frame-Options: SAMEORIGIN');
header("Permissions-Policy: accelerometer 'none' ; ambient-light-sensor 'none' ; autoplay 'none' ; camera 'none' ; encrypted-media 'none' ; fullscreen 'none' ; geolocation 'none' ; gyroscope 'none' ; magnetometer 'none' ; microphone 'none' ; midi 'none' ; payment 'none' ; speaker 'none' ; sync-xhr 'none' ; usb 'none' ; notifications 'none' ; vibrate 'none' ; push 'none' ; vr 'none' ");
function remove_version() {
                    return '';
                }
            add_filter('the_generator', 'remove_version');
header('Strict-Transport-Security: max-age=31536000;');

remove_action('wp_head', 'rsd_link');
add_filter('xmlrpc_enabled', '__return_false');

add_action('acf/init', 'set_acf_settings');
function set_acf_settings()
{
    acf_update_setting('enable_shortcode', true);
}







add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

// удаляем "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});


/* 
 * Обновляем счетчик 
 */
function get_yith_wishlist_count_ajax()
{

    $wishlist_count = YITH_WCWL()->count_products();
    wp_send_json_success($wishlist_count);
}
add_action('wp_ajax_update_wishlist_counter', 'get_yith_wishlist_count_ajax');
add_action('wp_ajax_nopriv_update_wishlist_counter', 'get_yith_wishlist_count_ajax');


/* 
 * Шорткод количество товаров для сравнения
 */
/* function get_yith_compare_count()
{
    if (class_exists('YITH_Woocompare')) {
        global $yith_woocompare;
        $compare_count = $yith_woocompare->obj->get_products_list();
        return count($compare_count);
    } else {
        return 0;
    }
}
function yith_compare_count_shortcode()
{
    $compare_count = get_yith_compare_count();
    return '<span class="yith-compare-count">' . $compare_count . '</span>';
}
add_shortcode('yith_compare_count', 'yith_compare_count_shortcode'); */

/**
 * Ajax pагрузка acf полей 
 */
function load_more()
{
    global $post;
    if (isset($_POST['offset']) && isset($_POST['page_id']) && isset($_POST['acf_field'])) {
        $offset = intval($_POST['offset']);
        $page_id = intval($_POST['page_id']);

        $acf_field = sanitize_text_field($_POST['acf_field']); // проверка полученного параметра
        if (strlen($acf_field) > 20) { // чтоб не больше 20 символов
            echo json_encode(
                array(
                    'html' => 'Ошибка',
                    'has_more' => false
                )
            );
            wp_die();
        }
        if (have_rows($acf_field, $page_id)) {
            $count = 0;
            $items_to_load = 4;
            $html = '';
            $has_more = false;

            while (have_rows($acf_field, $page_id)):
                the_row();
                if ($count < $offset) {
                    $count++;
                    continue;
                }
                if ($count >= $offset + $items_to_load) {
                    $has_more = true;
                    break;
                }
                $count++;

                ob_start();

                if ($_POST['acf_field'] == 'fotogalereya') {
                    $html .= '<li class="wow fadeInUp animated">';
                    $ssylka_na_element_galerei = get_sub_field('ssylka_na_element_galerei', $page_id);
                    if ($ssylka_na_element_galerei):
                        foreach ($ssylka_na_element_galerei as $post):
                            setup_postdata($post);
                            $html .= '<a href="' . get_the_permalink() . '">';
                            $html .= '<figure>';
                            $zadnij_fona_elementa_fotogalerei = get_sub_field('zadnij_fona_elementa_fotogalerei');
                            if ($zadnij_fona_elementa_fotogalerei):
                                $html .= '<img src="' . esc_url($zadnij_fona_elementa_fotogalerei['url']) . '" alt="' . esc_attr($zadnij_fona_elementa_fotogalerei['alt']) . '" />';
                            endif;
                            $html .= '<figcaption>';
                            $html .= '<h2>' . get_the_title() . '</h2>';
                            if (get_sub_field("opisanie_elementa_fotogalerei")):
                                $html .= '<h3>' . get_sub_field("opisanie_elementa_fotogalerei") . '</h3>';
                            endif;
                            $html .= '</figcaption>';
                            $html .= '</figure>';
                            $html .= '</a>';
                        endforeach;
                    endif;
                    $html .= '</li>';
                } else if ($_POST['acf_field'] == 'video_galereya') {
                    $html .= '<li class="wow fadeInUp animated">';

                    $html .= '<a href="' . get_sub_field('ssylka_na_yutub_video_galerei') . '">';
                    $html .= '<figure>';
                    $zadnij_fon_elementa_video_galerei = get_sub_field('zadnij_fon_elementa_video_galerei');
                    if ($zadnij_fon_elementa_video_galerei):
                        $html .= '<img src="' . esc_url($zadnij_fon_elementa_video_galerei['url']) . '" alt="' . esc_attr($zadnij_fon_elementa_video_galerei['alt']) . '" />';
                    endif;
                    $html .= '<figcaption>';
                    $html .= '<div class="video_galery_item_info">';
                    $html .= '<h2>' . get_sub_field('nazvanie_elementa_video_galerei') . '</h2>';
                    $html .= '<div class="video_galery_item_info_others"><div class="video_galery_item_info_others_icon"></div></div>';
                    $html .= '</div>';
                    $html .= '</figcaption>';
                    $html .= '</figure>';
                    $html .= '</a>';
                    $html .= '</li>';
                }
            endwhile;

            echo json_encode(
                array(
                    'html' => $html,
                    'has_more' => $has_more
                )
            );
        } else {
            echo json_encode(
                array(
                    'html' => '',
                    'has_more' => false
                )
            );
        }
    }
    wp_die();
}
add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');

/**
 * Ajax загрузка записей 
 */
function load_more_ajax_news()
{
    $paged = $_POST['page'] + 1;

    $args = array(
        'post_type' => 'post',
        // 'posts_per_page' => 10,
        'paged' => $paged,
    );

    $query = new WP_Query($args);
    if ($query->max_num_pages > 1) {
        // echo '';
    }
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
            get_template_part('template-parts/content', get_post_type());
        endwhile;
    endif;

    wp_die();
}
add_action('wp_ajax_load_more_news', 'load_more_ajax_news');
add_action('wp_ajax_nopriv_load_more_news', 'load_more_ajax_news');

/********** */

add_action('wp_ajax_load_more_products', 'load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');

function load_more_products()
{

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $wpf_fbv = isset($_POST['wpf_fbv']) ? sanitize_text_field($_POST['wpf_fbv']) : '';

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 12,
        'paged' => $paged,
        'post_status' => 'publish',
    );

    if ($wpf_fbv) {
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('woocommerce/content', 'product');

        }
        if ($query->max_num_pages > $paged) {
            ?>
            <div class="news_btn">
                <button id="load_products" class="btn" data-page="<?php echo $paged + 1; ?>">Больше домов</button>
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo 'no-more-products';
    }
    die();
}


/********** */



function display_custom_related_products()
{
    global $product;

    $related_products = wc_get_related_products($product->get_id(), 3); // Получаем ID 3-х сопутствующих товаров
    $related_products = $product->get_cross_sell_ids(); // Получаем ID 3-х сопутствующих товаров

    if (count($related_products) > 0) {
        // $cross_sell_ids = $product->get_cross_sell_ids();
        // print_r($cross_sell_ids);

        foreach ($related_products as $related_product_id) {
            $post_object = get_post($related_product_id);
            setup_postdata($GLOBALS['post'] = &$post_object);
            wc_get_template_part('content', 'product');
        }

        wp_reset_postdata();
    }
}

add_action("template_redirect", 'redirection_function');
function redirection_function()
{
    global $woocommerce;
    if (is_cart() && WC()->cart->cart_contents_count == 0) {
        wp_safe_redirect(get_permalink(woocommerce_get_page_id('katalog')));
    }
}

add_action('acf/render_field_settings/type=image', function ($field) {
    acf_render_field_setting(
        $field,
        array(
            'label' => __('Default Image', 'acf'),
            'instructions' => __('Appears when creating a new post', 'acf'),
            'type' => 'image',
            'name' => 'default_value',
        )
    );
});

add_filter('acf/load_value/type=image', function ($value, $post_id, $field) {
    if (!$value) {
        $value = $field['default_value'];
    }
    return $value;
}, 10, 3);

function make_product_atts_linkable($text, $attribute, $values)
{
    $vals = array();

    if ($attribute->is_taxonomy()) {
        foreach ($attribute->get_options() as $i => $id) {
            if ($url = get_term_meta($id, 'attribute_url', true)) {
                $vals[] = '<a href="' . esc_url($url) . '">' . esc_html(get_term_field('name', $id)) . '</a>';
            } else {
                $vals[] = $values[$i];
            }
        }
    } else {
        foreach ($attribute->get_options() as $value) {
            $vals[] = preg_replace_callback('/\[([^\]]+)\]\(([^) ]+)(?: "([^"]+)"|)\)/', function ($matches) {
                $title = (!empty($matches[3])) ? ' title="' . esc_attr($matches[3]) . '"' : '';
                return '<a href="' . esc_url($matches[2]) . '"' . $title . '>' . esc_html($matches[1]) . '</a>';
            }, $value);
        }
    }

    return wpautop(wptexturize(implode(', ', $vals)));
    //return implode( ', ', $vals ); // Use this or the above. Up to you..
}
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol($currency_symbol, $currency)
{
    switch ($currency) {
        case 'RUB':
            $currency_symbol = 'р';
            break;
    }
    return $currency_symbol;
}

add_action( 'wpcf7_mail_sent', 'CF7_pre_send' );

function CF7_pre_send($cf7) {

    // ## phone ## //
    if( !isset($_POST['phone_client']) ) return false;
    if( !trim($_POST['phone_client']) )  return false;

    // ## referer ## //
    if( !isset($_SERVER['HTTP_REFERER']) ) return false;
    if( !trim($_SERVER['HTTP_REFERER']) )  return false;

    // ## UTM ## //

    $utm_source   = (isset($_POST['utm_source'])   && $_POST['utm_source'] != '')   ? htmlspecialchars($_POST['utm_source'])   : '';
    $utm_campaign = (isset($_POST['utm_campaign']) && $_POST['utm_campaign'] != '') ? htmlspecialchars($_POST['utm_campaign']) : '';
    $utm_term     = (isset($_POST['utm_term'])     && $_POST['utm_term'] != '')     ? htmlspecialchars($_POST['utm_term'])     : '';
    $utm_content  = (isset($_POST['utm_content'])  && $_POST['utm_content'] != '')  ? htmlspecialchars($_POST['utm_content'])  : '';
    $utm_medium   = (isset($_POST['utm_medium'])   && $_POST['utm_medium'] != '')   ? htmlspecialchars($_POST['utm_medium'])   : '';
    $roistat      = (isset($_POST['roistat'])      && $_POST['roistat']      != '') ? htmlspecialchars($_POST['roistat'])      : '';
  
    // ## Основные переменные ## //

    $your_name  = (isset($_POST['name_client'])  && $_POST['name_client']  != '') ? htmlspecialchars($_POST['name_client'])  : 'Имя неизвестно';
    $your_phone = (isset($_POST['phone_client']) && $_POST['phone_client'] != '') ? htmlspecialchars($_POST['phone_client']) : '';
    $your_email = (isset($_POST['email_client']) && $_POST['email_client'] != '') ? htmlspecialchars($_POST['email_client']) : '';

  $title_product = (isset($_POST['title_product']) && $_POST['title_product'] != '') ? htmlspecialchars($_POST['title_product']) : '';
  $message       = (isset($_POST['message'])       && $_POST['message']       != '') ? htmlspecialchars($_POST['message'])       : '';

  $r1 = (isset($_POST['radio-28'])       && $_POST['radio-28']       != '') ? htmlspecialchars($_POST['radio-28'])       : '';
  $r2 = (isset($_POST['radio-853'])       && $_POST['radio-853']       != '') ? htmlspecialchars($_POST['radio-853'])       : '';
  $r3 = (isset($_POST['radio-854'])       && $_POST['radio-854']       != '') ? htmlspecialchars($_POST['radio-854'])       : '';

  
  
    // ## Комментарий ## //

    $comment = 'Название формы: "'.$cf7->title.'"';
    if( $message != '' ) $comment .= '. Сообщение: '.$message;


  // ## Готовим строку ## //

    $title_amo = 'Заявка с naturi.su';
    
    $message_line = $title_amo.'||'.$your_name.'||'.$your_phone.'||'.$your_email.'||'.$comment.'||'.$utm_source.'||'.$utm_campaign.'||'.$utm_term.'||'.$utm_content.'||'.$utm_medium.'||'.$title_product.'||'.$r1.'||'.$r2.'||'.$r3.'||'.$roistat."\r\n";

    // ## Сохраняем заявку в файл для будущей отправки в АМО ## //

    $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/mars-web.ru/sender.txt', 'a');
    flock($fp, LOCK_EX); // Блокирование файла для записи
    fputs($fp, $message_line);
    flock($fp, LOCK_UN); // Снятие блокировки
    fclose($fp);
    
}


/* send calltouch */
function custom_cf7_send_mail($contact_form) {
    try {
        $ct_site_id = '70689'; // ID сайта Calltouch
        $call_value = isset($_COOKIE['_ct_session_id']) ? $_COOKIE['_ct_session_id'] : (isset($_REQUEST['_ct_session_id']) ? $_REQUEST['_ct_session_id'] : '');
        $submission = WPCF7_Submission::get_instance();
        $posted_data = $submission->get_posted_data();
            
        $fio = '';
        $phone = '';
        $mail = '';
        $comment = isset($_POST['your-message']) ? $_POST['your-message'] : '';
    
        // Условия поиска для каждой переменной
        $searchConditions = [
            'fio' => ['name', 'fio', 'text', 'person'],
            'phone' => ['tel', 'phone', 'text'],
            'mail' => ['email', 'mail', 'your-email']
        ];
    
        foreach ($searchConditions as $varName => $conditions) {
            foreach ($posted_data as $key => $value) {
                foreach ($conditions as $condition) {
                    if (strpos($key, $condition) !== false) {
                        $$varName = mb_convert_encoding($value, "UTF-8", "auto");
                        break 2;
                    }
                }
            }
            // Дополнительная проверка на основе регулярного выражения и фильтра
            if (empty($$varName)) {
                foreach ($posted_data as $key => $value) {
                    if ($varName === 'phone' && preg_match('/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/', $value)) {
                        $$varName = mb_convert_encoding($value, "UTF-8", "auto");
                        break;
                    } elseif ($varName === 'mail' && filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $$varName = mb_convert_encoding($value, "UTF-8", "auto");
                        break;
                    }
                }
            }
        }
            
        // Пишем в лог селекторы, если не нашли $phone и $mail
        if (empty($phone) && empty($mail)) {
            file_put_contents(__DIR__ . '/calltouch_selector_log.txt', "\n\nrequest " . date("Y.m.d H:i") . "\n" . print_r($submission->get_posted_data(), true) . "\n", FILE_APPEND | LOCK_EX);
        }
            
        $request_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $ct_data = array(
            'subject'       => mb_convert_encoding($contact_form->title(), "UTF-8", "auto"),
            'fio'           => $fio,
            'phoneNumber'   => $phone,
            'email'         => $mail,
            'comment'       => $comment,
            'requestUrl'    => $request_url,
            'sessionId'     => $call_value,
        );
            
        $ct_data_str = http_build_query($ct_data);
            
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.calltouch.ru/calls-service/RestAPI/requests/$ct_site_id/register/");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded;charset=utf-8"));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ct_data_str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $calltouch = curl_exec($ch);
            
        // Проверка на ошибку выполнения запроса
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
            
        // Получение HTTP-кода ответа
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code != 200) {
            // Проверяем, является ли ответ JSON
            $response = json_decode($calltouch, true);
             
            if (json_last_error() === JSON_ERROR_NONE && isset($response['data']['message'])) {
                // Если ответ успешно декодирован как JSON и есть сообщение об ошибке
                $errorMessage = $response['data']['message'];
            } elseif (json_last_error() === JSON_ERROR_NONE && isset($response['message'])) {
                // Если в JSON есть просто сообщение без 'data'
                $errorMessage = $response['message'];
            } else {
                // Если это не JSON, просто выводим весь ответ как есть
                $errorMessage = $calltouch;
            }
 
            throw new Exception("HTTP response code: " . $http_code . ". Response: " . mb_convert_encoding($errorMessage, "UTF-8", "auto"));
        }
            
        curl_close($ch);
            
        // Логируем успешный запрос
        $log_message = "\n\nrequest " . date("Y.m.d H:i") . "\n";
        $log_message .= "Data sent: " . $ct_data_str . "\n";
        $log_message .= "Response: " . $calltouch . "\n";
        // file_put_contents(__DIR__ . '/calltouch_log.txt', $log_message, FILE_APPEND | LOCK_EX);
            
    } catch (Exception $e) {
        // Логируем ошибку
        $log_message = "\n\nrequest " . date("Y.m.d H:i") . "\n";
        $log_message .= "Data sent: " . $ct_data_str . "\n";
        $log_message .= "Error: " . $e->getMessage() . "\n";
        file_put_contents(__DIR__ . '/calltouch_error_log.txt', $log_message, FILE_APPEND | LOCK_EX);
    }
}
    
add_filter('woocommerce_get_catalog_ordering_args', 'lowprice_woocommerce_catalog_orderby');

function lowprice_woocommerce_catalog_orderby($args) {
    if (is_shop() || is_product_category()) {
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
        $args['meta_key'] = '_price';
    }
    return $args;
}
    
    
    
add_action('wpcf7_mail_sent', 'custom_cf7_send_mail');
/* send calltouch */

/*
function wpds_validate_bot($result, $tags){
  if (!empty($_POST['your-check-bot'])) {
    return false;
  }
  return $result;
}
add_filter('wpcf7_validate', 'wpds_validate_bot', 10, 2);

*/
//add_action('cfdb7_after_save_data', 'cfdb7_after_save_data_handler');
/*
function cfdb7_after_save_data_handler($insert_id)
{
    global $wpdb;
    $cfdb = apply_filters('cfdb7_database', $wpdb);
    $table_name = $cfdb->prefix . 'db7_forms';
    $upload_dir = wp_upload_dir();
    $cfdb7_dir_url = $upload_dir['baseurl'] . '/cfdb7_uploads';
    $results = $cfdb->get_results("SELECT * FROM $table_name WHERE form_id = $insert_id LIMIT 1", OBJECT);
    $posted_data = unserialize($results[0]->form_value);

    $contact_form = WPCF7_ContactForm::get_current();
    $title = $contact_form->title;
    $name = $posted_data['name_client'];
    $phone = $posted_data['phone_client'];
    $email = $posted_data['email_client'];
    $message = $posted_data['message'];
    $file = $posted_data['file'];

    $queryUrl = 'https://naturi.bitrix24.ru/rest/7/qddk7upy1xg77pax/crm.lead.add.json';
    $arFields = [
        'TITLE' => 'Лид с сайта naturi.su, форма: ' . $title,
        'ASSIGNED_BY_ID' => 11 // Антон
    ];
    if ($phone)
        $arFields['PHONE'] = array(array('VALUE' => $phone, 'VALUE_TYPE' => 'WORK'));
    if ($email)
        $arFields['EMAIL'] = array(array('VALUE' => $email));
    if ($message)
        $arFields['COMMENTS'] = $message;
    if ($file)
        $arFields['COMMENTS'] .= '<br><br>Файл из формы: <a href="' . $cfdb7_dir_url . '/' . $file . '">' . $cfdb7_dir_url . '/' . $file . '</a>';
    $queryData = http_build_query(array(
        'fields' => $arFields,
        'params' => array("REGISTER_SONET_EVENT" => "Y")
    ));

    // Обращаемся к Битрикс24 при помощи функции curl_exec
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData,
    ));
    $result = curl_exec($curl);
    curl_close($curl);
}
*/