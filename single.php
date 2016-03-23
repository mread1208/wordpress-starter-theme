<?php get_header(); ?>
	<section id="banner">
		<div class="container">
			<div id="banner-image" class="blog-banner">
				<h2>Blog</h2>
			</div><?php // #banner-image ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
	<section id="main">	
		<div class="container">
			<div class="row">
				<div id="primary" class="col-md-8">
					<?php while (have_posts()) : the_post(); ?>
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
							<div class="blog-entry">
								<?php the_content(); ?>
								<p><?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?></p>
								<?php the_tags( 'Tags: ', ', ', ''); ?>
							</div><?php //blog-entry ?>
							<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
							<?php comments_template(); ?>
						</div><?php // .post ?>
					<?php endwhile; ?>
				</div><?php // #primary ?>
				<?php get_sidebar(); ?>
			</div><?php // .row ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
<?php get_footer(); ?>