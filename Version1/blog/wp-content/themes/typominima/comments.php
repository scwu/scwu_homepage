<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="alert">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<div class="comments-wrap">
	<h2 id="comments" class="section-header">This entry has <?php comments_number('no comments','one comment','% comments'); ?></h2>
	<?php if ( have_comments() ) { ?>
	<ul class="comment-list">
		<?php wp_list_comments('type=comment&callback=respond_comment'); ?>

		<li class="comment-feed"><?php post_comments_feed_link($link_text = 'Click here to subscribe to the comment feed via RSS'); ?></li>
	</ul>
	<?php }
	if ( !have_comments() ) {
		if ( comments_open() ) {
			//If comments are open, but there are no comments.
			echo '<p class="comment-alert">You have a wonderful opportunity to <a href="#respond" title="Add a comment">be the first to comment</a>!</p>'; 
		} else  {
			//If comments are closed.
			echo '<p class="comment-alert">Sorry, but comments closed.</p>';
		}
	} ?>
</div>


<?php if ( comments_open() ) : ?>

<div class="comments-wrap">
	<h2 id="respond" class="section-header">Leave a comment</h2>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) { echo '<p class="comment-alert">You must be <a href="'.wp_login_url( get_permalink() ).'" title="Click to log in">logged in</a> to post a comment.'; }
	else {
	?>
	<div class="comment-form">
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" name="commentform">
			<?php if ( is_user_logged_in() ) : ?>
			<p class="login-meta">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
			<?php else : ?>
			<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			<label for="author">Name <?php if ($req) echo "(required)"; ?></label></p>

			<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			<label for="email">Mail <?php if ($req) echo "(required)"; ?></small></label></p>

			<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			<label for="url">Website</label></p>
			<?php endif; ?>
			<p><textarea name="comment" id="comment" cols="" rows="10" tabindex="4"></textarea><label for="comment">Comment</label></p>

			<p><button type="submit" name="submit" id="submit">Have your say!</button></p>

			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	</div>
	<?php } ?>
</div>


<?php endif; // if you delete this the sky will fall on your head ?>