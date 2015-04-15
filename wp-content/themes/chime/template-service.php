<?php
/*
 Template Name: Service Detail
 *
*/
?>
<?php get_header(); ?>
<?php 
	//add the hero banner to the header.
	get_template_part("content", "hero"); 
?>
<div class="service-detail pull-left">
	<div class="container">
		<div class="row">
			<div class="col-md-1 col-sm-1 col-xs-12"></div>
			<div class="col-md-10 col-sm-10 col-xs-12">
				<h2><?php the_field('sub_title',$post->ID);?></h2>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content();?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-12"></div>
		</div>
	</div>
</div>
<?php 
	//uncomment the below line to display a video on the home page.
	//get_template_part("content", "video"); 
?>
<?php 
	//get_template_part("content", "services"); 
?>
		
<?php get_footer(); ?>