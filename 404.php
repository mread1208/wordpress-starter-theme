<?php get_header(); ?>
	<?php get_template_part('content', 'banner'); ?>
	<section id="main">	
		<div class="container">
			<div class="primary">
				<div id="post-<?php the_ID(); ?>" class="page-content">
					<h2>Page Not Found</h2>
					<p>Sorry, the page you requested was not found.  Use the navigation links above to get back home!</p>
				</div><?php // #post ?>
			</div><?php // #primary ?>
			<?php get_sidebar(); ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
<?php get_footer(); ?>