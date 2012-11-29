<?php get_header(); ?>

		<!-- Start: Content -->
		<div id="content">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="post-title"><h2><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
				
				<div class="post-content">
					<?php the_content('Read more...'); ?>
					<?php wp_link_pages('before=<p class="pagination"><strong>Pages:</strong>&after=</p>&pagelink=<span>%</span>'); ?>
				</div>

				<div class="post-metas">
					<dl>
						<dt><span>Author name:</span></dt>
						<dd><?php the_author_posts_link(); ?></dd>
						
						<?php if(isset($typominima['single_date']) && $typominima['single_date']==1) { ?>
						<dt><span>Publish date:</span></dt>
						<dd><?php the_time('F jS, Y') ?></dd>						
						<?php } ?>

						<?php if(isset($typominima['single_comments']) && $typominima['single_comments']==1) { ?>
						<dt><span>Discussion:</span></dt>
						<dd>
							<?php
							$comment_count = get_comments_number();
							$comment_link = '#comments';
							$comment_text = 'Comments';
							if ($comment_count==0) { $comment_count = 'No'; $comment_link = '#respond'; }
							if ($comment_count==1) { $comment_text = 'Comment'; }
							?>
							<a href="<?php echo $comment_link; ?>"><?php echo $comment_count.' '.$comment_text; ?></a>
						</dd>
						<?php } ?>

						<?php if(isset($typominima['single_categories']) && $typominima['single_categories']==1) { ?>
						<dt><span>Categories:</span></dt>
						<dd><?php the_category('<br />'); ?></dd>
						<?php } ?>

						<?php if(isset($typominima['single_tags']) && $typominima['single_tags']==1) { ?>
						<dt><span>Tags:</span></dt>
						<dd><?php the_tags('', '<br />', ''); ?> </dd>
						<?php } ?>
					</dl>

					<?php if(isset($typominima['single_author_info']) && $typominima['single_author_info']==1) { ?>
					<dl class="mt40">
						<dt><span>About <?php the_author_posts_link(); ?>:</span></dt>
						<dd class="author-description">
							<?php
							if(get_the_author_meta('user_email')) { echo get_avatar( get_the_author_meta('user_email'), 40, $default = get_bloginfo('template_directory') . '/img/gravatar.gif' ); }
							the_author_meta( 'description' );
							if (get_the_author_meta('twitter') || get_the_author_meta('facebook') || get_the_author_meta('linkedin') || get_the_author_meta('user_url')) { echo '<div class="clear"></div>'; }

							if (get_the_author_meta('twitter')) { echo '<br /><a href="http://twitter.com/'.get_the_author_meta('twitter').'" target="_blank" class="author-contact">Follow on Twitter</a>'; }

							if (get_the_author_meta('facebook')) { echo '<br /><a href="http://www.facebook.com/'.get_the_author_meta('facebook').'" target="_blank" class="author-contact">Connect on Facebook</a>'; }

							if (get_the_author_meta('linkedin')) { echo '<br /><a href="http://www.linkedin.com/in/'.get_the_author_meta('linkedin').'" target="_blank" class="author-contact">View on Linked</a>'; }

							if (get_the_author_meta('user_url')) { echo '<br /><a href="'.get_the_author_meta('user_url').'" target="_blank" class="author-contact">Visit website</a>'; }
							?>
						</dd>
					</dl>
					<?php } ?>
				</div>

				<div class="clear"></div>
			</div>

			<?php endwhile; ?>

			<?php comments_template(); ?>

			<?php else : ?>
				<div class="post">
					<div class="post-title"><h2>Nothing found</h2></div>

					<div class="post-content full-width">
						Sorry, but the information you are looking for, could not be found.
					</div>
				</div>
			<?php endif; ?>
		</div>
		<!-- End: Content -->

<?php get_footer(); ?>