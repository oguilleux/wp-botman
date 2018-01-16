<?php
/**
 * Plugin Name: Wp botman
 * Plugin URI: https://github.com/e2info/wp-botman
 * Description: chatbot for WordPress powered by botman.
 * Author: E2info
 * Author URI: https://www.e2info.co.jp
 * Version: 0.1
 * Text Domain: chatbot
 *
 * WP Botman is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WP Botman is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Easy Digital Downloads. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     WPBotman
 * @author 		Haining Huang
 * @version		0.5
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

define("WPBOTMAN_PLUGIN_DIR", __file__);
define("WPBOTMAN_PLUGIN_BASE", dirname(__file__));
define("WPBOTMAN_PLUGIN_URL", plugin_dir_url(WPBOTMAN_PLUGIN_DIR));



define("WPBOTMAN_PLUGIN_JS_DIR", WPBOTMAN_PLUGIN_URL."assets/js/");
define("WPBOTMAN_PLUGIN_CSS_DIR", WPBOTMAN_PLUGIN_URL . "assets/css/");
define("WPBOTMAN_PLUGIN_INCLUDE_DIR", WPBOTMAN_PLUGIN_BASE . "/includes/");


include_once(WPBOTMAN_PLUGIN_INCLUDE_DIR . '/actions.php');
include_once(WPBOTMAN_PLUGIN_INCLUDE_DIR . '/template-functions.php');
include_once(WPBOTMAN_PLUGIN_INCLUDE_DIR . '/shortcodes.php');
include_once(WPBOTMAN_PLUGIN_INCLUDE_DIR . '/scripts.php');
require_once WPBOTMAN_PLUGIN_INCLUDE_DIR . '/admin/admin-pages.php';




?>
