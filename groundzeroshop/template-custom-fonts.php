<?php /* Template Name: Custom Fonts Template */ ?>

<?php get_header(); ?>


<div class="site">
<div class="wrapper">


	<h1 class="entry-title"  itemprop="name"><?php the_title(); ?></h1>


		<?php $custom_fonts = array(
		'AbrilFatface',
		'Assistant',
		'Barlow',
		'DancingScript',
		'Dosis',
		'Lato',
		'Lobster',
		'Merriweather',
		'Montserrat',
		'NotoSansJP',
		'Nunito',
		'OpenSans',
		'OpenSansCondensed',
		'Oswald',
		'PlayfairDisplay',
		'PoiretOne',
		'Poppins',
		'Quicksand',
		'Raleway',
		'Righteous',
		'Roboto',
		'RobotoCondensed',
		'RobotoMono',
		'RobotoSlab',
		'Rubik',
		'Sacramento',
		'SourceSansPro',
		'Tangerine',
		'Ubuntu'
		); 
		
		
		?> 
		
		<div class="custom-font-boxes"> <?php
			foreach ($custom_fonts as $custom_font) { ?>
				<div class="custom-font-box">
				
				<style>
				
				@font-face {
					font-family: <?php echo $custom_font;?>-Regular;
					src: url(<?php bloginfo("template_url")?>/fonts/<?php echo $custom_font;?>/<?php echo $custom_font;  ?>-Regular.ttf) format('truetype');
				}	
				
			

				</style>
				
				
					<h5 class="font-title" style="font-family:<?php echo $custom_font;?>-Regular"><?php echo $custom_font;  ?></h5>
					
						<p style="font-family:<?php echo $custom_font;?>-Regular">Sixty zippers were quickly picked from the woven jute bag. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
	
						
				</div><!---custom-font-box-->
			<?php } ?>
		</div><!---custom-font-boxes-->
		


</div><!---wrapper-->
</div><!---site-->




<?php get_footer(); ?>