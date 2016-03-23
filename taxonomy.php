<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			<?php if (have_posts()) :
				$post = $posts[0]; // Hack. Set $post so that the_date() works.
				while (have_posts()) : the_post(); ?>
					<div class="blog-entry">
						<?php the_content(); ?>
					</div><?php // .blog-entry ?>
					<div class="postmetadata">
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
						Posted in <?php the_category(', ') ?> | 
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					</div>
				<?php endwhile; ?>
				<?php get_template_part('inc/pagination.php'); ?>
			<?php else : ?>
		
				<h2>Nothing found</h2>
		
			<?php endif; ?>
			</div><?php // .col-md-8 ?>
			<?php get_sidebar(); ?>
		</div><?php // .row ?>
	</div><?php //.container ?>
<?php get_footer(); ?>
