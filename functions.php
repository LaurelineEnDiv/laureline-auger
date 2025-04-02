<?php
// Ajout du support des fonctionnalités de base du thème
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

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
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', [], '6.5.1');


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
    wp_enqueue_script('reveal', get_template_directory_uri() . '/js/reveal.js', array('jquery'), '1.0', true);
    wp_enqueue_script('parallaxe', get_template_directory_uri() . '/js/parallaxe.js', array('jquery'), null, true);
    wp_enqueue_script('filters-script', get_template_directory_uri() . '/js/filters.js', array('jquery'), null, true);
        // Localiser l'URL AJAX
        $ajaxurl = admin_url('admin-ajax.php');
        $inline_script = "var ajaxurl = '" . esc_js($ajaxurl) . "';";
        wp_add_inline_script('filters-script', $inline_script, 'before');
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

//Gérer les requêtes Ajax pour filtrer les réalisations
function fetch_realisations() {
    // Vérifier si une catégorie a été envoyée
    $filters = isset($_POST['filters']) ? $_POST['filters'] : array();
    // Arguments WP_Query
    $args = array(
        'post_type' => 'realisation',
    );

    if (!empty($filters['categorie'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categorie',
                'field'    => 'slug',
                'terms'    => sanitize_text_field($filters['categorie']),
            ),
        );
    }
    
    // Exécutez la requête pour récupérer les réalisations
    $realisation_query = new WP_Query($args);

    // Récupérer les résultats
    ob_start();
    get_template_part('template_parts/bloc-realisations', null, $args);
    $html = ob_get_clean();

    // Retourner la réponse AJAX 
    wp_send_json_success(array('html' => $html));

    wp_die();
}

add_action('wp_ajax_fetch_realisations', 'fetch_realisations'); //pour les utilisateurs connectés
add_action('wp_ajax_nopriv_fetch_realisations', 'fetch_realisations');  //pour les utilisateurs non connectés