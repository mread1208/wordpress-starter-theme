<?php get_header(); ?>
	<?php get_template_part('content', 'banner'); ?>
	<section id="main">	
		<div class="container">
			<div class="primary">
				<?php while (have_posts()) : the_post(); ?>
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
						<div class="postmetadata">
							<?php the_tags('Tags: ', ', ', '<br />'); ?>
							Posted in <?php the_category(', ') ?> | 
							<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
						</div>
					</div>
					<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
				<?php endwhile; ?>
			</div><?php // #primary ?>
			<?php get_sidebar(); ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
<?php get_footer(); ?>
