<?php
/*
* @package WordPress
* @subpackage platzi
* @since platzi 1.0
*/

// Detección de móviles.
require_once "includes/wp-mobile-detect.php";

// Definir tamaños personalizados de miniaturas - hay que configurarlas
add_theme_support('post-thumbnails', array(
	'post',
	'page'
	));

the_post_thumbnail( 'thumbnail' ); // Fijar a 100x100 pero configurar al doble
the_post_thumbnail( 'medium' ); // Fijar a 320x200 pero configurar al doble
the_post_thumbnail( 'large' ); // Fijar a 800x600px pero configurar al doble
the_post_thumbnail( 'full' ); // Tamaño original de la imagen


// Imágenes de dimensiones fijas
add_image_size('imagen-600-400', 1200, 800, true);
add_image_size('imagen-320-200', 640, 400, true);
add_image_size('imagen-100-100', 200, 200, true);
add_image_size('imagen-50-50', 100, 100, true);

// Imágenes de altura variables
add_image_size('imagen-600-x', 1200, false);
add_image_size('imagen-320-x', 640, false);
add_image_size('imagen-100-x', 200, false);


//Registrar las menúes de navegación
register_nav_menus (array(
	'header_nav'	=>	__('Menú Principal',  'platzi')
	// 'second_nav'	=>	__('Menú Secundario', 'webtranslations')
	)
);

//Para hacer posible que esta plantilla pueda cambiar de idioma
load_theme_textdomain('platzi', TEMPLATEPATH.'/language');
$locale = get_locale();
$locale_file = TEMPLATEPATH."/language/$locale.php";
if(is_readable($locale_file)) require_once($locale_file);