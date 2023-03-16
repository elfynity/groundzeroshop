<?php


$type = get_sub_field('type'); 
$shape_color = get_sub_field('shape_color'); 
$background_color = get_sub_field('background_color'); 
$height = get_sub_field('height').'px';

if(get_sub_field('invert')) {
	$invert = 'invert';
} else {
	$invert = '';
}


if(get_sub_field('position')) {
	$position = '100%';
} else{
	$position = '0';
}


echo $type.$shape_color.$background_color.$invert;


?>


	<?php if ($type === 'triangle') { ?>
		<div class="bg" style="background-color: <?php echo $background_color; ?>">
			<div class="path <?php echo $invert; ?>" style="background-color: <?php echo $shape_color; ?>; clip-path: polygon(50% <?php echo $height; ?>, 0 0, 100% 0); height:<?php echo $height; ?>"></div>
		</div><!-- bg -->

	<?php } else if ($type === 'tilt') {
		?>
		<div class="bg" style="background-color: <?php echo $background_color; ?>">
			<div class="path <?php echo $invert; ?>" style="background-color: <?php echo $shape_color; ?>; clip-path: polygon(<?php echo $position; ?> <?php echo $height; ?>, 0 0, 100% 0); height:<?php echo $height; ?>"></div>
		</div><!-- bg -->

	<?php
		
	} else if($type === 'curve') { ?>
		<div class="bg" style="background-color: <?php echo $background_color; ?>">
			<div class="path <?php echo $invert; ?>" style="background-color: <?php echo $shape_color; ?>; clip-path: ellipse(50% <?php echo $height; ?> at 50% 0px ); height:<?php echo $height; ?>"></div>
		</div><!-- bg -->
		
	<?php } ?>

	



