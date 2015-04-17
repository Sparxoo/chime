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
<div class="services-links pull-left text-center" style="background-image:url(<?php echo get_field('backgound_image', $post->ID);?>);">
	<div class="container">
		<div class="row">
			<h4><?php if(get_field('service_section_title', $post->ID) !=''){
				echo get_field('service_section_title', $post->ID);
			} else {
				echo "Our Services";
			}?></h4>
			<?php query_posts( 'post_type=page&post_parent=19940' );?>
			<?php while ( have_posts() ) : the_post();?>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<a href="<?php the_permalink();?>"><img src="<?php the_field('services_icon', $post->ID);?>"></a>
					<span class="pull-left"><?php the_title();?></span>
				</div>
			<?php endwhile; wp_reset_query();?>			
		</div>
	</div>
</div>
		
<?php get_footer(); ?>