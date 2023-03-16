			<div id="responsivemenu">
				<div class="menubutton"> 
				</div><!---menubutton-->
			
				
				
				<div id="hiddenmenu" style="display:none">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					<div class="clear"></div>
				</div><!---hiddenmenu--> 
			</div><!--responsivemenu--> 


			
			<script type="text/javascript">

				const menuButton = document.querySelector('.menubutton');
				const hiddenMenu = document.querySelector('#hiddenmenu');

				menuButton.addEventListener('click', hiddenMenuToggle);
				
				function hiddenMenuToggle(){
					
					if(hiddenMenu.style.display === 'none') {
						hiddenMenu.style.display = 'block';
					} else {
						hiddenMenu.style.display = 'none';
					}
					
				}
			</script>