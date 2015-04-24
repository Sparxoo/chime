<?php
/*
 Template Name: Contact Page
 *
*/
?>
<?php get_header(); ?>
<?php 
	//add the hero banner to the header.
	//get_template_part("content", "hero"); 
?>
<div class="contact-map-outer">
	<div id="contact-map" style="height: 451px;width: 100%;"></div>
	<div itemtype="http://schema.org/Organization" itemscope="" class="location-information text-center"> 
		<div class="address-section">
			<span itemprop="name" class="location-name"><?php the_field('company_name', $post->ID);?><br></span>
			<span itemprop="streetAddress"><?php the_field('company_street', $post->ID);?> | </span>
			<span itemprop="addressLocality"><?php the_field('location', $post->ID);?>, </span>
			<span itemprop="addressRegion"><?php the_field('region', $post->ID);?></span>
			<span itemprop="postalCode"><?php the_field('postal_code', $post->ID);?></span><br>
			<span itemprop="telephone"><a href="tel:<?php the_field('number', $post->ID);?>"><?php the_field('display_contact_number', $post->ID);?></a></span>		
		</div>
	</div>
</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAC1bhAKKlW-4YIJgaiGMlOrCKWMZ_aSDo"></script>
<script type="text/javascript">
           
  var geocoder;
  var map;
  var address1 = "Chime HQ 1000 Southlake Cir | Morrow, GA 30260";
 // var address1 = "new york, usa";
   initialize(address1);
  //var address ="San Diego, CA";
  function initialize(address1) {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-84.351395, 33.574988);
    var myOptions = {
      zoom: 10,
      center: latlng,
    mapTypeControl: false,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("contact-map"), myOptions);
    if (geocoder) {
      geocoder.geocode( { 'address': address1}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          map.setCenter(results[0].geometry.location);

            var infowindow = new google.maps.InfoWindow(
                { content: '<div class="mapSec"><div class="toolTip" style="overflow:auto" ><a href="javascript:void(0);">'+address1+'</a></div></div>',
                  size: new google.maps.Size(150,50)
                });

            var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map, 
                title:address1
            }); 
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });

          } else {
            alert("No results found");
          }
        } else {
          alert("Geocode was not successful for the following reason: " + status);
        }
      });
    }
  }
</script>
<div class="contact-main">
	<div class="container">
		<div class="row">
			<div class="col-md-1 col-sm-1 col-xs-12"></div>
			<div class="col-md-10 col-sm-10 col-xs-12 padding0">
				<?php 
					$page_id = get_the_ID();
					$form_id = get_post_meta($page_id, 'form', true);
					echo do_shortcode('[gravityform id="'.$form_id.'" title="true" description="false"]');
				?>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-12"></div>
		</div>
	</div>
</div>		
<?php get_footer(); ?>