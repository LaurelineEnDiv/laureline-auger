<?php

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post(); 
        ?>
        <div class="container">
            <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <div class="content">
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
