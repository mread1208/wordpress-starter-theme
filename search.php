<?php get_header(); ?>
	<?php get_template_part('content', 'banner'); ?>
	<section id="main" class="wrapper wrapper--white">	
		<div class="container">
			<div class="content-container">
				<div class="primary">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class('posts-page-content'); ?>>
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
								<div class="entry">
									<?php the_excerpt(); ?>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						<h2>Sorry, No Posts Found</h2>
						<p>Use the navigation links above or try searching again.</p>
					<?php endif; ?>
				</div><?php // #primary ?>
				<?php get_sidebar(); ?>
			</div>
		</div><?php // .container ?>
	</section><?php // #banner ?>
<?php get_footer(); ?>
