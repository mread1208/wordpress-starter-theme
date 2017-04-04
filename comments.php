<div id="comments">
	<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
			die ('Please do not load this page directly. Thanks!');
		if ( post_password_required() ) { ?>
			This post is password protected. Enter the password to view comments.
		<?php
			return;
		} ?>
	
	<?php if ( have_comments() ) : ?>
		<h2><?php comments_number('No Responses', 'Comment', '% Comments' );?></h2>
		<ul class="commentlist">
			<?php wp_list_comments(array(
			    'style'       => 'li',
			    'short_ping'  => true,
			    'avatar_size' => 120,
			    'callback' 	  => 'format_comment'
			)); ?>
		</ul>
	 <?php else : // this is displayed if there are no comments so far ?>
		<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
		 <?php else : // comments are closed ?>
			<p>Comments are closed.</p>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( comments_open() ) : ?>
		<div id="respond">
			<h2><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h2>
			<div class="cancel-comment-reply">
				<?php cancel_comment_reply_link(); ?>
			</div>
			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( is_user_logged_in() ) : ?>
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
				<?php else : ?>
					<div class="form-group">
						<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo "aria-required='true'"; ?> />
						<label for="author">Name <?php if ($req) echo "(required)"; ?></label>
					</div>
					<div class="form-group">
						<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo "aria-required='true'"; ?> />
						<label for="email">Email (will not be published) <?php if ($req) echo "(required)"; ?></label>
					</div>
					<div class="form-group">
						<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" />
						<label for="url">Website</label>
					</div>
				<?php endif; ?>
				<div class="form-group">
					<textarea name="comment" id="comment" class="form-control" rows="6" ></textarea>
				</div>
				<input name="submit" type="submit" class="btn btn-primary" value="Submit Comment" />
				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
			<?php endif; // If registration required and not logged in ?>
		</div>
	<?php endif; ?>
</div><?php // #comments ?>