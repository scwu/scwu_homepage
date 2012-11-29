<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Book
 * @since Book 100
 */

get_header(); ?>


	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php book_content_nav( 'nav-below' ); ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template( '', true );
		?>

	<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>