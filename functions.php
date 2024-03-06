<?php
/**
 * загружаемые стили и скрипты
 **/
function load_style_script(){
    // Подключаем jQuery из CDN
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', array(), '3.1.0', true);
    
    // Подключаем скрипт Page Scroll to id plugin из индивидуальной темы
    wp_enqueue_script('page-scroll-to-id', get_template_directory_uri() . '/Travel-landing-page/js/jquery.malihu.PageScroll2id.js', array('jquery'), null, true);

    // Основные стили и скрипты из основной темы
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), null, true);
    wp_enqueue_style('maxcdn.bootstrapcdn', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null);
    wp_enqueue_style('fonts.googleapis', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700', array(), null);
    wp_enqueue_style('reset', get_stylesheet_directory_uri() . '/reset.css', array(), null);
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array(), null);
    wp_enqueue_style('nav', get_stylesheet_directory_uri() . '/css/nav.css', array(), null);
    wp_enqueue_style('slider', get_stylesheet_directory_uri() . '/css/slider.css', array(), null);
    wp_enqueue_style('content', get_stylesheet_directory_uri() . '/css/content.css', array(), null);
    wp_enqueue_style('contact_form', get_stylesheet_directory_uri() . '/css/contact_form.css', array(), null);
    wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css', array(), null);

    
}

/**
 * загружаем стили и скрипты
 **/
add_action('wp_enqueue_scripts', 'load_style_script');

/**
* поддержка миниатюр
**/
add_theme_support('post-thumbnails');
/**
* меню
**/
register_nav_menus ( array(
 'menu-header' => 'меню в шапке',
 'menu-futer' => 'меню в футере',
 ) );
 /**
 *  Изменение параметров по умолчанию
 **/
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
function my_wp_nav_menu_args( $args='' ){
	$args['container'] = '';  // убираем обертку, div, вокруг меню
	return $args;
}
/**
*  удаление всех классов списка и идентификаторов в functions.php
**/
add_filter('nav_menu_item_id', 'filter_menu_id');
add_filter( 'nav_menu_css_class', 'filter_menu_li' );
function filter_menu_li(){
    return array('');   
}
function filter_menu_id(){
    return; 
}
/**
* футер
**/
register_sidebar(array(
	'name' => 'Виджеты футера',
	'id' => 'footer',
	'description' => 'Здесь размещайте виджеты футера',
	'before_widget' => '<div class="menu-foot">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
));
// Добавление поля метаданных к изображениям
function custom_image_attachment_fields_to_edit($form_fields, $post) {
    $form_fields['page_link'] = array(
        'label' => __('Page Link'),
        'input' => 'text',
        'value' => get_post_meta($post->ID, 'page_link', true),
        'helps' => __('Enter the URL of the page associated with this image.'),
    );
    return $form_fields;
}
add_filter('attachment_fields_to_edit', 'custom_image_attachment_fields_to_edit', 10, 2);

// Сохранение значения поля метаданных
function custom_image_attachment_fields_to_save($post, $attachment) {
    if (isset($attachment['page_link'])) {
        update_post_meta($post['ID'], 'page_link', esc_url_raw($attachment['page_link']));
    }
    return $post;
}
add_filter('attachment_fields_to_save', 'custom_image_attachment_fields_to_save', 10, 2);

// Обработчик AJAX запроса
function my_custom_ajax_handler() {
    check_ajax_referer( 'my_custom_action_nonce', 'my_custom_action_nonce' );

    // Получаем данные из формы
    $name = wp_kses_post( $_POST['name'] );
    $email = wp_kses_post( $_POST['email'] );
    $country = wp_kses_post( $_POST['country'] );
    $message = wp_kses_post( $_POST['message'] );

    // Делаем что-то с полученными данными, например, отправляем письмо или сохраняем в базу данных

    // Возвращаем ответ
    wp_send_json_success( 'Success message here' );
}
add_action( 'wp_ajax_my_custom_action', 'my_custom_ajax_handler' );
add_action( 'wp_ajax_nopriv_my_custom_action', 'my_custom_ajax_handler' );

// JavaScript для обработки AJAX запроса
function my_custom_ajax_script() {
    ?>
    <script type="text/javascript">
        jQuery(function($) {
            $('form[name="adress"]').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var formAction = $(this).data('action');

                $.ajax({
                    type: 'post',
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    data: formData + '&action=' + formAction,
                    success: function(response) {
                        console.log(response);
                        // Добавьте здесь код для обработки успешного ответа, например, показ сообщения об успешной отправке
                    }
                });
            });
        });
    </script>
    <?php
}
add_action( 'wp_footer', 'my_custom_ajax_script' );

add_action('init', 'handle_contact_form_submission');

function handle_contact_form_submission() {
    if (isset($_POST['submit']) && wp_verify_nonce($_POST['_wpnonce'], 'send_contact_form')) {
        $name = sanitize_text_field($_POST['name']);
        $phone = sanitize_text_field($_POST['phone']);
        $email = sanitize_email($_POST['email']);

        // Далее обработка данных формы (например, отправка на почту)
    }
}

?>

