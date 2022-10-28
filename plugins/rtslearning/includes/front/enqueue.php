<?php
/*
**wp_enqueue_scripts is the proper hook to use when enqueuing scripts and styles that are meant
**to appear on the front end. Despite the name, it is used for enqueuing both scripts and styles.
*/ 
function up_enqueue_scripts() {
    $authURLs = json_encode([
        'signup' => esc_url_raw(rest_url('up/v1/signup')) // esc_url_raw function biztonság kedvéért kell
    ,
        'signin' => esc_url_raw(rest_url('up/v1/signin')) // esc_url_raw function biztonság kedvéért kell
    ]
);

    wp_add_inline_script(
        'rtslearning-auth-modal-script',
        "const up_auth_rest = {$authURLs}",
        'before' // 'after'
    );

    wp_enqueue_style(
        'up_editor'
    );
}