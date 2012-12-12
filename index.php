<?php get_header(); ?>

<div id="container">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<div id="navi" class="clearfix">
			<div class="previous"><?php next_posts_link('Previous','') ?></div>
			<div class="next"><?php previous_posts_link('Next') ?></div>
		</div>
	<?php else : ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php _e("Not Found"); ?></h2>
		</div>
	<?php endif ?>
</div>

<?php get_footer(); ?>