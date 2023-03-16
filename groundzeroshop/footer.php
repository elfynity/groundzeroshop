<div class="clear"></div>


<?php get_sidebar('footer'); ?>



<div id="custom-footer" class="black-bg">
	<div class="wrapper">
	
	
		<div class="columns2">
		
			<section>
			
				<div id="footer-logo">
					<?php
					// Display the Custom Logo
					the_custom_logo();

					// No Custom Logo, just display the site's name
					if (!has_custom_logo()) {
							?>
							<a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
							<?php
					}
					?>
				</div><!---footer-logo-->
				
				
				
				
				
				
				<?php if( get_field('slogan', 'option') ): ?>
					<p id="slogan" class="pretend-heading">
					<?php the_field('slogan', 'option'); ?>
					</p><!---slogan-->
				<?php endif; ?>
				
				
				
				
				
				
				
				<div id="footer-contact" class="footer-box">

					<table class="contact-table">
					
						<?php function contactTable($value) { ?>
						
						
						<?php if( get_field($value, 'option') ): ?>
							<tr>
								<td><span class="dashicons dashicons-<?php echo $value; ?>"></span></td>
								<td>
								<?php if($value === 'phone') {
									?><a href="tel:<?php the_field($value, 'option'); ?>">
										<?php the_field($value, 'option'); ?>
									</a>	
								<?php 
								} else {
									?><a href="<?php the_field($value, 'option'); ?>">
										<?php the_field($value, 'option'); ?>
									</a>	
								<?php 
								}
									?>	
									
								</td>
							</tr>
							<?php endif; ?>

							
								<p></p>
						<?php } 
						
						contactTable('phone'); 
						contactTable('whatsapp'); 
						contactTable('email'); 
						contactTable('location'); 
						contactTable('address'); 

						?>
					
					</table>
				</div><!---footer-contact-->	

				
				
				<div id="footer-social" class="footer-box">

					<br />
					
					<span id="footer-icon-container">
						<?php social_icons('facebook'); ?>
						<?php social_icons('pinterest'); ?>
						<?php social_icons('instagram'); ?>
						<?php social_icons('twitter'); ?>
						<?php social_icons('youtube'); ?>
						<?php social_icons('linkedin'); ?>

					</span><!---footer-icon-container-->
					
				</div><!---footer-social-->
				

				
			</section>
			
		
			

			<section>
				<div id="footer-form">
				<?php echo do_shortcode('[fluentform id="1"]'); ?>
				</div><!---footer-form-->
			</section>	
			
			
				
		</div><!---columns2-->
	</div><!---wrapper-->
</div><!---custom-footer-->







	<div id="copyright">
		<div class="wrapper">
			<p>&copy;<?php echo date('Y'); ?> <?php echo bloginfo('name'); ?> v<?php	echo wp_get_theme()->get( 'Version' ); ?> |  
			Developed by Cyba | 
			Attribution to Freepik &amp; Clipart Library</p>

		</div><!---wrapper-->
	</div><!---copyright-->



<?php
if ( is_plugin_active( 'custom-animator/custom-animator.php' ) ) {?>
<script src="<?php echo plugins_url(); ?>/custom-animator/ScrollTrigger.min.js"></script>	
<script src="<?php echo plugins_url(); ?>/custom-animator/CSSRulePlugin.min.js"></script>	
<script src="<?php echo plugins_url(); ?>/custom-animator/gsap.min.js"></script>	
<script src="<?php echo plugins_url(); ?>/custom-animator/custom-animator.js"></script>	  
<?php } 
?>



<!--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->




<?php wp_footer(); ?>
</body>
</html>