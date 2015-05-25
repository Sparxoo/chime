<?php
/*
 Template Name: Contact Page
 *
*/
?>
<?php get_header(); ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
<script type="text/javascript">
function initialize() {
    var loc, map, marker, infobox;
    
    loc = new google.maps.LatLng(33.5749881, -84.35139529999998);
 
    
    map = new google.maps.Map(document.getElementById("map"), {
         
         center: loc,
       
          zoom: 10,
      panControl: false,
    zoomControl: false,
    scaleControl: false,
	  draggable: false,
	  scrollwheel: false,
    mapTypeControl: false,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    marker = new google.maps.Marker({
        map: map,
        position: loc,
        visible: true
    });

    infobox = new InfoBox({
         content: '<div itemtype="http://schema.org/Organization" itemscope="" class="location-information text-center"> '+
      '<div class="address-section">'+
      '<span itemprop="name" class="location-name"><?php the_field('company_name', $post->ID);?><br></span>'+
      '<span itemprop="streetAddress"><?php the_field('company_street', $post->ID);?> | </span>'+
      '<span itemprop="addressLocality"><?php the_field('location', $post->ID);?>, </span>'+
      '<span itemprop="addressRegion"><?php the_field('region', $post->ID);?></span>' +
      '<span itemprop="postalCode"><?php the_field('postal_code', $post->ID);?></span><br>'+
      '<span itemprop="telephone"><a href="tel:<?php the_field('number', $post->ID);?>"><?php the_field('display_contact_number', $post->ID);?></a></span>	'+
      '</div>',
         disableAutoPan:  false,
         maxWidth: 150,
         pixelOffset: new google.maps.Size(-140, 0),
         zIndex: null,
         boxStyle: {
            //background: "url('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/examples/tipbox.gif') no-repeat",
            //opacity:1,
            //width: "280px"
        },
        //closeBoxMargin: "12px 4px 2px 2px",
        closeBoxURL: "<?php echo get_template_directory_uri(); ?>/images/close.png",
        infoBoxClearance: new google.maps.Size(1, 1)
    });
    
    google.maps.event.addListener(marker, 'click', function() {
        infobox.open(map, this);
        map.panTo(loc);
    });
     infobox.open(map, marker);
        map.panTo(loc);
}
google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>

<body>
    <div class="contact-map-outer"><div id="map" style="height: 451px;width: 100%;"></div>
    </div>


<div class="contact-main">
	<div class="container">
		<div class="row">
			<div class="col-md-1 col-sm-1 col-xs-1"></div>
			<div class="col-md-10 col-sm-10 col-xs-10 padding0">
				<?php 
					$page_id = get_the_ID();
					$form_id = get_post_meta($page_id, 'form', true);
					echo do_shortcode('[gravityform id="'.$form_id.'" title="true" description="false"]');
				?>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1"></div>
		</div>
	</div>
</div>		
<?php get_footer(); ?>