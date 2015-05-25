<?php
/*
 Template Name: Why Chime
 *
*/
?>
<?php get_header(); ?>
<?php 
	//add the hero banner to the header.
	get_template_part("content", "hero"); 
?>
<div class="after-banner why_chime_div pull-left">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center ">
				<h1 class="sub_heading_chime"><?php the_field('sub_heading');?></h1>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12"></div>
			<div class="col-md-8 col-sm-8 col-xs-12 text-center">
				<p><?php the_field('sub_description');?></p>
			</div>
			<div class="col-md-11 col-sm-11 col-xs-11 float_center">
<?php if( have_rows('what_we_value') ){
	while ( have_rows('what_we_value') ) : the_row();
	?>
	<div class="col-md-12 col-sm-12 col-xs-12 gap_div">
	<div class="green_bg_div">
		<?php the_sub_field('title', $post->ID); ?>
	</div>
	<div class="blue_bg_div">
		<?php the_sub_field('discription', $post->ID);?>
	</div>
	<div class="clear"></div>
</div>
<?php endwhile; }?>
			</div>
		</div>
	</div>
</div>






<div class="top-3-reasons pull-left" style="background-image:url(<?php the_field('reasons_background', $post->ID);?>);background-size:cover;background-position:center left;">
	<div class="container">
		<div class="row">
			<h4><?php the_field('reasons_section_title', $post->ID);?></h4>
			<div><?php if( have_rows('reason') ){
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
<!--<div class="service-detail pull-left">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 pull-right">
				<div class="testimonial-image">
					<img src="<?php the_field('client_image', $post->ID);?>" alt="">
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12 pull-left">
				<div class="testimonial-text">
					<h3><?php the_field('testimonial_title', $post->ID);?></h3>
					<p><?php the_field('testimonial', $post->ID);?> <img src="<?php bloginfo('template_url');?>/images/testimonial-end.png" alt=""></p>
					<span><?php the_field('client_name', $post->ID);?></span>

				</div>				
			</div>
		</div>
	</div>
</div>	

<?php 
	get_template_part("content", "services"); 
?>-->
<?php get_footer(); ?>