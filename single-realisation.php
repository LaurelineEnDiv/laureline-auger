<?php get_header(); ?>

<main>
    <?php
    if ( have_posts() ) : 
        while ( have_posts() ) : 
            the_post(); 

        // Récupération des données
        $categories = get_the_terms( get_the_ID(), 'categorie' ); 
        $technologies = get_the_terms( get_the_ID(), 'technologies' );   
        $date = get_the_date('F Y');
    ?>
   <div class="header-separator"></div>
    <div class="single-realisation">
        <figure id="post-<?php the_ID(); ?>" class="container"<?php post_class(); ?>>
            <div class="photo-infos">
                <h1><?php the_title(); ?></h1>
                <div class="photo-meta">
                    <p>Date : <?php echo $date; ?></p>
                    <p>Technologies :</p>
                        <ul class="technologies-logos">
                        <?php
                        if (!empty($technologies) && !is_wp_error($technologies)) {
                            foreach ($technologies as $technology) {
                                // Récupérer le logo via ACF
                                $logo_url = get_field('logo', $technology);

                                // Affichage du logo ou du nom si pas de logo
                                if ($logo_url) {
                                    echo '<li>';
                                    echo '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr($technology->name) . '" class="logo-image">';
                                    echo '</li>';
                                } else {
                                    echo '<li>' . esc_html($technology->name) . '</li>';
                                }
                            }
                        }
                        ?>
                        </ul>

                </div>
            </div>

            <div class="photo-and-content">
                <div class="photo">
                    <?php 
                    // Extraire uniquement les images insérées dans the_content()
                    $content = get_the_content();
                    preg_match_all('/<img[^>]+>/i', $content, $matches); 
                    foreach ($matches[0] as $image) {
                        echo $image; // Afficher chaque image séparément
                    }
                    ?>
                </div>

                <div class="photo-content">
                    <?php 
                        $content = get_the_content();
                        $content_without_images = preg_replace('/<img[^>]*>/', '', $content);
                        echo apply_filters('the_content', $content_without_images); 
                    ?>
                </div>
            </div>
        </figure>
        
        <div>
            <div class="separator"></div>
        </div>

        <section class="container others">
            <h2>Autres réalisations</h2>
            <div class="realisations-block-container">
            <?php
                // Récupération des termes (IDs) de la categorie associés à la photo actuelle
                $current_categories = wp_get_post_terms(get_the_ID(), 'categorie', array('fields' => 'ids'));   

                get_template_part('template_parts/photo_block', null, array(
                    'post_type' => 'realisation',
                    'posts_per_page' => 2,
                    'orderby' => 'rand',
                    'post__not_in' => array(get_the_ID()), 
                    'tax_query' => array( 
                        array(
                            'taxonomy' => 'categorie',
                            'field' => 'term_id',
                            'terms' => $current_categories,
                        ),
                    ),
                ));
            ?>
            </div>
        </section>
    </div>
    <?php 
    endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>

