<div class="services-section pull-left">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12 pull-left">
				<div class="services-left pull-left">
					<img src="<?php bloginfo('template_url');?>/images/customer-care-animation.png" alt="" usemap="#Map">	
					<map name="Map" id="Map">
						<area shape="poly" coords="168,35,179,35,187,33,197,33,210,33,224,34,231,33,239,34,249,35,261,36,272,39,288,43,302,47,345,65,354,69,362,74,369,78,377,83,383,89,390,93,398,100,406,106,413,113,420,118,427,126,434,133,442,142,449,150,455,159,462,170,467,176,469,181,472,185,433,207,424,192,422,186,415,177,408,169,401,161,392,152,384,144,372,132,356,122,341,112,324,103,305,94,292,90,275,84,267,83,258,81,245,78,235,78,222,77,206,75,198,77,189,78,185,78,177,78,173,79,168,34" href="#customer-care" />
						<area shape="poly" coords="177,105,190,104,199,104,213,103,229,104,242,105,254,108,262,109,273,112,285,116,297,120,308,125,318,131,328,136,336,141,342,145,348,150,356,156,363,162,371,169,376,176,383,183,391,191,400,204,405,212,409,219,373,241,368,232,364,225,359,218,350,208,339,197,327,186,318,180,311,174,284,160,268,155,251,150,234,147,225,146,209,146,199,147,192,147,187,147,184,148,176,105" href="#seasonal-support" />
						<area shape="poly" coords="186,168,196,166,227,166,241,169,254,172,264,174,275,179,287,184,299,191,308,197,320,206,334,221,343,232,350,241,355,248,357,251,321,270,313,257,286,232,280,227,268,220,257,215,247,211,228,207,201,207,193,207,186,169" href="#bpo" />
					</map>
				</div>
			</div>
			<div class="col-md-5 col-sm-4 col-xs-5 pull-right">
				<div class="services-right">
					<div class="top text-center">
						<h3><?php the_field('service_section_title', 19938);?></h3>
						<p>( <?php the_field('service_description', 19938);?> )</p>
					</div>
					<?php query_posts( 'posts_per_page=3&post_parent=19940&post_type=page' );?>
					<?php while ( have_posts() ) : the_post();?>
						<div id="<?php echo($post->post_name) ?>" class="service pull-left animated">
							<span><?php the_field('service_title',$post->ID);?></span>
							<?php the_field('service_overview',$post->ID);?>
							<a href="<?php the_permalink();?>">learn more</a>
						</div>
					<?php endwhile; wp_reset_query();?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="services-section-mobile pull-left">
	<div class="container">
		<div class="row">
			<h3 class="text-center"><?php the_field('service_section_title', 19938);?></h3>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php query_posts( 'posts_per_page=3&post_parent=19940&post_type=page' );?>
				<?php while ( have_posts() ) : the_post();?>
					<div class="service-mobile pull-left">
						<div class="image pull-left">
							<img src="<?php the_field('mobile_service_image',$post->ID);?>" alt="">
						</div>
						<div class="text text-center pull-right">							
							<span><?php the_field('mobile_service_title',$post->ID);?></span>
						</div>
					</div>
				<?php endwhile; wp_reset_query();?>
			</div>
			
		</div>
	</div>
</div>