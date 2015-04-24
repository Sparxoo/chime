<?php
/*
 Template Name: Career
 *
*/
?>
<?php get_header(); ?>
<?php 
	//add the hero banner to the header.
	get_template_part("content", "hero"); 
?>
<div class="job-link pull-left">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<a href="<?php echo get_permalink(19957);?>">Open positions</a>
			</div>
		</div>
	</div>
</div>
<div class="service-detail pull-left">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-12 pull-left"></div>
			<div class="col-md-8 col-sm-8 col-xs-12 pull-left">
				<div class="testimonial-text">
					<h3 class="text-center"><?php the_field('testimonial_title', $post->ID);?></h3>
					<p><?php the_field('testimonial', $post->ID);?> <img src="<?php bloginfo('template_url');?>/images/testimonial-end.png" alt=""></p>
					<span><?php the_field('client_name', $post->ID);?></span>
				</div>				
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12 pull-left"></div>
		</div>
	</div>
</div>	

<div class="top-3-reasons pull-left" style="background-image:url(<?php the_field('reasons_background', $post->ID);?>);background-size:cover;background-position:center left;">
	<div class="container">
		<div class="row">
			<h4><?php the_field('reasons_section_title', $post->ID);?></h4>
			<div class="pull-left" style="width:100%s;"><?php if( have_rows('reason') ){
				while ( have_rows('reason') ) : the_row();
				?>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<span class="image"><img src="<?php the_sub_field('reason_image', $post->ID);?>"></span>
					<span class="pull-left title"><?php the_sub_field('reason_title', $post->ID);?></span>
					<p><?php the_sub_field('reason_text', $post->ID);?></p>
				</div>
			<?php endwhile; }?>
			</div>
			<a href="<?php echo get_permalink(19946);?>">Learn More</a>
		</div>
	</div>
</div>

<div class="our-values">
	<div class="container">
		<div class="row">
			<div class="col-md-1 col-sm-1 col-xs-12"></div>
			<div class="col-md-10 col-sm-10 col-xs-12">
				<div class="row">
					<div class="col-md-1 col-sm-1 col-xs-12">
					</div>
				</div>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-12"></div>
		</div>
	</div>
</div>

<?php get_footer(); ?>