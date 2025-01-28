<?php
// Récupérer les arguments
if (!isset($args)) {
    $args = array(
        'post_type' => 'realisation',
    );
}

// Requête WP_Query avec les arguments 
$query = new WP_Query($args);

// Afficher les photos sous forme de vignettes cliquables
if ($query->have_posts()) : ?>
    <div class="realisations-block">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="featured-image">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="image-container">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
            </a>
            
            <!-- Footer Polaroid -->
            <div class="polaroid-footer">
                <?php the_title(); ?>
            </div>

            <!-- Overlay infos -->
            <?php
            $categories = get_the_terms(get_the_ID(), 'categorie');
            $category_name = (!empty($categories) && !is_wp_error($categories)) ? esc_html($categories[0]->name) : '';
            ?>
            <div class="overlay">
                <span class="eye-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon_eye.png">
                </span>
                <div class="photo-category">
                    <?php echo $category_name; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
<?php
    wp_reset_postdata();
endif;
?>
