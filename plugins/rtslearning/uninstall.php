<?php

if(!defined("WP_UNINSTALL_PLUGIN")) {
    exit;
}

delete_option("up_options");

global $wpdb;

$wpdb->query(
    "DTOP TABLE IF EXISTS {$wpdb->prefix}recipe_ratings"
);