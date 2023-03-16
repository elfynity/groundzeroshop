<?php
$blocks = get_sub_field('content');

?>


<section id="gz-slider" class="<?php the_sub_field('classes'); ?>">
	<div class="<?php the_sub_field('wrapper'); ?>">


		<div id="gz-slider-wrapper">
			
			
			
			<ul class="slides-container"> 
				<button class="slide-arrow" id="slide-arrow-prev">
					&#8249;
				</button>
				
				<button class="slide-arrow" id="slide-arrow-next">
					&#8250;
				</button>
						
				<?php  
				foreach($blocks as $block): 
				?>		
						
					<li class="slide">
						<div class="slide-inner">
						
							<div class="image">
							</div><!-- image -->
							
							<div class="title">
							</div><!-- title-->
							<?php echo $block['something']; ?>
							<?php echo wp_get_attachment_image( $block['image'], get_sub_field('image_size') ); ?>
						
						
						</div><!--slide-inner-->
					</li>

							
				<?php  
				endforeach; 
				?>					
							
				
			</ul><!-- slides-container-->
		</div><!-- gz-slider-wrapper-->
		
		<div id="stuff"></div>


	</div><!--wrapper-->
</section>


<?php echo $timing = get_sub_field('timing'); ?>




<script>
timing = <?php echo json_encode(get_sub_field('timing')); ?>;
myInstance = new Slider(timing);
myInstance.controlSlider();

	console.log(myInstance);
</script>



