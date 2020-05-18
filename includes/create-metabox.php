<?php
/*
creador de metabox
Author URI: http://www.prolam.cl/
Author: Eduardo Palma López
*/

/**
 * ADD METABOX
 *
 */

function add_custom_meta_boxes() {
 
     // Define the custom attachment for posts
       add_meta_box(
           'wp_custom_attachment',
           'Custom Attachment',
           'ga_diseno_metaboxes',
           'landing', // $post
           'normal', // $context
           'high' // $priority
       );

   } // end add_custom_meta_boxes
   add_action('add_meta_boxes', 'add_custom_meta_boxes');

   function ga_diseno_metaboxes($post) {

     wp_nonce_field(plugin_basename(__FILE__), 'meta-box-nonce');
     $html = '<p class="description">Upload your PDF here.</p>';
     $html .= '<input id="wp_custom_attachment" name="wp_custom_attachment" size="25" type="file" value="" />';
     $filearray = get_post_meta( get_the_ID(), 'wp_custom_attachment', true );
     $this_file = $filearray['url'];
     
     if ( $this_file != '' ) { 
	     $html .= '<div><p>Current file: ' . $this_file . '</p></div>'; 
     }
     
     echo $html; 
     
     ?>
     <div>
          <label for="input-metabox">input Simple:</label>
          <input name="input-metabox" type="text" value="<?php echo get_post_meta($post->ID, "input-metabox", true); ?>"/>
     </div>

   <?php
 } 

 /**
 * Save custom attachment metabox info.
 */
function ga_guardar_metaboxes($post_id, $post, $update){
     if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], plugin_basename(__FILE__)))
     return $post_id;

     if(!current_user_can("edit_post", $post_id))
          return $post_id;

     if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
          return $post_id;

     $input_metabox = "";
     $wp_custom_attachment = "";

     if(isset($_POST["input-metabox"])) {
          $input_metabox = $_POST["input-metabox"];
     }
     update_post_meta($post_id, "input-metabox", $input_metabox);

     // if(isset($_POST["wp_custom_attachment"])) {
     //      $wp_custom_attachment = $_POST["wp_custom_attachment"];
     // }
     // update_post_meta($post_id, "wp_custom_attachment", $wp_custom_attachment);

     if ( ! empty( $_FILES['wp_custom_attachment']['name'] ) ) {
          
		$arr_file_type = wp_check_filetype( basename( $_FILES['wp_custom_attachment']['name'] ) );
		$uploaded_type = $arr_file_type['type'];

		if ( isset( $uploaded_type ) ) {
			$upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));
			if ( isset( $upload['error'] ) && $upload['error'] != 0 ) {
				wp_die( 'There was an error uploading your file. The error is: ' . $upload['error'] );
			} else {
				add_post_meta( $post_id, 'wp_custom_attachment', $upload );
				update_post_meta( $post_id, 'wp_custom_attachment', $upload );
			}
		}
		else {
			wp_die( "The file type that you've uploaded is not a PDF." );
		}
	}
}

add_action('save_post', 'ga_guardar_metaboxes', 10, 3);

// /**
//  * Add functionality for file upload.
//  */
function update_edit_form() {
	echo ' enctype="multipart/form-data"';
}
add_action( 'post_edit_form_tag', 'update_edit_form' );