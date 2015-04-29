<?php
/*
* HERO BANNER
* Include this file at the top of a page or post template to add the Hero Banner to the page
* If you don't already see the Hero Banner Settings in the Custom Field section when logged in as an 
* admin then you will need to import the settings.  You can find the import in the CUSTOM FIELDS IMPORT/INITIAL_INCLUDES folder.
*
* NOTE:  This is just a default setup for the Hero Banner.  Each site will be a little different so you can add or remove fields as you * see fit.
*/

if (have_posts()) : while (have_posts()) : the_post();
	//grab the current post ID
	$currID = get_the_ID();
	
	//get the hero image url, width, and height for the large image
    if( $thumbnail_id = get_post_thumbnail_id(get_the_ID() ) ) {
        list($hero_image,$width,$height) = wp_get_attachment_image_src($thumbnail_id,'hero-banner',false);
    }
		
	//get the hero image url, width, and height for the smaller mobile image
    if( $thumbnail_id = get_post_thumbnail_id(get_the_ID() ) ) {
        list($hero_mobile,$width_mobile,$height_mobile) = wp_get_attachment_image_src($thumbnail_id,'mobile-large',false);
    }	
	
	$hero_alt = get_post_meta(get_post_thumbnail_id(get_the_ID()) , '_wp_attachment_image_alt', true);
	
	//basic banner information
	$hero_title = get_field('hero_title');
	$hero_description = get_field('hero_description');
	
	$parallax = get_field('parallax_banner');
	$bannerFormat = get_field('video_or_photo');
	
	//grab the video urls
	$video_webm = get_field('video_webm');
	$video_mp4 = get_field('video_mp4');
	$video_ogg = get_field('video_ogg');
	$video_3gp = get_field('video_3gp');
	$video_flv = get_field('video_flv');
	
	//if this is a parallax hero image then add the parallax data
	$parallaxData = ($parallax == 'Yes' && $bannerFormat == 'Photo' ? 'data-top="background-position: 50% 0px;" data-top-bottom="background-position: 50% -120px;" data-anchor-target="#hero"' : '');
		
endwhile; endif ;
?>
		
<?php //check to make sure an image or video is present. ?>

<?php if(has_post_thumbnail() || $videoWebm || $videoMp4 || $video_ogg):?>
				
		<section id="hero">
			<?php /* ?><div style="background-image:url('<?php print $hero_image ?>');" class="hero-image" <?= $parallaxData; ?> ><?php */?>
				<div class="hero-image">
					<?php
					//add the image to use for the mobile version of the site.
					//TODO:  Figure out how to do this without having an extra image loaded to the site.
					?>
					<!--<div id="mobile-hero-image">
						<?php // display the title differently for the mobile site. ?>
						<img src="<?php //print $hero_mobile; ?>" alt="<?= $hero_alt ?>">
					</div>-->
				<?php if($hero_image !='') {?>
					<img src="<?php print $hero_image ?>" alt="<?= $hero_alt ?>">
				<?php }?>
				
				<?php if($hero_title): ?>
					<div class="title">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<?php print $hero_title; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
					<?php
					//do the following if the title or description exists
					if($hero_title || $hero_description): ?>
						<div class="hero-info">
							
							<?php if($hero_description): ?>
								<div class="container">
									<div class="row">
										<div class="col-md-8 col-sm-8 col-xs-8 pull-right padding0">
											<div class="description"><?php print $hero_description; ?></div>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					
					<?php 
					//do the following if this is a video header
					if($bannerFormat == 'Video'): ?>
						<div id="hero-banner-video">
							<video preload="auto" class="video-playing" autoplay loop>
							  <source src="<?php print $video_mp4['url']; ?>" type="video/mp4">
							  <source src="<?php print $video_webm['url']; ?>" type="video/webm">
							  <source src="<?php echo $video_ogg['url']; ?>" type="video/ogg">	  
							  <source src="<?php echo $video_3gp['url']; ?>" type="video/3gp">	  
							  <source src="<?php echo $video_flv['url']; ?>" type="video/flv">	
							  Your browser does not support HTML5 video.
							</video>
						</div>
					<?php endif; ?>
			</div>

		</section>

<?php endif; ?>