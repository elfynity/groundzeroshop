			<?php function social_icons($name){ ?>
			<?php if( get_field($name, 'option') ): ?>
				<div class="icon-container">
					<a href="<?php the_field($name, 'options'); ?>" target="_blank">
						
						<span class="dashicons dashicons-<?php echo $name; ?>"></span>
					</a>
				</div><!---icon-container-->	
				<?php endif; ?>
			<?php } ?>
			
