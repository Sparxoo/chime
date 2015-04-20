<?php
/*
 Template Name: Open Position
 *
*/
?>
<?php get_header(); ?>
<div class="job-banner pull-left text-center" style="background:#<?php the_field('background',$post->ID);?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><?php the_field('main_title',$post->ID);?></h1>
				<h2><?php the_field('main_title',$post->ID);?></h2>
			</div>
		</div>
	</div>
</div>
<div class="position-main">
	<div class="wrapper">
		<?php echo do_shortcode('[wpjb_jobs_list]');?>
	</div>
</div>	
<?php get_footer(); ?>