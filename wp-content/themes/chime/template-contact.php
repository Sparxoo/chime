<?php
/*
 Template Name: Contact Page
 *
*/
?>
<?php get_header(); ?>
<?php 
	//add the hero banner to the header.
	get_template_part("content", "hero"); 
?>
<div class="contact-main">
	<div class="container">
		<div class="row">
			<div class="col-md-1 col-sm-1 col-xs-12"></div>
			<div class="col-md-10 col-sm-10 col-xs-12">
				<?php echo $form_id = get_post_meta($page_id, 'form', true);
					echo do_shortcode('[gravityform id="'.$form_id.'" title="true" description="false"]');
				?>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-12"></div>
		</div>
	</div>
</div>		
<?php get_footer(); ?>