<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Book
 * @since Book 100
 */

get_header(); ?>


	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'book' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
		</header>

		<?php book_content_nav( 'nav-above' ); ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'search' ); ?>

		<?php endwhile; ?>

		<?php book_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'search' ); ?>

	<?php endif; ?>


<?php get_footer(); ?>