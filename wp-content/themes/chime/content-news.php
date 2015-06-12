<?php 
$title = get_field('news_title');
$text = get_field('news_text');
$image = get_field('news_image');
$image_alt = $image['alt'];
$image_url = $image['url'];
$link_text = get_field('news_link_text');
$news_link = get_field('news_link');
$news_bg = get_field('news_background');?>

<section class="in-the-news" style="background-image:url('<?php echo $news_bg; ?>');">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<img src="<?php echo $image_url; ?>" alt="">
			</div>
			<div class="col-sm-8">
				<h2 class="text-uppercase"><?php echo $title; ?></h2>
				<?php echo $text; ?>
					<div class="row">
						<div class="col-md-12">
						<a class="news-link" href="<?php echo $news_link; ?>"><?php echo $link_text; ?></a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>