<?php get_header(); ?>
	<section id="banner">
		<div class="container">
			<div id="banner-image">
				<?php if(has_post_thumbnail()) { 
					the_post_thumbnail('large');
				} else {
					echo '<img src="'.get_bloginfo('template_url').'/img/page-banner-default.jpg" alt="'.get_the_title().' Banner Image" />';	
				} ?>
			</div><?php // #banner-image ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
	<section id="main">	
		<div class="container">
			<div class="row">
				<div id="primary" class="col-md-8">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" class="page-content">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
						</div><?php // #post ?>
					<?php endwhile; endif; ?>
				</div><?php // #primary ?>
				<?php get_sidebar(); ?>
			</div><?php // .row ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
<?php get_footer(); ?>