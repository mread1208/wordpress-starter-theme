<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if (have_posts()) : ?>
			
					<h2><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			
					<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
			
					<?php while (have_posts()) : the_post(); ?>
			
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
							<h2><?php the_title(); ?></h2>
			
							<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
			
							<div class="entry">
			
								<?php the_excerpt(); ?>
			
							</div>
			
						</div>
			
					<?php endwhile; ?>
			
					<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
			
				<?php else : ?>
			
					<h2>No posts found.</h2>
			
				<?php endif; ?>
			</div><?php // .col-md-8 ?>
			<?php get_sidebar(); ?>
		</div><?php // .row ?>
	</div><?php // .container ?>
<?php get_footer(); ?>
