<?php

/**
 * Template Name: Services
 * Description: Modèle personnalisé pour les pages de services
 */

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post(); 

        // Récupérer le slug de la page
        $page_slug = get_post_field( 'post_name', get_the_ID() );

        // Définir le sous-titre en fonction du slug
        $subtitle = "Des sites éco-conçus performants & bien référencés"; // Valeur par défaut

        if ( $page_slug === 'optimisation-seo' ) {
            $subtitle = "Boostez votre visibilité avec une stratégie SEO efficace";
        }
        if ( $page_slug === 'support-et-maintenance' ) {
            $subtitle = "Sécurisez et optimisez les performances de votre site Wordpress";
        }
        ?>
        <div class="page-services">
            <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="hero-content">
                    <h1><?php the_title(); ?></h1>
                    <p class="subtitle"><?php echo esc_html($subtitle); ?></p>
                </div>
                <div class="container content">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    <?php 
    endwhile; 
else :
    echo '<p>Aucune page trouvée</p>';
endif;

get_footer(); 
?>
