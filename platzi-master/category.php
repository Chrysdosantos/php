<?php
/*
* category.php
* @package WordPress
* @subpackage platzi
* @since platzi 1.0
*/
?>
<?php
/*
A usar: __( 'Categoría: "%s"', 'platzi' )
*/
get_header();
rewind_posts();
if ( have_posts() ) : ?>

	<section>
		<header>
			<h2><?php printf( __( 'Categoría: "%s"', 'platzi' ), single_cat_title( '', false ) ); ?></h2>
		</header>
		<?php while ( have_posts() ) : the_post() ?>
		<article>
			<a href="<?php the_permalink();?>">
				<h2><?php the_title();?></h2>
			</a>

			<?php
			$imagen_size	= 'imagen-100-100';
			$imagen_id		= get_post_thumbnail_id($post->ID);
			$imagen			= wp_get_attachment_image_src($imagen_id, $imagen_size);
			$alt_text		= get_post_meta($imagen_id , '_wp_attachment_image_alt', true);
			$permalink		= get_permalink($post->ID);

			if ( $imagen != "" ) { ?>
			<figure>
				<img src="<?php echo $imagen[0];?>" alt="<?php echo $alt_text;?>" />
				<?php if ( $alt_text !='' ) { ?>
				<figcaption><?php echo $alt_text;?></figcaption>
				<?php };?>
			</figure>

			<?php };?>

			<div>
				<?php _e('Clasificado en:', 'platzi'); the_category();?>
			</div>

			<div>
				<?php _e('Etiquetado en:', 'platzi'); the_tags('', ', ', '');?>
			</div>

			<div>
				<?php the_content();?>
			</div>

		</article>
	<?php endwhile ?>
		<article>
			<ul>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
			</ul>
		</article>
	<?php else : ?>
		<article>
			<h2><?php _e('En esta categoría no hay nada publicado.', 'platzi');?></h2>
		</article>
	<?php endif; ?>
	</section>

<?php get_footer(); ?>