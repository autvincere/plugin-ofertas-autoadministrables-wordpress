<?php
/*
Plugin Name: Creador de ofertas administrables
Author URI: http://www.prolam.cl/
Description: Plugin para manejar plantillas de ofertas
Version: 1.0
Author: Eduardo Palma López
*/

/*
Creador de Plantilla asociado a Plugin
*/
// require_once('includes/create-template.php');

/*
Creador de Post-Type
*/
require_once('includes/create-ofertas-post-type.php');

/**
 * ADD METABOX
 *
 */

function add_custom_meta_boxes() {
 
     // Define the custom attachment for posts
       add_meta_box(
           'wp_custom_attachment',
           'Custom Attachment',
           'wp_custom_attachment',
           'landing', // $post
           'normal', // $context
           'high' // $priority
       );

   } // end add_custom_meta_boxes
   add_action('add_meta_boxes', 'add_custom_meta_boxes');

   function wp_custom_attachment() {
 
     wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');
      
     $html = '<p class="description">';
         $html .= 'Upload your PDF here.';
     $html .= '</p>';
     $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" value="" size="25" />';
      
     echo $html;
  
 } // end wp_custom_attachment

/**
 * Save custom attachment metabox info.
 */
function save_custom_meta_data($id) {
 
     /* --- security verification --- */
     if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
       return $id;
     } // end if
        
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
       return $id;
     } // end if
        
     if('page' == $_POST['post_type']) {
       if(!current_user_can('edit_page', $id)) {
         return $id;
       } // end if
     } else {
         if(!current_user_can('edit_page', $id)) {
             return $id;
         } // end if
     } // end if
     /* - end security verification - */
      
 } // end save_custom_meta_data
 add_action('save_post', 'save_custom_meta_data');

// /**
//  * Add functionality for file upload.
//  */
function update_edit_form() {
	echo ' enctype="multipart/form-data"';
}
add_action( 'post_edit_form_tag', 'update_edit_form' );


// /**
//  * Retrieve Data from Uploaded File
//  */
// $custom_attach = get_post_meta( $post->ID, 'wp_custom_attachment', true );
//      echo $custom_attach['url'];
  


/**
 * Add custom attachment metabox.
 */

// add_action('add_meta_boxes', 'add_product_meta');
// function add_product_meta()
// {
//     global $post;

//     if(!empty($post))
//     {
//      sftp://webmaster@10.230.220.11/home/uni20su8/html/wp-content/plugins/ofertas-administrables/includes/templates/template-ejemplo.php

//        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
//        $plugin_dir = '/wp-content/plugins/ofertas-administrables/includes/templates/template-ejemplo.php';

//         if(  $pageTemplate  == $plugin_dir )
//         {
//             add_meta_box(
//                 'product_meta', // $id
//                 'Product Information', // $title
//                 'display_product_information', // $callback
//                 'page', // $page
//                 'normal', // $context
//                 'high'); // $priority
//         }
//         else{
//           echo '<h1 style="text-align: center; color: red;">No llega a plugins<h2>';
//           echo "<script>console.log('Debug Objects: " . $plugin_dir . "' );</script>";
//         }
//     }
// }

/**
 * Custom attachment metabox markup.
 */
// function display_product_information()
// {
//      echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
// }

// add_action('add_meta_boxes', 'get_page_by_template');

// function get_page_by_template($template = '') {
//      $args = array(
//        'meta_key' => '_wp_page_template',
//        'meta_value' => $template
//      );
//      return get_pages($args); 
//    }


