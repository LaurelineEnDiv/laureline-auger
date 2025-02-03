<?php

$formations = [
    [
        'titre' => 'Développeur Wordpress',
        'date' => '2025',
        'competences' => 'HTML/CSS, Sass, PHP, Javascript, optimisation des performances, recettage, spécifications fonctionneles',
        'lieu' => 'OpenClassrooms, formation à distance',
    ],
    [
        'titre' => 'Développeur/Intégrateur Web',
        'date' => '2023',
        'competences' => 'HTML/CSS, Javascript, React/Node.js',
        'lieu' => '3WAcademy, Nantes',
    ],
    [
        'titre' => 'Professeur Hatha Yoga (TTC)',
        'date' => '2022',
        'lieu' => 'Ashram Sivananda, France',
    ],
    [
        'titre' => 'Licence Pro Webmaster',
        'date' => '2017',
        'competences' => 'HTML/CSS, PhP/MySQL, Webmarketing, Gestion de projet web',
        'lieu' => 'Université de Caen',
    ],
    [
        'titre' => 'Formation professionnelle Chef de Projet Multimédia',
        'date' => '2013',
        'lieu' => 'CIFAP, IESA Multimedia, Paris',
    ],
    
    [
        'titre' => 'Master Lettres Modernes Appliquées - Audiovisuel',
        'date' => '2008',
        'lieu' => 'Sorbonne, Paris 4',
    ],
    [
        'titre' => 'Licence Arts du Spectacle - Cinéma',
        'date' => '2004',
        'lieu' => 'Université de Caen',
    ],
    [
        'titre' => 'Licence Lettres Modernes',
        'date' => '2003',
        'lieu' => 'Université de Caen',
    ],
];

$experiences = [
    [
        'titre' => 'Responsable SEO/SEA',
        'date' => '2018-2022',
        'competences' => 'Développement des stratégies de médiatisation digitale, conseil clients et
        préconisations en référencement naturel (SEO) et payant (SEA). Analyse et suivi du trafic des sites Web.',
        'lieu' => 'The Links, Agence de communication, Nantes',
    ],
    [
        'titre' => 'Responsable Webmarketing',
        'date' => '2017-2018',
        'competences' => 'Déploiement des stratégies de référencement naturel (SEO) et payant (SEA). Rédaction de contenus SEO. Emailing : Création et gestion de newsletters.',
        'lieu' => 'CINS, Agence Web, Caen',
    ],
    [
        'titre' => 'Chargée de communication & RP',
        'date' => '2015-2016',
        'competences' => 'Développement des stratégies de communication. Création de contenus Print & Web, gestion du site Web et des Réseaux Sociaux.
        Rencontres Internationales du Documentaire de Montréal : Coordination conférences & projections presse. Rédaction pitchs films, CP. Réseaux Sociaux.',
        'lieu' => 'Cinéma Excentris - Festival Documentaire RIDM, Montréal, Canada',
    ],
    [
        'titre' => 'Chargée de communication digitale',
        'date' => '2014',
        'competences' => 'Gestion de la plateforme Web, Newsletter & Réseaux Sociaux. Refonte du site web (arborescence et contenus).',
        'lieu' => 'Teatricus, Réseau professionnel du spectacle, Montréal, Canada',
    ],
    [
        'titre' => 'Journaliste-Rédactice',
        'date' => '2008-2013',
        'competences' => 'Chargée de la rubrique Cinéma Box Office. Rédaction d articles, dossiers et interviews Ciné et TV.',
        'lieu' => 'Ecran Total, Paris',
    ],
   
];
?>

<div class="columns-container">
    <div class="formations">
        <h2>Formation</h2>
        <?php foreach ($formations as $formation): ?>
            <div class="formation">
                <h3><?php echo esc_html($formation['titre']); ?></h3>
                <p class="date"><?php echo esc_html($formation['date']); ?></p>
                <?php if (!empty($formation['competences'])): ?>
                    <p class="competences"><?php echo esc_html($formation['competences']); ?></p>
                <?php endif; ?>
                <p class="lieu"><?php echo esc_html($formation['lieu']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="experiences">
        <h2>Expériences</h2>
        <?php foreach ($experiences as $experience): ?>
            <div class="experience">
                <h3><?php echo esc_html($experience['titre']); ?></h3>
                <p class="date"><?php echo esc_html($experience['date']); ?></p>
                <p class="competences"><?php echo esc_html($experience['competences']); ?></p>
                <p class="lieu"><?php echo esc_html($experience['lieu']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
