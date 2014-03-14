<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package BlossomGirls
 * @since BlossomGirls 1.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (is_page( array('Connect', 'Shop', 'Donate', 'Get Informed') )) : ?>
		<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>
    </header><!-- .entry-header -->
 
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'BlossomGirls' ), 'after' => '</div>' ) ); ?>
        <?php edit_post_link( __( 'Edit', 'BlossomGirls' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->