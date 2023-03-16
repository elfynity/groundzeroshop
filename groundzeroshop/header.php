<!doctype html>

<html <?php language_attributes(); ?> class="no-js">
	<head>

		
	<title><?php echo wp_title(" | ", false, 'right'); ?>
	<?php if( get_field('seo_title') ): ?><?php the_field('seo_title'); ?><?php endif; ?>
		<?php bloginfo('name'); ?>
	</title>


	<link href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" rel="shortcut icon">

	<!---meta tags -->
	<meta charset="<?php bloginfo('charset'); ?>">
	
	
	<?php if($paged > 1 || is_author() || is_date() || is_attachment()){ ?>
		<meta name="robots" content="<?php the_field('indexing', 'options'); ?>" />
	<?php } else { ?>
		<meta name="robots" content="<?php the_field('indexing', 'options'); ?>">
	<?php } ?>



	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
			
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">	 -->

		
		<?php
			if('is_page()' || 'is_single()') {

   
				// the below is causing an error
				if(has_post_thumbnail($post->ID)) {
						$saved_post_id = $post->ID;
            $img_src = wp_get_attachment_url( get_post_thumbnail_id( $saved_post_id ) ); 
        } else {
            $img_src = get_stylesheet_directory_uri() . '/images/banner.jpg';
				}
        
			?>

			<?php if( get_field('description') ){ ?>
			<meta name="description" content="<?php the_field('description'); ?>" />
			<?php } else if (is_category() ) { ?>
				
			<meta name="description" content="<?php echo strip_tags(the_archive_description()); ?>" />			
			<?php } else { ?>
			<meta name="description" content="<?php echo strip_tags( get_the_excerpt() ); ?>" />
			<?php } ?>			
			
			
			

			<?php if (is_category()) { ?>
				<meta property="og:title" content="<?php single_cat_title();  ?>"/>
			<?php } else { ?>
				<meta property="og:title" content="<?php echo the_title(); ?>"/>
			<?php } ?>
			
			


			<?php if( get_field('description') ){ ?>
			<meta name="og:description" content="<?php the_field('description'); ?>" />
			<?php } else if (is_category() ) { ?>
				
			<meta name="og:description" content="<?php strip_tags(the_archive_description()); ?>" />	
			
			<?php } else { ?>
			<meta name="og:description" content="<?php echo strip_tags( get_the_excerpt() ); ?>" />
			<?php } ?>		


			<meta property="og:type" content="website"/>
			<meta property="og:url" content="<?php echo the_permalink(); ?>"/>
			<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
			<meta property="og:image" content="<?php echo $img_src; ?>"/>
		
	<?php } ?>

		
		
		
	<?php if ('is_page()' || 'is_single()') { ?> 	
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:image" content="<?php echo $img_src; ?>">
		<meta name="twitter:description" content="<?php echo strip_tags( get_the_excerpt() ); ?>" />
		<meta name="twitter:url" content="<?php echo the_permalink(); ?>"/>
		<meta name="twitter:title" content="<?php echo the_title(); ?>"/>
		<meta name="twitter:site" content="@<?php the_field('twitter_creator_username', 'options'); ?>" />
		<meta name="twitter:creator" content="@<?php the_field('twitter_creator_username', 'options'); ?>" />
	<?php } ?>
	


	<?php if(is_front_page()) { ?>
		<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "LocalBusiness",
			"name": "<?php the_field('business_name', 'options'); ?>",
			"image": "<?php the_field('business_logo', 'options'); ?>",
			"telephone": "<?php the_field('business_telephone_number', 'options'); ?>",
			"priceRange": "<?php the_field('business_price_range', 'options'); ?>",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "<?php the_field('business_address', 'options'); ?>",
				"postalCode": "<?php the_field('postal_code', 'options'); ?>",
				"addressCountry": "ZA"
			},
			"openingHoursSpecification": {
				"@type": "OpeningHoursSpecification",
				"dayOfWeek": [
					"Monday",
					"Tuesday",
					"Wednesday",
					"Thursday",
					"Friday"
				],
				"opens": "08:00",
				"closes": "17:00"
			} 
		}
		</script>
	<?php } ?>
	


	



<?php wp_head(); ?>
</head>
<!---<body oncontextmenu="return false"< > -->
<body>


	
	<div class="noshow">
		<?php if( get_field('description') ): ?>
			<h2><?php the_field('description'); ?></h2>
		<?php endif; ?>	
		<?php if( get_field('seo_phrases') ): ?>
			<?php the_field('seo_phrases'); ?>
		<?php endif; ?>
	</div><!--- noshow -->






	<div id="stickyheader">

		<div class="wrapper">
			<div id="logo" itemprop="image" > 
				<?php
				// Display the Custom Logo
				the_custom_logo();

				// No Custom Logo, just display the site's name
				if (!has_custom_logo()) {
						?>
						<a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
						<?php
				}
				?>
			</div><!---logo-->	
			
			
			<div id="full-menu">
				<div id="menu-wrapper">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					<div class="clear"></div>
				</div><!---menuwrapper--> 
			</div><!---full-menu-->

			
		</div><!---wrapper-->
	</div><!---stickyheader-->



	<script>
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
			document.getElementById("stickyheader").classList.add("sticky");
			document.getElementById("stickyheader").style.opacity = "1";
		} else {
			document.getElementById("stickyheader").classList.remove("sticky");
			document.getElementById("stickyheader").style.opacity = "0";
		}
	}

	</script>
	



	
	<?php include 'social.php'; ?>
	<div id="top-bar">
		<div class="wrapper">
		
			<div class="top-bar-item">
				<?php if( get_field('slogan', 'option') ): ?>
					<div id="slogan">
					<?php the_field('slogan', 'option'); ?>
					</div><!---slogan-->
				<?php endif; ?>			
			</div><!---top-bar-item-->

			
			

			
			<div class="top-bar-item">
				<?php if( get_field('phone', 'option') ): ?>
				<div class="icon-container">
					<a href="tel:<?php the_field('phone', 'options'); ?>" target="_blank">
						<span class="dashicons dashicons-phone"></span>
					</a>
				</div><!---icon-container-->	
				<?php endif; ?>
				
				<?php if( get_field('email', 'option') ): ?>
				<div class="icon-container">
					<a href="mailto:<?php the_field('email', 'options'); ?>" target="_blank">
						<span class="dashicons dashicons-email"></span>
					</a>
				</div><!---icon-container-->	
				<?php endif; ?>
				
				
				
				<?php social_icons('whatsapp'); ?>
				<?php social_icons('location'); ?>			
			</div><!---top-bar-item-->
			

			<?php /*
			<div class="top-bar-item">	
				<?php get_search_form(); ?>	
				<?php echo do_shortcode('[language-switcher] '); ?>
			</div><!---top-bar-item-->	
			*/ ?>
			
			
			<div class="top-bar-item">	
				<div id="cart">
					<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
						<span class="dashicons dashicons-cart"></span>
						<?php echo WC()->cart->get_cart_total(); ?>
						<?php // echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> 
						
					</a>
				</div><!---cart-->
			</div><!---top-bar-item-->	
			
			

		</div><!---wrapper-->	
	</div><!---top-bar-->	
	
	


	<div id="header">	
		<div class="wrapper">		
		

		
		
			<div id="logo" itemprop="image" > 
				<?php
				// Display the Custom Logo
				the_custom_logo();

				// No Custom Logo, just display the site's name
				if (!has_custom_logo()) {
						?>
						<a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
						<?php
				}
				?>
			</div><!---logo-->		

			
			<div id="full-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				<div class="clear"></div>
			</div><!---full-menu-->
			
			
			

		<div class="clear"></div>
		</div><!---wrapper-->
	</div><!---header-->
			
	<?php include 'responsivemenu.php'; ?>



	
	
	
	









