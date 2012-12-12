<?php get_header(); ?>

<div id="container">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content(); ?>
					<p class="postmetadata">
						<?php link_pages("<p><code>Pages:</strong>", "</p>", "number"); ?>
						<?php edit_post_link("Edit", "<p>", "</p>"); ?>
					</p>
				</div>
			</div>
		<?php endwhile; ?>
	<?php else : ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php _e("Not Found"); ?></h2>
		</div>
	<?php endif ?>
</div>

<?php get_footer(); ?>