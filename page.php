<?php get_header(); ?>

<div id="container">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<p class="date"><?php the_time('F j, Y') ?></p>
				<div class="entry">
					<?php the_content(); ?>
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