<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Sparxoo BP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sparxoo_bp_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'sparxoo_bp_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function sparxoo_bp_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'sparxoo-bp' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'sparxoo_bp_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function sparxoo_bp_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'sparxoo_bp_render_title' );
endif;


/*********************
SCRIPTS & ENQUEUEING
Function to shorten string by a specific character amount
ex.  truncateCharacters($title,120,"...");
*********************/
function truncateCharacters($string,$length=100,$append="...") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n",$string);
    $string = array_shift($string) . $append;
  }

  return $string;
}


/*********************
POST LOOP EXAMPLE
example function that can be modified to display any type of post data in a loop
$post_type = variable that can be used to call a specific post type for the loop
ex.  postsArray('news');  This would pull in all news post types.
*********************/
function postsArray($post_type)
{
   	global $post;
	$tmp_post = $post;
	
	$postArray = array();
	
	$args = array(
		'posts_per_page' => -1, 
		'offset'=> 0, 
		'orderby' => 'date', 
		'order' => 'DESC', 
		'post_type' => $post_type, 
		'post_status' => 'publish'  );
		
	$post_counter = 0;
	
	$myposts = get_posts( $args );
	
	foreach( $myposts as $post ) :setup_postdata($post);
		
		$post_counter++;		
		$ID = $post->ID;
		
		echo  get_the_title() . "<br>";
					
	endforeach;
	
	$post = $tmp_post; 
 }
 
/*********************
SVG with image backup
use this function when adding an svg image to the site.  This function includes a backup for non-svg browsers (checked using modernizr)
ex.  svg_png_backup('checkmark','the check');
NOTE:  the png and svg file need to have the same file name for this function to work properly
*********************/
function svg_png_backup($file_name, $alt){ ?>
	<!--[if gte IE 9]><!-->
		<img class="svg-icon" src="<?= get_bloginfo('stylesheet_directory') . '/images/svg/' . $file_name ?>.svg" alt="<?= $alt ?>">
	<!--<![endif]-->

	<img class="nonsvg-icon-backup" src="<?= get_bloginfo('stylesheet_directory') . '/images/' . $file_name ?>.png" alt="<?= $alt ?>">
<?php }


/*********************
IMG ID TO IMG TAG
use this function when you want to output an img tag from an image id.
ex.  imageIDtoTag(565,'banner-image');  The first paramater is the image ID and the second is the present image size (large, medium, exc.)
*********************/
function imageIDtoTag($ID, $image_size){
	$imgObj = wp_get_attachment_image_src($ID, $image_size, false);
	$imgAlt = get_post_meta($imgObj, '_wp_attachment_image_alt', true);
	$imgURL = $imgObj[0];	

	return "<img src='" . $imgURL . "' alt='" . $imgAlt . "' />";
}