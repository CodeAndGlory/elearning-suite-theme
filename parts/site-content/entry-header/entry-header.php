<header class="entry-header">
    <?php
    if ( is_single() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
    else :
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif;

    if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php uncgonline_posted_on(); ?>
        </div><!-- .entry-meta -->
    <?php
    endif; ?>
</header><!-- .entry-header -->
