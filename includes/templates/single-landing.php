<?php
/**
 * @package WordPress
 * @subpackage Unimarc
 * @since Unimarc 1.0
 */

get_header(); 
?>
<h1>Esto es una plantilla de landing</h1>

     <?php 
          $custom_attach = get_post_meta( $post->ID, 'wp_custom_attachment', true );

          if($custom_attach) { ?>
               <main>
                    <div id="ofertas" class="content">
                         <div class="row">
                              <div class="col" id="col"></div>
                         </div>
                    </div>
               </main>
                    
          <?php }  ?>

          <script>
               const
                    url = '<?php echo $custom_attach['url'];?>';
                    console.log(url);
          </script>

<?php 
get_footer();
?>
