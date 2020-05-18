<?php 
	
//NAVEGACIÓN SECUNDARIA
$args = array(
  'sort_column' => 'menu_order',
  'child_of' => 99
);

$pages = get_pages($args);

$params = array(
  'categorize' => 0,
  'title_li' => 0,
  'category_name' => 'header',
  'echo' => false
  
);

$links = get_bookmarks($params);

$params = array(
  'categorize' => 0,
  'title_li' => 0,
  'category_name' => 'main',
  'echo' => false,
  'orderby' => 'rating',
  'order' => 'ASC'
);
$primarios = get_bookmarks($params);

global $fechaLimite, $fechaInicio;
$fechaInicio = 20151217204000;  //Fecha de Inicio Red Friday
$fechaLimite = 20151220210000; //Fecha Oficial 20151220210000

$fechaActual = get_fecha_actual();
$horaActual = get_hora_actual();

$parametroBusca = ""; //"Red Friday";
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta charset='<?php bloginfo( 'charset' ); ?>'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
  <style>
    @font-face {
        font-family: 'clarendon_cn_btbold';
        src: url('<?php echo get_stylesheet_directory_uri() ?>/fontface/fonts/clarendon_cn_bt-webfont.eot');
        src: url('<?php echo get_stylesheet_directory_uri() ?>/fontface/fonts/clarendon_cn_bt-webfont.eot?#iefix') format('embedded-opentype'),
            url('<?php echo get_stylesheet_directory_uri() ?>/fontface/fonts/clarendon_cn_bt-webfont.woff') format('woff'),
            url('<?php echo get_stylesheet_directory_uri() ?>/fontface/fonts/clarendon_cn_bt-webfont.ttf') format('truetype'),
            url('<?php echo get_stylesheet_directory_uri() ?>/fontface/fonts/clarendon_cn_bt-webfont.svg#clarendon_cn_btbold') format('svg');
        font-weight: normal;
        font-style: normal;

    }
    </style>
    
      <link href='<?php echo get_stylesheet_directory_uri() ?>/flick/jquery.ui.min.css' rel='stylesheet' type='text/css'>
<!--     <link href='<?php echo get_stylesheet_directory_uri() ?>/fancybox/jquery.fancybox-1.3.4.css' rel="stylesheet" type="text/css" /> -->
    <link href='<?php echo get_stylesheet_directory_uri() ?>/colorbox.css' rel="stylesheet" type="text/css" />
	<link href='<?php echo get_stylesheet_directory_uri() ?>/simplegrid.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/flexslider/flexslider.css' rel='stylesheet' type='text/css'>
    <link href='<?php echo get_stylesheet_uri(); ?>' rel="stylesheet" type="text/css" />
    <link href='<?php echo get_stylesheet_directory_uri() ?>/img/favicon.png' rel='shortcut icon'>
		
    <!--[if lt IE 9]>
    <script src='<?php echo get_stylesheet_directory_uri() ?>/js/html5.js'></script>
    <![endif]-->
    <style>
      
      #sidebar {width:200px; padding:0px; background: #eee; height:250px; position:absolute; right:0; top:0;}
      #portamento_container {position:absolute; right:0; top:0;} /* take the absolute positioning of the sidebar */
      #portamento_container #sidebar {}
      #portamento_container #sidebar.fixed {position:fixed; right:0; top:0;} /* become fixed position, but reset the top and right values */
      </style>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
      <script>
        window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')
      </script>
    <script src='<?php echo get_stylesheet_directory_uri() ?>/js/jquery.ui.min.js'></script>
    <script src='<?php echo get_stylesheet_directory_uri() ?>/flexslider/jquery.flexslider.js'></script>

    <!-- Start Alexa Certify Javascript -->
  <script type="text/javascript">
  _atrk_opts = { atrk_acct:"BjjPj1a8wt00yI", domain:"unimarc.cl",dynamic: true};
  (function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
  </script>
  <noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=BjjPj1a8wt00yI" style="display:none" height="1" width="1" alt="" /></noscript>
  <!-- End Alexa Certify Javascript -->  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <?php
	
?>

<?php query_posts('post_type=fondo_programable&showposts=1'); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<?php 
			$fechaInicio = get('detalles_fondo_fecha_inicio');
			$fechaTermino = get('detalles_fondo_fecha_termino');
			$imgFondo = get('detalles_fondo_imagen'); 
		?>
		
		<?php endwhile; ?>
	<?php endif; ?>
<?php wp_reset_query(); ?>  

  <title>header single</title>
</head>
<?php
	
?>

<?php query_posts('post_type=fondo_programable&showposts=1'); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<?php 
			$fechaInicio = get('detalles_fondo_fecha_inicio');
			$fechaTermino = get('detalles_fondo_fecha_termino');
			$imgFondo = get('detalles_fondo_imagen'); 
		?>
		
		<?php endwhile; ?>
	<?php endif; ?>
<?php wp_reset_query(); ?>  
<body <?php mostrarBackground($fechaInicio, $fechaTermino, $imgFondo); ?>>
  <div id='root'>
    <div id="rvfs-controllers">
      <div class="btn-group">
        <a href="#" class="rvfs-decrease btn" data-size="min" title="Decrease font size" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', 'A-']);">A-</a>
        <a href="#" class="rvfs-reset btn disabled" data-size="med" title="Default font size" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', 'A']);">A</a>
        <a href="#" class="rvfs-increase btn" data-size="max" title="Increase font size" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', 'A+']);">A+</a>
      </div>
    </div>
    
    <div id="mobile-header">

      <div class="tog-menu">
      <a href="" class="toggle-menu"><span></span> <p class="toggle-label">Menu</p></a>
      </div>
      
      <!--<a href="#" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', 'menu']);" style="width: 70px; height: 40px;left: 4px; position: absolute;">
        <img class="toggle-menu" src="<?php //echo get_stylesheet_directory_uri() ?>/img/mobile/menu.png" />
        <span class="toggle-label">Menu</span>
      </a>-->
      
      <a href="<?php bloginfo( 'url' ); ?>" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', 'logo']);">
        <img class="logo" src="<?php echo get_stylesheet_directory_uri() ?>/img/mobile/logo.png" />
      </a>
      
      <a href="/contacto/" class="contact-menu" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', 'contacto ']);">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/mobile/contact.png" />
        <span class="contact-label">Contacto</span>
      </a>
    </div>
    
    <div class="hidden-menu">
    <nav class="mobile-menu">
      
      <div class="seccion primarios">
        
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', 'Home']);">Home</a>
        
        <?php foreach ($primarios as $primario) : 
        if($fechaActual.$horaActual >= $fechaLimite  && $primario->link_name == $parametroBusca) : 
          $link_url = str_replace("ofertas-red-friday", "ofertasimpacto", $primario->link_url);
        ?>
              <a href='<?php echo $link_url; ?>' target="<?php echo $primario->link_target; ?>" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', '<?=$primario->link_target?>']);" ><?php echo " Ofertas Impacto"; ?></a>
        
        <?php else :  ?>
        
        <a href='<?php echo $primario->link_url; ?>' target="<?php echo $primario->link_target; ?>" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', '<?=$primario->link_target?>']);" ><?php echo $primario->link_name; ?></a>
        <?php endif;  ?>
        <?php endforeach; ?>
      </div>
      
      <div class="seccion secundarios">
        <?php foreach ($pages as $page) : ?>
            <a href='<?php echo esc_url( home_url( '/' . $page->post_name ) ); ?>' onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', '<?=$page->post_name?>']);" ><?php echo $page->post_title; ?></a>
          <?php endforeach; ?>
          
          <?php foreach ($links as $link) : 
          if($fechaActual.$horaActual >= $fechaLimite  && $primario->link_name == $parametroBusca) : 
          $link_url = str_replace("ofertas-red-friday", "ofertasimpacto", $primario->link_url);
        ?>
              <a href='<?php echo $link_url; ?>' target="<?php echo $primario->link_target; ?>" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', '<?=$primario->link_target?>']);" ><?php echo " Ofertas Impacto"; ?></a>
        
        <?php else :  ?>
            <a href='<?php echo $link->link_url; ?>' title="<?php echo $link->link_description; ?>" target="<?php echo $link->link_target; ?>" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', '<?=$link->link_url?>']);"><?php echo $link->link_name; ?></a>
          <?php 
	          endif;
	          endforeach; ?>
      </div>
      
      <div class="seccion contacto">
        
        <div class="item twitter">
          <a href="http://twitter.com/<?php echo kc_get_option( 'uni_', 'rrss', 'twitter_ayuda' ); ?>" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', 'twitter']);" >
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/mobile/menu_twitter.png" />
          </a>
        </div>
        
        <div class="item telefono">
          <a href="tel:<?php echo kc_get_option( 'uni_', 'offline', 'fono' ); ?>" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', 'telefono']);">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/mobile/menu_servicio.png" />
          </a>
        </div>
        
      </div>
      
      <div class="seccion externos">
        <ul>
          <?php
          $params = array(
            'categorize' => 0,
            'title_li' => 0,
            'category_name' => 'footer'
          );
          
          wp_list_bookmarks($params);
          
          ?>
        </ul>
      </div>
    </nav>
    </div>

    <header id='header'>
      <nav class='topnav'>
        <span class='group'>
          <?php foreach ($pages as $page) : ?>
            <a href='<?php echo esc_url( home_url( '/' . $page->post_name ) ); ?>' onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', '<?=$page->post_title;?>']);"><?php echo $page->post_title; ?></a>
          <?php endforeach; ?>
          
          <?php foreach ($links as $link) :
	         
	         if($fechaActual.$horaActual >= $fechaLimite  && $primario->link_name == $parametroBusca) : 
          $link_url = str_replace("ofertas-red-friday", "ofertasimpacto", $primario->link_url);
        ?>
              <a href='<?php echo $link_url; ?>' target="<?php echo $primario->link_target; ?>" onclick="_gaq.push(['bond._trackEvent','HEADER MOBILE', 'click boton', '<?=$primario->link_target?>']);" ><?php echo " Ofertas Impacto"; ?></a>
        
        <?php else :  ?>
	         
	           
            <a href='<?php echo $link->link_url; ?>' title="<?php echo $link->link_description; ?>" target="<?php echo $link->link_target; ?>" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', '<?=$link->link_name?>']);"><?php echo $link->link_name; ?></a>
          <?php 
	          endif;
	          endforeach; ?>
          
        </span>

          <span class='ico-serv_top ico'></span>
<a class='servicio' style="color: white;" href="https://www.unimarc.cl/servicio-al-cliente/">Servicio al Cliente 600 600 0025</a>
        </span><a class='ico ico-fb_19' href='<?php echo kc_get_option( 'uni_', 'rrss', 'facebook' ); ?>' target="_blank" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', 'facebook']);" ></a>
        <a class='ico ico-tw_19' href='<?php echo kc_get_option( 'uni_', 'rrss', 'twitter' ); ?>' target="_blank" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', 'twitter']);"></a>
        <a class='ico ico-yt_19' href='<?php echo kc_get_option( 'uni_', 'rrss', 'youtube' ); ?>' target="_blank" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', 'youtube']);"></a>
        <a class='ico ico-sp_19' href='<?php echo kc_get_option( 'uni_', 'rrss', 'spotify' ); ?>' target="_blank" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', 'spotify']);" ></a>
<a href='https://www.instagram.com/unimarc/' target="_blank" >

<i class="fa fa-instagram" style="font-size: 21px;/* width:  20px; *//* height:  20px; */position: relative;color: white;top: 2px;"></i>
</a>
        </nav>
      <div class='mainnav'>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', 'logo']);">
          <h1 class='logo notext ico ico-unimarc_header'>Unimarc</h1>
        </a>
        <nav class='primary'>
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', 'home']);">Home</a>
  <!-- <a href='http://www.buenosdeseos.cl'>Teletón</a> -->
         <!--   <span class='sep'>/</span>          
   <a href='http://www.unimarc.cl/masterchef/'>Masterchef</a> -->
          <?php foreach ($primarios as $item) : ?>
            <span class='sep'>/</span>
           <?php 
             if($fechaActual.$horaActual >= $fechaLimite  && $item->link_name == $parametroBusca) : 
          $link_url = str_replace("ofertas-red-friday", "ofertasimpacto", $item->link_url);
        ?>
              <a href='<?php echo $link_url; ?>' target="<?php echo $item->link_target; ?>" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', '<?=$item->link_target?>']);" ><?php echo " Ofertas Impacto"; ?></a>
        
        <?php else :  ?>
            <a href='<?php echo $item->link_url; ?>' target="<?php echo $item->link_target; ?>" onclick="_gaq.push(['bond._trackEvent','HEADER', 'click boton', '<?=$item->link_name?>']);"><?php echo $item->link_name; ?></a>
          <?php 
	          endif;
	          endforeach; ?>          
        </nav>
      </div>
    </header>
<?php 

