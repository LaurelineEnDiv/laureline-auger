<?php
// Ajout du support des fonctionnalités de base du thème
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

add_filter('wpcf7_validate', 'custom_recaptcha_verification', 20, 2);
function custom_recaptcha_verification($result, $tags) {
    $recaptcha_secret = RECAPTCHA_SECRET_KEY;
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Vérification avec Google
    $verify_url = 'https://www.google.com/recaptcha/api/siteverify';
    $response = wp_remote_post($verify_url, [
        'body' => [
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ]
    ]);

    $response_body = wp_remote_retrieve_body($response);
    $result_json = json_decode($response_body, true);

    if (!$result_json['success'] || $result_json['score'] < 0.5) {
        $result->invalidate('recaptcha', 'Échec de la validation reCAPTCHA. Essayez encore.');
    }

    return $result;
}


// Activer les images à la une pour le CPT "realisation"
function enable_thumbnail_support_for_cpt() {
    add_post_type_support('realisation', 'thumbnail'); 
}
add_action('init', 'enable_thumbnail_support_for_cpt');

// Charger les fichiers CSS
function theme_enqueue_styles() {
    // Chargement du fichier principal de styles
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style/style.css', [], filemtime(get_template_directory() . '/style/style.css'));

    // Font Awesome via CDN
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', [], '6.4.2');

    // Google Fonts : Raleway & Quicksand
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap',
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Charger les fichiers JavaScript
function theme_enqueue_scripts() {
    // Vérifie si le fichier JS existe avant de l’inclure
    $js_dir = get_template_directory_uri() . '/js/';

    wp_enqueue_script('dynamic-word', $js_dir . 'dynamic-word.js', [], filemtime(get_template_directory() . '/js/dynamic-word.js'), true);
    wp_enqueue_script('cv', $js_dir . 'cv.js', [], '1.0', true);
    wp_enqueue_script('menu-mobile', $js_dir . 'menu-mobile.js', [], null, true);
    wp_enqueue_script('modale-contact', $js_dir . 'modale-contact.js', [], null, true);
    wp_enqueue_script('services', get_template_directory_uri() . '/js/services.js', array('jquery'), '1.0', true);
    wp_enqueue_script('parallaxe', get_template_directory_uri() . '/js/parallaxe.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Enregistre les emplacements de menus
function register_menus() {
    register_nav_menus([
        'main-menu' => 'Menu Principal',
        'footer-menu' => 'Menu Footer'
    ]);
}
add_action('init', 'register_menus');

// Ajoute la classe "open-modale" au lien Contact du menu
function add_contact_menu_class($atts, $item, $args) {
    if ($item->title === 'Contact') {
        $atts['class'] = isset($atts['class']) ? $atts['class'] . ' open-modale' : 'open-modale';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_contact_menu_class', 10, 3);
