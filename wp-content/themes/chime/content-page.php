<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Sparxoo BP
 */
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12"><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'sparxoo-bp' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php edit_post_link( __( 'Edit', 'sparxoo-bp' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->
	</div>
	</div>
</div>
