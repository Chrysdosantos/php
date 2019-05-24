<?php
/**
 *
 * @package WordPress
 * @subpackage platzi
 * @since platzi 2.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.5, user-scalable=yes" />
	<meta name="description" content="<?php bloginfo('description');?>" />
	<title><?php the_title();?> | <?php bloginfo('description');?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/estilos.css">

	<?php if(wpmd_is_notdevice()) { ?>
	<!-- Condicionales de scripts para IE -->
	<!--[if IE 8]>
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/modernizr-2.8.3.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/selectivizr-min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/html5.js"></script>
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/styleIE8.css" media="all" />
	<![endif]-->
	<?php };?>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory');?>/img/favicon.ico" />
	<?php
	wp_head();?>
</head>
<body>
	<header>
		<div>
			<?php if ( function_exists( 'the_msls' )) the_msls();?>
		</div>
		<nav>
			<?php
			$default = array(
				'container'			=>	'',
				'container_class'	=>	'nav--listado',
				'depth'				=>	3,
				'theme_location'	=>	'header_nav',
				'items_wrap'		=>	'<ul id="header_nav" class="nav--listado">%3$s</ul>',
				'walker'			=>	'',
				'fallback_cb'		=>	'wp_page_menu'
			);
			wp_nav_menu($default);
			?>
		</nav>
		<h1><?php bloginfo('name');?> | <?php bloginfo('description');?></h1>
	</header>