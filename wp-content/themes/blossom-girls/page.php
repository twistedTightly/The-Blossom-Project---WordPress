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
        <?php elseif (is_page( array('About Us', 'Connect', 'Shop', 'Donate', 'Coming Soon') )) : ?>
            <div id="primary" class="content-area">
        <?php else : ?>
            <div id="primary" class="content-area alignleft">
        <?php endif; ?>
        <!--div id="primary" class="content-area"-->
            <div id="content" class="site-content" role="main">

                <?php if ( is_page('Girl Talk') ) : // For Girl Talk... ?>

                    <?php $girl_talk_posts = new WP_Query('cat=girl-talk'); // Query for all posts written in that category ?>
                    <?php if ( $girl_talk_posts->have_posts() ) : ?>

                        <?php /* Start the Loop */ ?> 
                        <?php $loopcounter = 0; // Initialize counter to find first post ?>
                        <?php while ( $girl_talk_posts->have_posts() ) : $girl_talk_posts->the_post(); ?>
                            <?php
                                /* Include the Post-Format-specific template for the content.
                                * If you want to overload this in a child theme then include a file
                                * called content-___.php (where ___ is the Post Format name) and    that will be used instead.
                                */ ?>
                                <?php $loopcounter++; ?>
                                <?php if ( $loopcounter== 1 ) : ?>

                                    <div id="girl-talk-first-post">
                                        <?php get_template_part( 'content', 'girl-talk' ); // Specific template for most recent Girl Talk post when on Girl Talk page itself ?>
                                    </div>

                                    <?php while ( have_posts() ) : the_post(); // Get 'Girl Talk' page content, skipping most recent 'Girl Talk' post ?>
                                        <?php get_template_part( 'content', 'page' ); // Their regular content is shown instead ?>
                                    <?php endwhile; // end of the loop. ?>

                                <?php else : ?>

                                    <?php get_template_part( 'content', get_post_format() ); // Get posts in 'Girl Talk' category ?>

                                <?php endif; ?>

                        <?php endwhile; ?>
                        
                        <?php BlossomGirls_content_nav( 'nav-below' ); ?>
                    <?php else : ?>
                        <?php get_template_part( 'no-results', 'index' ); ?>
                    <?php endif; ?>

                <?php else: ?>

                    <?php while ( have_posts() ) : the_post(); // All other pages are not treated like blogs ?>

                        <?php get_template_part( 'content', 'page' ); // Their regular content is shown instead ?>
     
                        <?php if (is_page( array('About Us','Connect','Girl Talk', 'Get Informed', 'Shop', 'Donate', 'Home', 'Coming Soon') )) : ?>
                        <?php else : ?>
                            <?php comments_template( '', true ); ?>
                        <?php endif; ?>
 
                    <?php endwhile; // end of the loop. ?>

                <?php endif; ?>
                
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->
 

<?php if (is_page( array('About Us', 'Connect', 'Shop', 'Donate', 'Coming Soon') )) : ?>
<?php else : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>