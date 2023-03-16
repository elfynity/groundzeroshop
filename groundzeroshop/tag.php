<?php get_header(); ?>



<div id="page-content">



	<div id="page-sidebar">
		<?php  get_sidebar('articles'); ?>
	</div><!---page-sidebar-->


	<div id="page-right-content">
		<div class="page-wrapper">


			<p class="pretend-heading"><?php _e( 'Tag Archive: ', 'html5blank' ); echo single_tag_title('', false); ?></p>

			
				<?php get_template_part('loop'); ?>
			
			
			

			<div class="pagination">
				<?php gz2_pagination(); ?>
			</div><!-- /pagination -->
			
			

		</div><!---page-wrapper-->
	</div><!---page-right-content-->

<div class="clear"></div>
</div><!---page-content-->


<?php get_footer(); ?>



