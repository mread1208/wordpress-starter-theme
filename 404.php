<?php get_header(); ?>
	<section id="banner">
		<div class="container">
			<div id="banner-image" class="blog-banner">
				<h2>Error 404</h2>
			</div><?php // #banner-image ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
	<section id="main">	
		<div class="container">
			<div class="row">
				<div id="primary" class="col-md-8">
					<div id="post-<?php the_ID(); ?>" class="page-content">
						<h2>Page Not Found</h2>
						<p>Sorry, the page you requested was not found.  Use the navigation links above to get back home!</p>
					</div><?php // #post ?>
				</div><?php // #primary ?>
				<?php get_sidebar(); ?>
			</div><?php // .row ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
<?php get_footer(); ?>