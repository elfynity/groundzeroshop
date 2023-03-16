<?php get_header(); ?>

<div id="page-content">

	<div id="page-sidebar">
		<?php  get_sidebar('articles'); ?>
	</div><!---page-sidebar-->


	<div id="page-right-content">
		<div class="page-wrapper">

			<h1 class="entry-title"><?php  esc_html_e( 'Page not found', 'groundzero' ); ?></h1>
			
			<p>We apologize for the inconvenience, the link you were looking for has either moved or doesn't exist anymore. Please go to our home page: <a href="<?php echo get_option('home'); ?>/"> or look through our menu to find what you were looking for. </p>

		</div><!---page-wrapper-->
	</div><!---page-right-content-->

<div class="clear"></div>
</div><!---blog-content-->


<?php get_footer(); ?>