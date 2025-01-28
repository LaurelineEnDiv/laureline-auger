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
            <div class="overlay"></div>
        </div>
    <?php endwhile; ?>
    </div>
<?php
    wp_reset_postdata();
endif;
?>
