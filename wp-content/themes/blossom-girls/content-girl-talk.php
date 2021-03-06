<?php
/**
 * @package BlossomGirls
 * @since BlossomGirls 1.0
 * Set up to correctly display the content of a post at the top of the Girl Talk page
 *  Typically, this post is the most recent post
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php // Entry meta info, like data posted, not shown since post is inside border box ?>
        <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail('full');
        } ?>

        <?php // Displays the title as a link to the post, if it has a title ?>
        <h1 class="entry-title section-header"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'BlossomGirls' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    </header><!-- .entry-header -->
 
    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <?php else : ?>
    <div class="entry-content">
        <?php the_content( __( '<br>READ MORE <span class="meta-nav">&gt;&gt;&gt;</span>', 'BlossomGirls' ) ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'BlossomGirls' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->

    <?php endif; ?>
 
    <footer class="entry-meta">
        <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( __( ', ', 'BlossomGirls' ) );
                if ( $categories_list && BlossomGirls_categorized_blog() ) :
            ?>
            <span class="cat-links">
                <?php printf( __( 'Posted in %1$s', 'BlossomGirls' ), $categories_list ); ?>
            </span>
            <?php endif; // End if categories ?>
 
            <?php
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list( '', __( ', ', 'BlossomGirls' ) );
                if ( $tags_list ) :
            ?>
            <span class="sep"> | </span>
            <span class="tag-links">
                <?php printf( __( 'Tagged %1$s', 'BlossomGirls' ), $tags_list ); ?>
            </span>
            <?php endif; // End if $tags_list ?>
        <?php endif; // End if 'post' == get_post_type() ?>
 
        <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
        <span class="sep"> | </span>
        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'BlossomGirls' ), __( '1 Comment', 'BlossomGirls' ), __( '% Comments', 'BlossomGirls' ) ); ?></span>
        <?php endif; ?>
 
        <?php edit_post_link( __( 'Edit', 'BlossomGirls' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->