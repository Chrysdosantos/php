<?php
/*
* page.php
* @package WordPress
* @subpackage platzi
* @since platzi 1.0
*/
?>
<?php get_header();
rewind_posts();
if ( have_posts() ) : ?>

	<section>
		<?php while ( have_posts() ) : the_post() ?>
		<article>
			<h2><?php the_title();?></h2>

			<?php
			$imagen_size	= 'imagen-320-200';
			$imgagen_id		= get_post_thumbnail_id($post->ID);
			$imagen			= wp_get_attachment_image_src($imagen_id, $imagen_size);
			$alt_text		= get_post_meta($imagen_id , '_wp_attachment_image_alt', true);
			$permalink		= get_permalink($post->ID);

			if ( $imagen != "" )	{ ?>
			<figure>
				<img src="<?php echo $imagen[0];?>" alt="<?php echo $alt_text;?>" />
				<?php if ( $alt_text !='' ) { ?>
				<figcaption><?php echo $alt_text;?></figcaption>
				<?php };?>
			</figure>

			<?php };?>

			<div>
				<?php the_content();?>
			</div>

		</article>
	<?php endwhile; ?>
	<?php else : ?>
		<article>
			<h2><?php _e('No hay nada publicado en esta página.', 'platzi');?></h2>
		</article>
	<?php endif; ?>
	</section>

<?php get_footer(); ?>