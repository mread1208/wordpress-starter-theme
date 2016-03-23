<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<section id="banner">
			<div class="container">
				<div id="banner-image" class="blog-banner">
					<h2><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				</div>
			</div>
		</section>
		<section id="main">	
			<div class="container">
				<div class="row">
					<div id="primary" class="col-md-8">
						<?php while (have_posts()) : the_post(); ?>
							<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
								<h2><?php the_title(); ?></h2>
								<div class="entry">
									<?php the_excerpt(); ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</section>
	<?php else : ?>
		<section id="banner">
			<div class="container">
				<div id="banner-image" class="blog-banner">
					<h2>No Posts Found</h2>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>
