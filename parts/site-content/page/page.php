<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uncgonline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if( !is_front_page() ): ?>
    <div class="entry-header-wrapper">
        <header class="entry-header">
            <?php if(get_field('unitmodule_icon', get_top_ancestor())): ?>
            <div class="unit-icon <?php the_field('unitmodule_icon') ?>">
                <?php include (get_stylesheet_directory() . "/assets/images/" . get_field('unitmodule_icon', get_top_ancestor()) . ".svg"); ?>
            </div>
            <?php endif; ?>
            <div class="entry-title"><?php echo get_the_title(get_top_ancestor()); ?></div>
        </header><!-- .entry-header -->
    </div>
    <?php endif; ?>

    <?php if( is_front_page() ): ?>

        <div class="course-intro-start">
            <div class="thumbnail-wrapper">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="blog-description-wrapper">
                <div>
                    <h1 class="blog-description"><?php echo get_bloginfo('description'); ?></h1>
                    <?php the_field('intro_course_description'); ?>
                </div>
            </div>
        </div>

        <div class="unit-links-wrapper">
        <?php if(get_field('uniticons_description')): ?>
            <div class="home-unit-description">
                <?php the_field('uniticons_description'); ?>
            </div>
        <?php endif; ?>

        <?php
        $args = array(
            'post_type' => 'page',
            'post_parent' => 0,
            'orderby' => 'menu_order title',
            'order'   => 'ASC',
            'posts_per_page' => 100,
            'post__not_in' => array(get_the_ID()) // exclude front page
        );

        $my_query = new WP_Query( $args );

        if ( $my_query->have_posts() ): ?>

                <div class="home-unit-links">
                    <?php
                    while ( $my_query->have_posts() ): $my_query->the_post(); ?>
                        <?php // var_dump($my_query); ?>
                        <a class="unit-link" href="<?php echo get_permalink(); ?>">
                            <div class="unit-icon <?php the_field('unitmodule_icon') ?>">
                                <?php include (get_stylesheet_directory() . "/assets/images/" . get_field('unitmodule_icon', get_top_ancestor()) . ".svg"); ?>
                            </div>
                            <div class="unit-title">
                                <?php echo get_the_title() ?>
                            </div>
                        </a>
                    <?php
                    endwhile;
                    ?>
                </div>

        <?php endif; ?>

        <?php
        // Reset the `$post` data to the current post in main query.
        wp_reset_postdata();

        ?>
        </div>
    <?php endif; ?>

    <?php
    if ( get_current_page_depth() === 2 ) {
        include( __DIR__ . '/page-menu/page-menu.php' );
    }
    ?>

    <div class="entry-content">
        <?php if( !is_front_page() ): ?>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php endif; ?>

        <?php

        the_content();

        do_action( 'spartan_pagination' );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uncgonline' ),
            'after' => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                /* translators: %s: Name of current post */
                    esc_html__( 'Edit %s', 'uncgonline' ),
                    the_title( '<span class="screen-reader-text">', '</span>', false )
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-## -->
