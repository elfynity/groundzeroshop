<?php /* Template Name: Flexible Content */ ?>

<?php get_header(); 
get_template_part('layouts/bits', 'functions'); 
get_template_part('layouts/classes/class', 'scroll-effect'); 
get_template_part('layouts/classes/class', 'margin'); 
get_template_part('layouts/classes/class', 'padding'); 
get_template_part('layouts/classes/class', 'flex-box'); 
get_template_part('layouts/classes/class', 'unique-name'); 
get_template_part('layouts/classes/class', 'button-link'); 


?>



<div id="flexible-content">





	<?php if( have_rows('flexible') ): ?>
		<?php while ( have_rows('flexible') ) : the_row(); ?>
		
		
			<?php if( get_row_layout() == 'banner' ): ?>
				<?php get_template_part('layouts/section', 'banner'); ?>
			<?php endif; ?>
			
			<?php if( get_row_layout() == 'sliding_banner' ): ?>
				<?php get_template_part('layouts/section', 'sliding-banner'); ?>
			<?php endif; ?>
			
			<?php if( get_row_layout() == 'main_content' ): ?>
				<?php get_template_part('layouts/section', 'main-content'); ?>
			<?php endif; ?>
			

			<?php if( get_row_layout() == 'image_blocks' ): ?>
				<?php get_template_part('layouts/section', 'image-blocks'); ?>
			<?php endif; ?>
			
			<?php if( get_row_layout() == 'slider' ): ?>
				<?php get_template_part('layouts/section', 'slider'); ?>
			<?php endif; ?>
			
			<?php if( get_row_layout() == 'accordion' ): ?>
				<?php get_template_part('layouts/section', 'accordion'); ?>
			<?php endif; ?>		

			<?php if( get_row_layout() == 'price_table' ): ?>
				<?php get_template_part('layouts/section', 'price-table'); ?>
			<?php endif; ?>			

			<?php if( get_row_layout() == 'divider' ): ?>
				<?php get_template_part('layouts/section', 'divider'); ?>
			<?php endif; ?>		

			<?php if( get_row_layout() == 'shortcode' ): ?>
				<?php get_template_part('layouts/section', 'shortcode'); ?>
			<?php endif; ?>				
			
		
		<?php  endwhile;?>
		
		
		<script>
		let myInstance;
		let timing;
		</script>
	<?php endif; ?>


	
	

</div><!---devgirl-flexible-content-->



<?php get_footer(); ?>