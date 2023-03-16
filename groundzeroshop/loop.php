	<div id="article-container">
				
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<div class="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				
					<div class="article-text">	
						<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

						<div class="article-meta">
							Posted on <?php the_time('j F Y, l'); ?>
							by <span class="author">Written by <?php the_author_posts_link(); ?></span>
							<?php the_tags('', ', ', ''); ?>
						</div><!---article-meta-->
						<div class="clear"></div>
						
						<p><?php the_excerpt(); ?></p>
					</div><!---article-text-->	

				<div class="clear"></div>
				</div><!---article-->

			<?php endwhile; ?><?php endif; ?>
			
			</div><!---article-container-->
			
			
	