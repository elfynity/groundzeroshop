<?php get_header(); ?>

<div id="page-content">


	<div id="page-sidebar">
		<?php  get_sidebar('articles'); ?>
	</div><!---page-sidebar-->

	<div id="page-right-content">
		<div class="page-wrapper">

			<h1 itemprop="name">Archives</h1>

			<?php get_template_part('loop'); ?>

			<div class="pagination">
				<?php gz2_pagination(); ?>
			</div><!-- /pagination -->
			
		</div><!---page-wrapper-->
	</div><!---page-right-content-->

<div class="clear"></div>
</div><!---page-content-->


<?php get_footer(); ?>
