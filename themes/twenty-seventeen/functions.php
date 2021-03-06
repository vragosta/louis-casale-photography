<?php
/**
 * LouisCasale - Twenty Seventeen functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package LouisCasale - Twenty Seventeen
 * @since 0.1.0
 */

# Useful global constants.
define( 'LOUISCASALE_VERSION', '0.1.0' );
define( 'LOUISCASALE_TEMPLATE_URL', get_template_directory_uri() );
define( 'LOUISCASALE_PATH', get_template_directory() . '/' );
define( 'LOUISCASALE_INC', LOUISCASALE_PATH . 'includes/' );

# Include compartmentalized functions.
require_once LOUISCASALE_INC . 'functions/core.php';

# Include various metabox files.
require_once LOUISCASALE_INC . 'metaboxes/metabox-family.php';

# Run the setup functions.
LouisCasale\Functions\Core\setup();
