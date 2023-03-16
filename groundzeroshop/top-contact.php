			<div id="top-contact">
			
			
				<?php if( get_field('email', 'options') ): ?>
				
				<div class="top-contact-item">
					<a href="mailto:<?php the_field('email', 'options'); ?>" target="_blank" title="Email">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/icons/email.svg" />
					</a>
				</div><!---top-contact-item-->

				<div class="top-contact-item">	
					<a href="mailto:<?php the_field('email', 'options'); ?>" target="_blank" title="Email">
						<?php the_field('email', 'options'); ?>
					</a>
				</div><!---top-contact-item-->
				<?php endif; ?>
				
				
				
				
				<?php if( get_field('phone', 'options') ): ?>
				
				<div class="top-contact-item">
					<a href="tel:<?php the_field('phone_dialing_code', 'options'); ?>" target="_blank" title="Phone">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/icons/call.svg" />
					</a>	
				</div><!---top-contact-item-->			
				
				<div class="top-contact-item">
					<a href="tel:<?php the_field('phone_dialing_code', 'options'); ?>" target="_blank" title="Phone">
						 <?php the_field('phone', 'options'); ?>
					</a>
				</div><!---top-contact-item-->
				<?php endif; ?>	
				
				
				<div class="clear"></div>
			</div><!---top-contact-->
			
			
			
			
			
			
			<div id="top-contact-responsive">
			
				<div class="top-contact-item">
					<a href="mailto:<?php the_field('email', 'options'); ?>" target="_blank" title="Email">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/icons/email.svg" />
					</a>
				</div><!---top-contact-item-->	

				
				<div class="top-contact-item">
					<a href="tel:<?php the_field('phone', 'options'); ?>" target="_blank" title="Phone">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/icons/call.svg" />
					</a>	
				</div><!---top-contact-item-->		
				
				
			</div><!---top-contact-responsive-->