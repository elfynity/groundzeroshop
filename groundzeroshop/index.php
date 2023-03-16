<?php get_header(); ?>


<div class="site">
	<div class="wrapper">
		<div class="white-content">


		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php get_template_part('loop'); ?>


				
		<div class="pagination">
			<?php gz2_pagination(); ?>
		</div><!-- /pagination -->			


	</div><!---mainbar-->
		

	<?php get_sidebar('primary'); ?>


		</div><!---white-content-->
	</div><!---wrapper-->
</div><!---site-->


<?php get_footer(); ?>
