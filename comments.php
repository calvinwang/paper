<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>
	<h2><?php _e('Password Protected'); ?></h2>
	<p><?php _e('Enter the password to view comments.'); ?></p>
	<?php return;
	}
}
$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ('open' == $post->comment_status) : ?>
	<h3 id="respond" class="bottom_border">Leave a Reply</h3>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
				<?php global $current_user; get_currentuserinfo(); echo get_avatar( $current_user->ID, 32 ); ?>
			<?php else : ?>
				<input type="text" name="author" id="author" class="input_text" value="<?php echo $comment_author; ?>" tabindex="1" placeholder="Name" /><input type="text" name="email" id="email" class="input_text" value="<?php echo $comment_author_email; ?>" tabindex="2" placeholder="Mail (will not be published)" />
			<?php endif; ?>
			<textarea name="comment" id="comment" class="input_text" tabindex="4"></textarea>
			<input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</form>
	<?php endif; ?>
<?php endif; ?>

<?php if ($comments) : ?>
	<h3 id="comments" class="bottom_border"><?php comments_number('No Comments', '1 Comment', '% Comments' );?></h3>
	<ol class="commentlist">
		<?php foreach ($comments as $comment) : ?>
			<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
				<div class="commentmetadata">
					<strong><?php comment_author_link() ?></strong> @ <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('Y/m/d H:i:s') ?></a>
			 		<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.'); ?></em>
			 		<?php endif; ?>
				</div>
			<?php comment_text() ?>
			</li>
		<?php endforeach; /* end for each comment */ ?>
	</ol>

	<?php else : // this is displayed if there are no comments so far ?>
		<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
		<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
		<?php endif; ?>
<?php endif; ?>
