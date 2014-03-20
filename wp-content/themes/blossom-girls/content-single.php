<?php
/**
 * @package BlossomGirls
 * @since BlossomGirls 1.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="entry-meta post-title-bar">
            <span class="bar"></span>
            <?php BlossomGirls_posted_on(); ?>
            <span class="bar"></span>
        </div><!-- .entry-meta -->

        <!-- Find a way to load an associated image here first -->
        <h1 class="entry-title section-header"><?php the_title(); ?></h1>

    </header><!-- .entry-header -->
 
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'BlossomGirls' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
 
    <footer class="entry-meta">
        <?php
            /* translators: used between list items, there is a space after the comma */
            $category_list = get_the_category_list( __( ', ', 'BlossomGirls' ) );
 
            /* translators: used between list items, there is a space after the comma */
            $tag_list = get_the_tag_list( '', ', ' );
 
            if ( ! BlossomGirls_categorized_blog() ) {
                // This blog only has 1 category so we just need to worry about tags in the meta text
                if ( '' != $tag_list ) {
                    $meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BlossomGirls' );
                } else {
                    $meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BlossomGirls' );
                }
 
            } else {
                // But this blog has loads of categories so we should probably display them here
                if ( '' != $tag_list ) {
                    $meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BlossomGirls' );
                } else {
                    $meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BlossomGirls' );
                }
 
            } // end check for categories on this blog
 
            printf(
                $meta_text,
                $category_list,
                $tag_list,
                get_permalink(),
                the_title_attribute( 'echo=0' )
            );
        ?>
 
        <?php edit_post_link( __( 'Edit', 'BlossomGirls' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->