<?php

    // Support des miniatures
    add_theme_support('post-thumbnails');
    
    // Support des titres dynamiques
    add_theme_support('title-tag');

    function enable_thumbnail_support_for_cpt() {
        add_post_type_support('realisation', 'thumbnail'); 
    }
    add_action('init', 'enable_thumbnail_support_for_cpt');
    

    function add_thumbnail_support_for_cptui() {
        add_post_type_support('slug_de_ton_cpt', 'thumbnail'); // Remplace 'slug_de_ton_cpt' par le slug exact de ton CPT
    }
    add_action('init', 'add_thumbnail_support_for_cptui');
    

//Charge le fichier style.css
function theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style/style.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), null);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

//Charge les fichiers Javascript
function theme_enqueue_scripts() {
    wp_enqueue_script('menu-mobile', get_template_directory_uri() . '/js/menu-mobile.js', array(), null, true);
    wp_enqueue_script('modale-contact', get_template_directory_uri() . '/js/modale-contact.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


// Enregistre les emplacements de menus
function register_menus() {
    register_nav_menus(
        array(
            'main-menu' => 'Menu Principal',
            'footer-menu' => 'Menu Footer'
        )
    );
}
add_action( 'init', 'register_menus' );

// Ajoute la classe "open-modale" au lien Contact du menu
function add_contact_menu_class($atts, $item, $args) {
    if ($item->title == 'Contact') { // Titre du lien dans le menu WordPress
            $atts['class'] = 'open-modale'; // Ajoute la classe 
        }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_contact_menu_class', 10, 3);

function get_gutenberg_gallery($content) {
    // Convertir le contenu en blocs analysables
    $blocks = parse_blocks($content);

    // Parcourir les blocs pour trouver le bloc `core/gallery`
    foreach ($blocks as $block) {
        if ($block['blockName'] === 'core/gallery') {
            return $block; // Retourne le bloc galerie
        }
    }

    return false; // Aucune galerie trouvée
}


?>

