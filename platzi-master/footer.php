<?php
/*
* footer.php
* @package WordPress
* @subpackage platzi
* @since platzi 1.0
*/
?>

		<footer>
			<div class="copyright">
				&copy; Platzi <?php the_time('Y');?> | <?php _e('Todos los derechos reservados.', 'platzi') ?>
			</div>

			<div class="copyright">
				<?php _e('Desarrollado por', 'platzi');?> WebModerna
			</div>
			<a id="ir_arriba" class="gotop" href="#">&uparrow;</a>
		</footer>

		<!-- scripts generales y condicionales para IE-->
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/scripts.js"></script>

	<?php if(wpmd_is_notdevice()) { ?>

		<!--[if IE 8]>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/respond.js"></script>
		<![endif]-->
	<?php };
	wp_footer();?>
	</body>
</html>