<?php // Template Name: Home Page
get_header(); ?>
	<section id="banner" class="bootstrap-strip">
		<div class="container">
			<div id="image-slider">
				<ul class="bxslider">
				<?php $slider_query = new WP_query(array('post_type' => 'home_image_slider', 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'DESC'));
				if($slider_query->have_posts()) {
					while($slider_query->have_posts()) : $slider_query->the_post();
						if(has_post_thumbnail()) {
							echo '<li>'.get_the_post_thumbnail($post->ID, 'large').'</li>';
						}
					endwhile;
					wp_reset_query();
				} else { ?>
					<li><img src="<?php bloginfo('template_url'); ?>/images/main-image-1.jpg" alt="Main Home Image 1" /></li>
					<li><img src="<?php bloginfo('template_url'); ?>/images/main-image-2.jpg" alt="Main Home Image 2" /></li>
					<li><img src="<?php bloginfo('template_url'); ?>/images/main-image-3.jpg" alt="Main Home Image 3" /></li>	
				<?php } ?>
				
				</ul>
			</div><?php // #image-slider ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
	<section id="main" class="bootstrap-strip">	
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
