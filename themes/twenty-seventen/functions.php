<?php
/**
 * Louis Casale Photography - Twenty Seventeen functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

# Useful global constants.
define( 'LOUIS_CASALE_PHOTOGRAPHY_VERSION', '0.1.0' );
define( 'LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL', get_template_directory_uri() );
define( 'LOUIS_CASALE_PHOTOGRAPHY_PATH', get_template_directory() . '/' );
define( 'LOUIS_CASALE_PHOTOGRAPHY_INC', LOUIS_CASALE_PHOTOGRAPHY_PATH . 'includes/' );

# Include compartmentalized functions.
require_once LOUIS_CASALE_PHOTOGRAPHY_INC . 'functions/core.php';

# Include helpers functions.
require_once LOUIS_CASALE_PHOTOGRAPHY_INC . 'functions/helpers.php';

# Include various metabox files.
require_once LOUIS_CASALE_PHOTOGRAPHY_INC . 'metaboxes/metabox-family.php';

# Run the setup functions.
LouisCasalePhotography\TwentySeventeen\Core\setup();
