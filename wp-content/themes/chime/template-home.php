<?php
/*
 Template Name: Home Page
 *
*/
?>
<?php get_header(); ?>
<?php 
	//add the hero banner to the header.
	get_template_part("content", "hero"); 
?>
<div class="after-banner pull-left">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center ">
				<h1><?php the_field('headline', $post->ID);?></h1>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
			<div class="col-md-8 col-sm-8 col-xs-8 text-center">
				<?php the_field('text', $post->ID);?>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
		</div>
	</div>
</div>
<?php 
	//uncomment the below line to display a video on the home page.
	//get_template_part("content", "video"); 
?>
<?php 
	get_template_part("content", "services"); 
?>
		
<?php get_footer(); ?>