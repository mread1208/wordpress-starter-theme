<?php get_header(); ?>
	<?php get_template_part('content', 'banner'); ?>
	<section id="main" class="wrapper wrapper--white">	
		<div class="container">
			<div class="content-container">
				<div class="primary">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" class="page-content">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
						</div><?php // #post ?>
					<?php endwhile; endif; ?>
				</div><?php // #primary ?>
				<?php get_sidebar(); ?>
			</div>
		</div><?php // .container ?>
	</section><?php // #banner ?>
<?php get_footer(); ?>