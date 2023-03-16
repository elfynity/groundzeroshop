<?php

$sections = get_sub_field('sections'); 
?>


<div class="custom-accordion <?php the_sub_field('classes'); ?>"> 
	<div class="<?php the_sub_field('wrapper'); ?>">

		<?php foreach($sections as $section): ?>

			<div class="accordion-container close">
				<button class="accordion-header"><?php echo $section['title']; ?> </button>
				<div class="panel">
					<?php echo $section['description']; ?>
				</div><!--- panel-->
			</div><!--- accordion-container-->

		 
		<?php endforeach; ?>

	</div><!--wrapper-->
</div><!--custom-accordion-->