<?php

/**
 * Template Name: Services
 * Description: Modèle personnalisé pour les pages de services
 */

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post(); 
        ?>
        <div class="services">
            <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="hero-content">
                    <h1><?php the_title(); ?></h1>
                    <p class="subtitle">Des sites éco-conçus performants & bien référencés</p>
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
