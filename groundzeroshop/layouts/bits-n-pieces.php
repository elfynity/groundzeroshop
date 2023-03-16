<?php
if( have_rows('flex_box') ): 
 while ( have_rows('flex_box') ) : the_row(); 
 
	$flexboxI  = new FlexBox(get_sub_field('flex_basis'), get_sub_field('gap'), get_sub_field('min_width'), get_sub_field('max_width'));
	$flexbox = $flexboxI->showValue();
	$flex_gap = $flexboxI->flexGap();
		
	endwhile; 
endif; 


