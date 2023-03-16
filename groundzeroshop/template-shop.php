<?php /* Template Name: Shop Template */ ?>

<?php get_header(); ?>




<div class="woo">
	<div class="wrapper">


		<h1 class="entry-title"><?php the_title(); ?></h1>


			<?php if (have_posts()) : 
			while (have_posts()) : the_post(); ?>
					
				<div class="post" id="post-<?php the_ID(); ?>">
						<?php the_content(); ?>
				</div><!---post-->
				
			<?php endwhile; 
			endif; ?>


	</div><!-- wrapper-->
</div><!-- woo-->




<?php get_footer(); ?>