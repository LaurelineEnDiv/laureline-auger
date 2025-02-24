<?php get_header(); ?>

<main>
    <section class="hero">
        <div class="hero-content">
            <h1>Développeuse Wordpress<br>Experte SEO<br><span class="highlight">à Nantes</span></h1>
            <p class="subtitle">Créons ensemble des sites performants, plus écologiques et uniques</p>
        </div>
        <div class="hero-graphic">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="graphic-shape">
                <circle cx="100" cy="100" r="100" fill="#FFD3B5" />
            </svg>
        </div>
    </section>

    <div class="container">
        <section class="services">
            <h2 id="dynamic-text">Création de sites Wordpress 
                <span class="dynamic-word"></span>
            </h2>
            <div class="sites-web-content">
            <p>Développez votre visibilité sur le web avec un site Wordpress sur mesure, 
                conçu selon les bonnes pratiques du Green Code pour des performances optimales 
                et un meilleur référencement naturel. </p>
            </div>
            <a href="https://laureline-auger.fr/creation-de-sites-wordpress-sur-mesure/" class="cta-button">Je veux un site Wordpress sur-mesure</a>
        </section>

        <section class="services">
        <h2>Optimisation SEO <br><span class="subtitle">pour un meilleur référencement naturel</span></h2>
            <div class="seo-content">
                <div class="seo-text">
                    <p>Un site rapide, structuré et optimisé pour les moteurs de recherche est essentiel pour améliorer votre visibilité en ligne. 
                        En tant qu'experte SEO, je vous propose d'améliorer votre référencement naturel selon trois fondamentaux :</p>
                    <ul>
                        <li><div class="top-line"><i class="fa-solid fa-code"></i><strong>SEO technique :</strong></div><span class="subtitle">Amélioration du code, de la vitesse et de la structure.</span></li>
                        <li><div class="top-line"><i class="fas fa-search"></i><strong>SEO sémantique :</strong></div><span class="subtitle">Contenu optimisé pour le référencement naturel.</span></li>
                        <li><div class="top-line"><i class="fa-solid fa-eye"></i><strong>Expérience utilisateur :</strong></div><span class="subtitle">Navigation fluide et performance optimisée.</span></li>
                    </ul>
                </div>
                <div class="seo-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/seo-illustration.svg" alt="SEO illustration">
                </div>
            </div>
            <a href="https://laureline-auger.fr/optimisation-seo/" class="cta-button">Je veux optimiser mon site pour le référencement naturel</a>
        </section>

        <section class="services">
            <h2>Support & Maintenance <br><span class="subtitle">pour un site web sécurisé et performant</span></h2>
            <div class="support-content">
                <div class="support-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/maintenance-site-web.jpg" alt="Support et Maintenance illustration">
                </div>
                <div class="support-text">
                    <p>Un site Wordpress nécessite un suivi régulier pour garantir sa sécurité, ses performances et son bon fonctionnement. 
                    Je propose des solutions de maintenance adaptées à vos besoins :</p>
                    <ul>
                    <li><div class="top-line"><i class="fas fa-shield-alt"></i><strong>Sécurité :</strong></div><span class="subtitle">Mises à jour régulières et protection contre les attaques.</span></li>
                    <li><div class="top-line"><i class="fas fa-tachometer-alt"></i><strong>Performances :</strong></div><span class="subtitle">Optimisation continue de la vitesse et des ressources.</span></li>
                    <li><div class="top-line"><i class="fas fa-life-ring"></i><strong>Assistance :</strong></div><span class="subtitle">Support technique et corrections rapides en cas de problème.</span></li>
                    </ul>
                </div>
            </div>
             <a href="https://laureline-auger.fr/support-maintenance/" class="cta-button">J'ai besoin d'un support technique</a>
        </section>

    <!--------- Liste des projets ------------>
        <section id="portfolio" class="realisations">
            <h2>Réalisations</h2>
            <div class="realisations-block-container">
                    <?php
                    get_template_part('template_parts/bloc-realisations', null, array(
                        'post_type' => 'realisation',
                        'posts_per_page' => 6,             
                    ));
                    ?>
            </div>
        </section>   
    </div>
</main>

<?php get_footer(); ?>