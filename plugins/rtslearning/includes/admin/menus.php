<?php

function up_admin_menus() {
    add_menu_page(
        __('RTS learning', 'rtslearning'),
        __('RTS learning', 'rtslearning'),
        'edit_theme_options',
        'up-plugin-options',
        'up_plugins_options_page',
        plugins_url('letter-u.svg', UP_PLUGIN_FILE)
    );

    add_submenu_page(
        'up-plugin-options',
        __('Alt RTS learning', 'rtslearning'),
        __('Alt RTS learning', 'rtslearning'),
        'edit_theme_options',
        'up-plugin-options-alt',
        'up_plugins_options_alt_page'
    );
}