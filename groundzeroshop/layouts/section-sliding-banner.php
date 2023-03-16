<?php

if( have_rows('slider_options') ): 
 while ( have_rows('slider_options') ) : the_row(); 
		
		$UniqueName = new UniqueName();
		$name = $UniqueName->manipulate(get_sub_field('name'));


		$speed = get_sub_field('speed') * 1000;
		$interval = get_sub_field('interval') * 1000;
		$height = get_sub_field('height');
		$type = get_sub_field('type'); 
		
		$image_size = get_sub_field('image_size'); 

	endwhile; 
else : endif; 



$slides = get_sub_field('slides');  

?>
<section class="sliding-banner <?php the_sub_field('classes'); ?>" >
	<div class="<?php the_sub_field('wrapper'); ?>">


		<div class="splide" id="<?php echo $name; ?>">
			<div class="splide__track">
				<ul class="splide__list">
				 
								
					<?php  
					foreach($slides as $slide): 
					?>		
							
						<li class="splide__slide">
						
						
							<?php  if($type === 'background-image') { ?>
								
								
								<div class="background-banner" style="background-image:url(<?php echo $slide['background_image']; ?>); height:<?php echo $height; ?>">
									<div class="large-wrapper" style="min-height:<?php echo $height; ?>">
							
							
										<div class="content">
										
											<div class="inner" >
												<h2><?php echo $slide['heading']; ?></h2>
												<p><?php echo $slide['description']; ?></p>
												
												<?php 
												$buttonLink = new buttonLink('',$slide['link']);
												echo $buttonLink->showbuttonLinkNested() ;	 
												?>
												
											</div><!-- inner -->
										</div><!--content -->
										
									</div><!--wrapper -->
								</div><!-- background-banner -->	
							
							
							<?php } else { ?>
							
								<div class="image-text-banner" style="height:<?php echo$height; ?>; background:<?php echo $slide['background_color']; ?>; flex-direction:<?php echo $slide['image_position']; ?>">
								
								
									<div class="image">
										<?php echo wp_get_attachment_image( $slide['image'], 'large'); ?>
									</div><!--image-->
									
									<div class="content">
										<div class="inner">
											<h3><?php echo $slide['heading']; ?></h3>
											<p><?php echo $slide['description']; ?></p>
											<?php 
												$buttonLink = new buttonLink('',$slide['link']);
												echo $buttonLink->showbuttonLinkNested() ;	 
											?>
										</div><!---content-inner-->
									</div><!--content-->
								
									
									

									
									
									
								</div><!-- image-text-banner -->
							<?php }
							
							?>
						
						
							
							
							
							
						</li><!--splide__slide-->
							
					<?php  
					endforeach; 
					?>					
									
						
				</ul><!-- splide__list-->
			</div><!-- splide track-->
		</div><!-- splide-->

	</div><!-- wrapper -->
</section><!-- gz-slider -->




<script>
Splide.defaults = {
	autoplay: 'true',
	perPage: 1,
	perMove: 1,
	type: 'loop',
	pauseOnHover: 'false', 

}

new Splide("#<?php echo $name; ?>", {
	
	interval : <?php echo $interval; ?>,
	speed:<?php echo $speed; ?>,
	
}).mount();
</script>
