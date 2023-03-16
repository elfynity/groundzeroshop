<?php


$blocks = get_sub_field('blocks'); 
?>




<div class="price-table <?php the_sub_field('classes'); ?>" >
	<div class="<?php the_sub_field('wrapper'); ?>">
	
		<div class="price-table-container">
			<?php foreach($blocks as $block): ?>
				
				<div class="price-block">
					<h5><?php echo $block['title']; ?></h5>
					<p class="price"><?php echo $block['price']; ?></p>
					<p class="price-after"><?php echo $block['after_price']; ?></p>
					<p><?php echo $block['description']; ?></p>

				
					<?php 
					$buttonLink = new buttonLink('',$block['link']);
					echo $buttonLink->showbuttonLinkNested() ;	 
					?>

				</div><!--price-block-->

			<?php endforeach; ?>
		</div><!-- price-table-container-->
	</div><!-- wrapper -->
</div><!-- price-table -->		