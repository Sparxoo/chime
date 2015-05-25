<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sparxoo BP
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer pull-left" role="contentinfo">
		<div class="container">
			<div class="row">				
				<?php
					//add the footer menu that is defined in the funcitons.php file
					bp_footer_nav();
				?>
				<div class="site-by pull-right">
					<?php dynamic_sidebar('site-by');?>
				</div>
			</div>
			
		</div>
		
		
		
		<?php 
		/*
		* SOCIAL MEDI ICONS
		* If the site includes social media icons you can add the advanced custom field social media settings loacated in the
		* DATABASE/INITIAL_INCLUDES folder
		* TO display the icons uncomment the below code.
		*/
		/** $icons = get_field('social_media_links', 'option');
		$countIcons = count($icons);
		
		//if at least one social link has been added we can add the links to the footer.			
		if($countIcons > 0){
			echo "<div class='cf' id='social-icons-container'><ul id='social-icons'>";
				foreach($icons as $icon){
					echo "<li class='" . $icon['type_of_link'] . "'><a href='" . $icon['link_url'] . "' target='_blank'>" . do_shortcode('[icon name="social-icon" class="fa-' . $icon['type_of_link'] . '"]') . "</a></li>";
				}
			echo "</ul></div>";
		}**/
		?>
		
		<?php //endable the below code if you need to add copyright information. ?>
		<!-- <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> | All rights reserved.
		</p>-->
		
	</footer><!-- #colophon -->

<?php wp_footer(); ?>
</div>
</body>
</html>
