<?php get_header(); ?>



<div id="page-content">


	<div id="page-sidebar">
		<?php get_sidebar('category-pages'); ?>
	</div><!---page-sidebar-->

	
	
	

	<div id="page-right-content">
		<div class="page-wrapper">
		
		
		
			<h1><?php single_cat_title(); ?></h1>
			
			
			
			
			
			<div id="article-container">
				
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<div class="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				
					<div class="article-image" >
						<img src="<?php the_post_thumbnail_url('gallery-image');?>" />
					</div><!---article-image-->

					<div class="article-text">	
						<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

						<div class="article-meta">
							Posted on <?php the_time('j F Y, l'); ?>
							<?php the_tags('', ', ', ''); ?>
						</div><!---article-meta-->
						<div class="clear"></div>
						
						<p><?php the_excerpt(); ?></p>
					</div><!---article-text-->	

				<div class="clear"></div>
				</div><!---article-->

			<?php endwhile; ?><?php endif; ?>
			
			</div><!---article-container-->
			
			
			
			

					
			<div class="pagination">
				<?php gz2_pagination(); ?>
			</div><!-- /pagination -->


		</div><!---page-wrapper-->
	</div><!---page-right-content-->

<div class="clear"></div>
</div><!---page-content-->


<?php get_footer(); ?>
