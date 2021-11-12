jQuery(document).ready(function ($) {

    var $main_nav = $('#site-navigation');
    var $main_menu_expander_btn = $('#primary-menu .expander');
    var $primary_menu = $('#primary-menu');
    var $menu_btn = $('#menu-toggle');
    var $search_btn = $("#search-button");
    var $search_box = $("#primary-search");

    // toggle behavior for the mobile menu button
    $menu_btn.on('click', function () {
        $this = $(this);
        $this.toggleClass('toggled');

        if ($this.hasClass('toggled')) {
            showMobileMenu();
            if ($search_btn.hasClass("toggled")) {
                hideSearch();
            }
        } else {
            hideMobileMenu();
        }
    });

    $main_menu_expander_btn.on('click', function() {
        $this = $(this);
        $this.toggleClass('toggled');

        if ($this.hasClass('toggled')) {
            showChildrenMenu($this);
        } else {
            hideChildrenMenu($this);
        }
    });

    function showChildrenMenu($expander_button) {
        $expander_button.addClass('toggled');
        $parent_li = $expander_button.parent();
        $parent_li.addClass('toggled');
        $parent_li.children('ul').attr('aria-expanded', true);
        $expander_button.find('.icon-chevron-down').addClass('flipped')
    }

    function hideChildrenMenu($expander_button) {
        $expander_button.removeClass('toggled');
        $parent_li = $expander_button.parent();
        $parent_li.removeClass('toggled');
        $parent_li.children('ul').attr('aria-expanded', false);
        $expander_button.find('.icon-chevron-down').removeClass('flipped')
    }

    function showMobileMenu() {
        $main_nav.addClass('toggled');
        $primary_menu.attr('aria-expanded', true);
        $menu_btn.attr('aria-expanded', true);
    }

    function hideMobileMenu() {
        $main_nav.removeClass('toggled');
        $primary_menu.attr('aria-expanded', false);
        $menu_btn.attr('aria-expanded', false);
    }

    function hideSearch() {
        $search_btn.removeClass("toggled");
        $search_btn.attr("aria-expanded", false);
        $search_box.attr("aria-expanded", false);
        $search_box.hide();
    }
});
