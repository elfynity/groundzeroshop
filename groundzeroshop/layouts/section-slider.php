<?php
if( have_rows('slider_options') ): 
 while ( have_rows('slider_options') ) : the_row(); 
		
		$UniqueName = new UniqueName();
		$name = $UniqueName->manipulate(get_sub_field('name'));


		$perPage = get_sub_field('per_page');
		$perMove = get_sub_field('per_move');
		$speed = get_sub_field('speed') * 1000;
		$interval = get_sub_field('interval') * 1000;

	endwhile; 
 else : endif; 
 
$blocks = get_sub_field('content'); 
?>


<section class="blocks-slider <?php the_sub_field('classes'); ?>" >
	<div class="<?php the_sub_field('wrapper'); ?>">


		<div class="splide" id="<?php echo $name; ?>">
			<div class="splide__track">
				<ul class="splide__list">
				 
								
						<?php  
						foreach($blocks as $block): 
						?>		
								
							<li class="splide__slide">
							
								<div class="blocks-slide-inner">
								
									<div class="image">
										<?php echo wp_get_attachment_image( $block['image'], get_sub_field('image_size') ); ?>
									</div><!-- image -->
									
									<div class="title">
										<?php echo $block['something']; ?>
									</div><!-- title-->
									
									
								</div><!--slide-inner-->
							
							
							</li><!--splide__slide-->
								
						<?php  
						endforeach; 
						?>					
									
						
				</ul><!-- splide__list-->
			</div><!-- splide track-->
		</div><!-- splide-->

	</div><!-- wrapper-->
</section><!-- gz-slider -->




<script>
Splide.defaults = {
  autoplay: 'true',

}

new Splide("#<?php echo $name; ?>", {
	type   : 'loop',
  perPage: <?php echo $perPage; ?>,
	perMove: <?php echo $perMove; ?>,
	interval : <?php echo $interval; ?>,
	pauseOnHover: 'false', 
	drag: 'true',
	speed:<?php echo $speed; ?>,
	gap: 20,
}).mount();
</script>



