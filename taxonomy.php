<?php get_header(); ?>
	<section id="banner">
		<div class="container">
			<div id="banner-image" class="blog-banner">
				<h2>Title Here</h2>
			</div>
		</div>
	</section>
	<section id="main">	
		<div class="container">
			<div class="row">
				<div id="primary" class="col-md-8">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="blog-entry">
							<?php the_content(); ?>
						</div><?php // .blog-entry ?>
					<?php endwhile; ?>
					<?php else : ?>
						<h2>Nothing found</h2>
					<?php endif; ?>
				</div>
				<?php get_sidebar(); ?>
			</div><?php // .row ?>
		</div><?php //.container ?>
	</section>
<?php get_footer(); ?>
