<?php

function up_load_php_translations() {
    load_plugin_textdomain(
        "rtslearning",
        false,
        "rtslearning/languages"
    );
}