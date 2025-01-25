<?php get_header(); ?>

<main>
    
<div class="hero">
    <div class="hero-content">
        <h1>Développeuse Wordpress<br>Experte SEO<br><span class="highlight">à Nantes</span></h1>
        <p class="subtitle">Créons ensemble des sites performants, plus écologiques et uniques</p>
        <a href="#contact" class="cta-button">Contactez-moi</a>
    </div>
    <div class="hero-graphic">
        <!-- Exemple d'un élément graphique (forme SVG ou image décorative) -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="graphic-shape">
            <circle cx="100" cy="100" r="100" fill="#FFD3B5" />
        </svg>
    </div>
</div>

<div class="container">
    
    <h2>Création de sites web</h2>
    <div class="bulles">
        <h3>Ecolos</h3>
        <h3>Optimisés SEO</h3>
        <h3>Sur-mesure</h3>
        <h3>Vitrine</h3>
        <h3>E-commerce</h3>
    </div>
<!--------- Liste des projets ------------>
    <h2>Réalisations</h2>
    <div class="photo-block-container">
            <?php
            get_template_part('template_parts/photo_block', null, array(
                'post_type' => 'realisation',
                'posts_per_page' => 6,             
            ));
            ?>
        </div>
</div>

</main>

<?php get_footer(); ?>