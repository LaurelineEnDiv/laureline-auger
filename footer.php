<footer>
    <nav class="footer-menu">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'footer-menu', 
                'menu_class'     => 'footer-menu', 
            ) );
        ?>
        <li class="site-info">
            © Laureline Auger 2025 - Tous droits réservés
        </li>
    </nav>
</footer>

<?php wp_footer(); ?>
</body>
</html>
