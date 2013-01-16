<?php get_header(); ?>

<div id="container">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="navi clearfix">
					<div class="previous"><?php next_post_link('%link', '&#8592; 上一篇：%title') ?></div>
				</div>

				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p class="date"><?php the_time('F j, Y') ?></p>
				<div class="entry">
					<?php the_content(); ?>
				</div>

				<div class="navi clearfix">
					<div class="next"><?php previous_post_link('%link', '下一篇：%title &#8594;') ?></div>
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