<?php
/*
carga y registro de scripts para plantilla
Author URI: http://www.prolam.cl/
Author: Eduardo Palma López
*/

add_action( 'wp_head', 'ofertas_scripts' );
/**
 * Agrega plugin de jquery para visualizar la galeria con lightbox.
 *
 * @return void
 */

function ofertas_scripts() {

    if ( is_singular( 'landing' ) ) {

        wp_register_script(
            'carga-excel-script',
            PLUGIN_DIRECTORIO_URL . 'includes/assets/js/xlsx.full.min.js',
            null,
            PLUGIN_VERSION,
            true
        );
        wp_enqueue_script( 'carga-excel-script' );

        wp_register_script(
          'carga-moment-script',
          PLUGIN_DIRECTORIO_URL . 'includes/assets/js/moment-with-locales.min.js',
          null,
          PLUGIN_VERSION,
          true
      );
      wp_enqueue_script( 'carga-moment-script' );

      wp_register_script(
          'carga-template-ofertas',
          PLUGIN_DIRECTORIO_URL . 'includes/assets/js/template-ofertas.js',
          null,
          PLUGIN_VERSION,
          true
      );
      wp_enqueue_script( 'carga-template-ofertas' );

        wp_register_style(
            'carga-ofertas-css',
            PLUGIN_DIRECTORIO_URL . 'includes/assets/css/ofertas.css',
            null,
            PLUGIN_VERSION
        );
        wp_enqueue_style( 'carga-ofertas-css' );

     //    wp_register_style(
     //        'kfp-galeria-frontend-css',
     //        KFP_GALERIA_PLUGIN_URL . 'css/frontend.css',
     //        null,
     //        KFP_GALERIA_VERSION
     //    );
     //    wp_enqueue_style( 'kfp-galeria-frontend-css' );

    }
}