<?php get_header(); ?>



<div id="page-content">


	<div id="page-sidebar">
		<?php  get_sidebar('articles'); ?>
	</div><!---page-sidebar-->

	
	
	

	<div id="page-right-content">
		<div class="page-wrapper">


		
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<script type="application/ld+json">
				{
					"@context": "https://schema.org",
					"@type": "NewsArticle",
					"mainEntityOfPage": {
						"@type": "WebPage",
						"@id": "<?php echo the_permalink(); ?>"
					},
					"headline": "<?php echo the_title(); ?>",
					"image": [
						"<?php the_post_thumbnail_url('thumbnail');?>"
					 ],
					"datePublished": "<?php echo $time = the_time('c'); ?>",
					"dateModified": "<?php the_modified_date('c'); ?>",
					"author": {
						"@type": "Person",
						"name": "<?php the_author(); ?>"
					},
					 "publisher": {
						"@type": "Organization",
						"name": "<?php echo get_bloginfo('name'); ?>",
						"logo": {
							"@type": "ImageObject",
							"url": "<?php the_post_thumbnail_url('full');?>",
							"image": "<?php echo $img_src; ?>"
						}
					}
				}
				</script>

		
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<div class="blog-meta">
						<?php the_time('j F Y, l'); ?> | 
						Written by: <?php the_author(); ?>   <br />
						<?php the_tags('', ', ', ''); ?>
					</div><!---blog-meta-->
					<div class="clear30"></div>
					
					
					
					<?php /* <img src="<?php the_post_thumbnail_url('full');?>" /> */ ?>
					
					<?php the_content(); ?>
	
				</div><!---post-->

				<?php // comments_template(); ?>
			<?php endwhile; endif; ?>


					
	</div><!---page-wrapper-->
	</div><!---page-right-content-->

<div class="clear"></div>
</div><!---blog-content-->


<?php get_footer(); ?>