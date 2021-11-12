<div class="page-navigation">
    <nav class="page-navigation-mobile dropdown" role="navigation" aria-label="topic navigation">
        <button class="dropdown-toggle" type="button" id="secondaryMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Select Topic
        </button>
        <ul class="dropdown-menu" aria-labelledby="secondaryMenuButton" role="menubar">
            <?php echo wpb_list_child_pages_menu(); ?>
        </ul>
    </nav>

    <div class="page-navigation-web" role="navigation" aria-label="topic navigation">
        <ul class="page-navigation-web-list" role="menubar">
            <?php echo wpb_list_child_pages_menu(); ?>
        </ul>
    </div>
</div>
