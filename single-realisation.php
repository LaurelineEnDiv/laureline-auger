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
        $date = ucfirst($date);
        $github_url = get_field('lien_github');
    ?>
    <div class="separator"></div>
    <div class="container">
        <figure id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
            <div class="infos">
                <h1 class="light"><?php the_title(); ?></h1>
                <div class="meta">
                    <p class="date"> - <?php echo $date; ?> - </p>
                    <ul class="technologies-logos">
                        <?php
                        if (!empty($technologies) && !is_wp_error($technologies)) {
                            foreach ($technologies as $technology) {
                                $logo_url = get_field('logo', $technology);
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
                    <div class="github-link">
                        <?php
                        if ($github_url) :
                        ?>
                            <p>Voir le code du projet :</p>
                            <a href="<?php echo esc_url($github_url); ?>" target="_blank">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/logo-github.jpg'); ?>" alt="Voir sur GitHub">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="photo-and-content">
                <div class="photo">
                    <?php 
                    // Extraire uniquement les images insérées dans the_content()
                    $content = get_the_content();
                    preg_match_all('/<img[^>]+>/i', $content, $matches); 
                    foreach ($matches[0] as $image) {
                        echo $image; 
                    }
                    ?>
                </div>

                <div class="content">
                    <?php 
                        $content = get_the_content();
                        $content_without_images = preg_replace('/<img[^>]*>/', '', $content);
                        echo apply_filters('the_content', $content_without_images); 
                    ?>
                </div>
            </div>
        </figure>
    </div>
    <div class="separator"></div>
      
    <section class="container others">
        <h2>Autres réalisations</h2>
        <div class="realisations-block-container">
            <?php
                $current_categories = wp_get_post_terms(get_the_ID(), 'categorie', array('fields' => 'ids'));   

                get_template_part('template_parts/bloc-realisations', null, array(
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
    <?php 
    endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>

