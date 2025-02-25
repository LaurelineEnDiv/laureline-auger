<footer>
    <nav class="footer-menu">
    <span class="site-info">© Laureline Auger 2025</span>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'footer-menu', 
                'menu_class'     => 'footer-menu', 
            ) );
        ?>
    </nav>
</footer>

<?php wp_footer(); ?>
</body>
</html>
