<?php get_header(); ?>

<main>
    <section class="hero">
        <div class="hero-content">
            <h1>Développeuse Wordpress<br>Experte SEO<br><span class="highlight">à Nantes</span></h1>
            <p class="subtitle">Créons ensemble des sites performants, plus écologiques et uniques</p>
            <a href="#contact" class="cta-button">Contactez-moi</a>
        </div>
        <div class="hero-graphic">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="graphic-shape">
                <circle cx="100" cy="100" r="100" fill="#FFD3B5" />
            </svg>
        </div>
    </section>

    <div class="container">
        <section class="sites-web">
        <h2 id="dynamic-text">Création de sites Wordpress 
            <span class="dynamic-word"></span>
        </h2>
            <div class="sites-web-content">
            <p>Développez votre visibilité sur le web avec un site Wordpress sur mesure, 
                conçu selon les bonnes pratique du Green Code pour des performances optimales 
                et pour un meilleur référencement naturel. </p>
            </div>
        </section>
    <!--------- Liste des projets ------------>
        <section class="realisations">
            <h2>Réalisations</h2>
            <div class="realisations-block-container">
                    <?php
                    get_template_part('template_parts/photo_block', null, array(
                        'post_type' => 'realisation',
                        'posts_per_page' => 6,             
                    ));
                    ?>
            </div>
        </section>   
    </div>
</main>

<?php get_footer(); ?>