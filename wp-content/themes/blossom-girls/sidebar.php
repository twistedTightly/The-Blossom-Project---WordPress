<?php
/**
* The Sidebar containing the main widget areas.
*
* @package BlossomGirls
* @since BlossomGirls 1.0
*/
?>
<?php if (is_page( 'Get Informed' )) : ?>
    <div id="secondary" class="widget-area alignleft" role="complementary">
<?php else : ?>
    <div id="secondary" class="widget-area alignright" role="complementary">
<?php endif; ?>
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
 
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
</div><!-- #secondary .widget-area -->

<?php if (is_page( 'Get Informed' )) : ?>
    <div id="tertiary" class="widget-area alignright" role="supplementary">
<?php else : ?>
    <div id="tertiary" class="widget-area alignleft" role="supplementary">
<?php endif; ?>
     <?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- #tertiary .widget-area -->