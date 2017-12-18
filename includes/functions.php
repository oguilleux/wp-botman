<?php
function wpbotman_init() {
}

function wpbotman_scripts() {
}

function wpbotman_admin_menu() {
  add_options_page(__('WPBotman', 'WP Botman'), __('WPBotman', 'WP Botman'), 'manage_options', 'wpbotman_info', 'wpbotman_option_page');
}

function wpbotman_option_page() {
}