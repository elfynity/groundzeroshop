<?php /* Template Name: Shop Sidebar Template */ ?>

<?php get_header(); ?>




<div class="woo">
	<div class="mega-wrapper">

	<div class="woo-sidebar">
		<div id="page-sidebar-menu">
			<h3>Product Menu</h3>
			<?php wp_nav_menu( array( 'theme_location' => 'shop' ) ); ?>
		</div><!--- page-sidebar-menu-->	
		<script>
			jQuery(document).ready(function ($) {
				$("#page-sidebar-menu .sub-menu").hide();
				$("#page-sidebar-menu .current_page_item .sub-menu").show();
				$("#page-sidebar-menu li.menu-item").click(function () { // mouse CLICK instead of hover
					// Only prevent the click on the topmost buttons
					if ($('.sub-menu', this).length >=1) {
							event.preventDefault();
					}
					$("#page-sidebar-menu .sub-menu").hide(); // First hide any open menu items
					$(this).find(".sub-menu").show(); // display child
					event.stopPropagation();
				});
			});
			</script>	

		<div id="page-sidebar-menu-mobile">
			<?php wp_nav_menu( array( 'theme_location' => 'shop-mobile' ) ); ?>
		</div><!-- page-sidebar-menu-mobile -->
			
			
	</div><!---woo-sidebar-->

	
	<div class="woo-content">
		<h1 class="entry-title"><?php the_title(); ?></h1>


			<?php if (have_posts()) : 
			while (have_posts()) : the_post(); ?>
					
				<div class="post" id="post-<?php the_ID(); ?>">
						<?php the_content(); ?>
				</div><!---post-->
				
			<?php endwhile; 
			endif; ?>
	</div><!---woo-content-->

	</div><!-- wrapper-->
<div class="clear"></div>	
</div><!-- woo-->






<?php get_footer(); ?>