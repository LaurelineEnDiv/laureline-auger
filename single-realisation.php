<?php get_header(); ?>

<main>
    <?php
    if ( have_posts() ) : 
        while ( have_posts() ) : 
            the_post(); 

        // Récupération des taxonomies
        $categories = get_the_terms( get_the_ID(), 'categorie' ); 
        $technologies = get_the_terms( get_the_ID(), 'technologies' );   
        // Récupération année (date de publication)
        $annee = get_the_date('Y');
    ?>
    <div class="single-photo">
        <figure id="post-<?php the_ID(); ?>" class="container"<?php post_class(); ?>>
            <div class="photo-infos">
                <h1><?php the_title(); ?></h1>
                <div class="photo-meta">
                    <p><?php
                        foreach ($categories as $categorie) {
                            echo $categorie->name . ' '; 
                        } ?>
                    </p> 
                    <p><?php echo $annee; ?></p>
                    <p>Technologies : <?php
                        if (!empty($technologies) && !is_wp_error($technologies)) {
                            $technologies_list = wp_list_pluck($technologies, 'name'); 
                            echo esc_html(implode(', ', $technologies_list)); 
                        } ?>
                    </p> 
                </div>
                <div class="photo-content">
                <?php 
                    $content = get_the_content();
                    $content_without_images = preg_replace('/<img[^>]*>/', '', $content);
                    echo apply_filters('the_content', $content_without_images); 
                ?>
                </div>
            </div>

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
        </figure>


    <div>
        <div class="separator"></div>
    </div>

    <div class="similar-photos container">
        <h2>Autres réalisations</h2>
        <div class="photo-block-container">
        <?php
            // Récupération des termes (IDs) de la categorie associés à la photo actuelle
            $current_categories = wp_get_post_terms(get_the_ID(), 'categorie', array('fields' => 'ids'));   

            get_template_part('template_parts/photo_block', null, array(
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'post__not_in' => array(get_the_ID()), //Exclut la photo actuellement affichée 
                'tax_query' => array( //requête conditionnelle pour sélectionner uniquement les photos de la même catégorie
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'term_id',
                        'terms' => $current_categories,
                    ),
                ),
            ));
        ?>
        </div>
    </div>

    </div>
    <?php 
    endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>

