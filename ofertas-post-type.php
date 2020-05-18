<?php
/*
Plugin Name: Creador de ofertas administrables
Author URI: http://www.prolam.cl/
Description: Plugin para manejar plantillas de ofertas
Version: 1.0
Author: Eduardo Palma López
*/
defined( 'ABSPATH' ) || die();
define( 'PLUGIN_DIRECTORIO', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_VERSION', '1.0' );
define( 'PLUGIN_DIRECTORIO_URL', plugin_dir_url( __FILE__ ) );
/*
Creador de Post-Type
*/
require_once('includes/create-ofertas-post-type.php');

/*
Creador de Metabox
*/
require_once('includes/create-metabox.php');

/*
Carga y registro de scripts
*/
require_once('includes/load-and-register-scripts.php');

/*
Creador de Plantilla asociado a Plugin
*/
require_once('includes/create-template.php');


