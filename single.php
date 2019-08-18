<?php get_header(); ?>
	<?php get_template_part('content', 'banner'); ?>
	<section id="main">	
		<div class="container">
			<div class="content-container">
				<div class="primary">
					<?php while (have_posts()) : the_post(); ?>
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							
							<div class="postmetadata">
								<?php the_tags('Tags: ', ', ', '<br />'); ?>
								Posted in <?php the_category(', ') ?> | 
								<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
							</div>
							<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
							<?php comments_template(); ?>
						</div><?php // .post ?>
					<?php endwhile; ?>
				</div><?php // #primary ?>
				<?php get_sidebar(); ?>
			</div>
		</div><?php // .container ?>
	</section><?php // #main ?>
<?php get_footer(); ?>