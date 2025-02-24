<?php

/**
 * Template Name: Page Réalisations
 */

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post(); 
        ?>
        <div class="header-separator"></div>
        <div class="container">
            <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="light"><?php the_title(); ?></h1>
                <div class="content">
                    <?php the_content(); ?>
                </div>
                <div class="realisations-block-container">
                    <?php
                    get_template_part('template_parts/bloc-realisations', null, array(
                        'post_type' => 'realisation',
                        'posts_per_page' => 6,             
                    ));
                    ?>
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




            
       