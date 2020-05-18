
<?php
/*
creador de plantilla
Author URI: http://www.prolam.cl/
Author: Eduardo Palma López
*/
// add_filter( 'theme_page_templates', 'galussothemes_add_templates' );
// function galussothemes_add_templates( $templates ) {
 
// 	$templates['template-ejemplo.php'] = __( 'Template ejemplo', 'text-domain' );
 
// 	return $templates;
 
// }

	
// add_filter( 'page_template', 'galussothemes_template_redirect' );
// function galussothemes_template_redirect( $template ) {
 
// 	$plugin_dir = dirname( __FILE__ );
 
// 	if ( is_page_template( 'template-ejemplo.php' ) ) {
 
// 		$template = $plugin_dir . 'includes/templates/template-ejemplo.php';
 
// 	}
 
// 	return $template;
 
// }



// add_filter( 'add', 'add_page_template' );

//Template fallback
add_action("template_redirect", 'my_theme_redirect');

function my_theme_redirect() {
    global $wp;
    $plugindir = dirname( __FILE__ );

    //A Specific Custom Post Type
    if ($wp->query_vars["post_type"] == 'landing') {
	   $templatefilename = 'single-landing.php';
	   
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/templates/' . $templatefilename;
        }
	   do_theme_redirect($return_template);
    }

}
function do_theme_redirect($url) {
	global $post, $wp_query;
	if (have_posts()) {
	    include($url);
	    die();
	} else {
	    $wp_query->is_404 = true;
	}
}