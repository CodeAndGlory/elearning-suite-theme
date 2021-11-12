<button id="search-button" class="search-button" aria-controls="primary-search" aria-expanded="false">
    <span class="screen-reader-text">Search</span>
    <div class="search-icon-wrapper">
    <?php include( __DIR__ . '/search.svg' ); ?>
    </div>
</button>
<div id="primary-search" class="search-box" aria-expanded="false">
    <?php get_search_form(); ?>
</div>
