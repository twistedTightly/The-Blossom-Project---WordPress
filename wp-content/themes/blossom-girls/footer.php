<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
* 
*       <!--a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'BlossomGirls' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'BlossomGirls' ), 'WordPress' ); ?></a>
*       <span class="sep"> | </span-->
*
* @package BlossomGirls
* @since BlossomGirls 1.0
*/
?>
 
</div><!-- #main .site-main -->
 
<footer id="colophon" class="site-footer" role="contentinfo">
	<nav role="navigation" class="site-navigation footer-navigation">
        <h1 class="assistive-text"><?php _e( 'Menu', 'BlossomGirls' ); ?></h1>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav><!-- .site-navigation .main-navigation -->

    <div class="site-info">
        <?php do_action( 'BlossomGirls_credits' ); ?>
        <?php printf( __( '&copy; 2014 %1$s', 'Blossom Girls' ), 'Blossom Girls Inc.'); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->
 
<?php wp_footer(); ?>
 
</body>
</html>