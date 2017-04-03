<?php get_header(); ?>
	<?php get_template_part('content', 'banner'); ?>
	<section id="main">	
		<div class="container">
			<div class="row">
				<div id="primary" class="col-md-8">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class('posts-page-content'); ?>>
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
								<div class="entry">
									<?php the_content(); ?>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						<h2>No posts found</h2>
					<?php endif; ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>
