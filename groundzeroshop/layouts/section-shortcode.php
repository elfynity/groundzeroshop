<?php



$shortcode = get_sub_field('shortcode');

/* [products columns="4" orderby="rand" limit="4"] */

?>


<div class="container-shortcode <?php the_sub_field('classes'); ?>" >
	<div class="<?php the_sub_field('wrapper'); ?>">

		<h3><?php echo get_sub_field('heading'); ?></h3>
		<?php echo do_shortcode('['.$shortcode.']');?>
		
	</div><!-- wrapper -->
</div><!-- container-main-content -->	