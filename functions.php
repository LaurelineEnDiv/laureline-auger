<?php
// pour que le thème gère les balises title dynamiquement
add_theme_support( 'title-tag' );

//Charge le fichier style.css
function theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style/style.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), null);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap');
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


?>

