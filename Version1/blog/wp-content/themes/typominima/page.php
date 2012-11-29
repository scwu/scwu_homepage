<?php get_header(); ?>

		<!-- Start: Content -->
		<div id="content">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<div class="post-title"><h2><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
				
				<div class="post-content full-width">
					<?php the_content('Read more...'); ?>
					<?php wp_link_pages('before=<p class="pagination full-width"><strong>Pages:</strong>&after=</p>&pagelink=<span>%</span>'); ?>
				</div>

				<div class="clear"></div>
			</div>

			<?php endwhile; ?>

			<?php else : ?>
			<div class="post">
				<div class="post-title"><h2>Nothing found</h2></div>

				<div class="post-content full-width">
					Sorry, but the information you are looking for, could not be found.
				</div>
				<div class="clear"></div>
			</div>
			<?php endif; ?>
		</div>
		<!-- End: Content -->

<?php get_footer(); ?>