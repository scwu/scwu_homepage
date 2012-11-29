<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Book
 * @since Book 100
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
		<?php get_sidebar( 'footer' ); ?>

		<div class="site-info">
			<?php do_action( 'book_credits' ); ?>
			<?php _e( 'Proudly powered by', 'book' ); ?> <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'book' ); ?>" rel="generator" class="italic">WordPress</a>. <?php printf( __( 'Theme: %1$s by %2$s.', 'book' ), 'Book Lite', '<a href="http://wpshoppe.com/" rel="designer" class="italic">WPshoppe</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>