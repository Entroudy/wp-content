<?php

function rts_register_plugins() {
    $plugins = [
        [
            'name' => 'Regenerate Thumbnails',
            'slug' => 'regenerate-thumbnails',
            'required' => false
        ],
        [
            'name' => 'RTS learning',
            'slug' => 'rtslearning',
            'required' => true,
            'source' => get_template_directory() . '/plugins/rtslearning.rar'
        ]
    ];
    $config = [
        'id' => 'rts',
        'menu' => 'tgmpa-install-plugins',
        'parent_slug' => 'themes.php',
        'capability' => 'edit_theme_options',
        'has_noticies' => true,
        'dismissable' => true
    ];
    tgmpa($plugins, $config);
}