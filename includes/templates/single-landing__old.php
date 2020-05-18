<?php
/**
 * @package WordPress
 * @subpackage Unimarc
 * @since Unimarc 1.0
 */

get_header(); ?>
<h1>Esto es una plantilla de landing</h1>
     <div style="background-color: white;">
     <?php 
          // $input =  get_post_meta( get_the_ID(), 'input-metabox', true ); 
          $custom_attach = get_post_meta( $post->ID, 'wp_custom_attachment', true );

          // if($input) { ?>
                    <!-- <div class="calorias">
                         <h2>input: <b><?php echo $input; ?></h2>
                    </div> -->
                    
          <?php 
          // } 
          
          if($custom_attach) { ?>
                    <div class="calorias">
                         <h2>Url: <b><?php echo $custom_attach['url']; ?></h2>
                    </div>
                    
          <?php }  ?>

          <script>

          const
          url = '<?php echo $custom_attach['url'];?>'
          console.log(url)

          </script>
          
     </div>


<?php 
get_footer();
?>
