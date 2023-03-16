<?php /* Template Name: Landing Page */ ?>

<?php get_header(); ?>



<?php // the header image or the video    the_custom_header_markup(); ?>

<div class="site">

	<h1 class="entry-title" id="skip-to-content"><?php the_title(); ?></h1>

	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<?php the_content(); ?>
			</div><!---post-->
		<?php endwhile; endif; ?>

		
	<div class="clear"></div>
</div><!---site-->



<?php get_footer(); ?>
