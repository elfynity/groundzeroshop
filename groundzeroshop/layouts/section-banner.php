<?php 
$scrollEffect = new ScrollEffect(get_sub_field('scroll_effect'));

$background_image = get_sub_field('background_image'); 
 
 
if( have_rows('banner_inner') ): 
 while ( have_rows('banner_inner') ) : the_row(); 
		$heading =  get_sub_field('heading'); 
		$description = get_sub_field('description'); 

		$link = get_sub_field('link');
		if( $link ): 
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
		 endif; 

	endwhile; 
endif;  
?>  

	
<div class="flexi-banner <?php the_sub_field('classes'); ?>" style="background-image:url(<?php echo $background_image; ?>)">
	<div class="overlay">
		<div class="<?php the_sub_field('wrapper'); ?>">
		
			<div class="flexi-container">

				<?php if($heading || $description) : ?>
					<div class="flexi-banner-inner<?php echo $scrollEffect->showValue(); ?>">
					
						<h2><?php echo $heading; ?></h2>
						<p><?php echo $description; ?></p>

						<?php
						$buttonLink = new buttonLink($link, '');
						echo $buttonLink->showButtonLink();						
						?>

						
						
						
					</div><!-- flexi-banner-inner-->
				<?php endif; ?>	
				
			</div><!---flexi-container-->
			
		</div><!-- wrapper-->	
	</div><!---overlay-->
</div><!--flexi-banner-->



