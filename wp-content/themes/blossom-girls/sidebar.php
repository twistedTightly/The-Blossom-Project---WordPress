<?php
/**
* The Sidebar containing the main widget areas.
*
* @package BlossomGirls
* @since BlossomGirls 1.0
*/
?>
<?php // Will display on blog posts and Girl Talk page but NOT pages
if (is_page( 'Girl Talk' ) || is_single()) : ?>
    <div id="basic" class="widget-area alignright" role="complementary">
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'basic-sidebar' ) ) : ?>
 
        <aside id="archives" class="widget">
            <h1 class="widget-title"><?php _e( 'Archives', 'BlossomGirls' ); ?></h1>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
 
        <aside id="meta" class="widget">
            <h1 class="widget-title"><?php _e( 'Meta', 'BlossomGirls' ); ?></h1>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
 
    <?php endif; // end sidebar widget area ?>
    </div><!-- #basic .widget-area -->
<?php endif; ?>


<?php // The front page has a full sidebar and full main column widget section
if (is_front_page()) : ?>
    <div id="homepage" class="widget-area alignright" role="supplementary">
        <?php dynamic_sidebar( 'homepage-sidebar' ); ?>
    </div><!-- #homepage .widget-area -->

    <div id="main-column" class="widget-area alignleft" role="supplementary">
        <?php dynamic_sidebar( 'main-column-widget-area' ); ?>
    </div><!-- #main-column .widget-area -->
<?php endif; ?>


<?php // The Get Informed page has a special sidebar
if (is_page( 'Get Informed' )) : ?>
    <div id="tough-topics" class="widget-area alignleft" role="supplementary">
        <?php dynamic_sidebar( 'tough-topics-sidebar' ); ?>
    </div><!-- #tough-topics .widget-area -->
<?php endif; ?>