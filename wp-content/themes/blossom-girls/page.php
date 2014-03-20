<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package BlossomGirls
 * @since BlossomGirls 1.0
 */
 
get_header(); ?>
        <?php if (is_page( 'Get Informed' )) : ?>
            <div id="primary" class="content-area alignright">
        <?php elseif (is_page( array('About Us', 'Connect', 'Shop', 'Donate') )) : ?>
            <div id="primary" class="content-area">
        <?php else : ?>
            <div id="primary" class="content-area alignleft">
        <?php endif; ?>
        <!--div id="primary" class="content-area"-->
            <div id="content" class="site-content" role="main">
 
                <?php while ( have_posts() ) : the_post(); ?>
 
                    <?php get_template_part( 'content', 'page' ); ?>
 
 					<?php if (is_page( array('About Us','Connect','Girl Talk', 'Get Informed', 'Shop', 'Donate', 'Home') )) : ?>
					<?php else : ?>
                    	<?php comments_template( '', true ); ?>
					<?php endif; ?>
 
                <?php endwhile; // end of the loop. ?>
 
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->
 

<?php if (is_page( array('About Us', 'Connect', 'Shop', 'Donate') )) : ?>
<?php else : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>