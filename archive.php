<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<section id="banner">
			<div class="container">
				<div id="banner-image" class="blog-banner">
					<?php /* If this is a category archive */ if (is_category()) { ?>
						<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
					<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
						<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
						<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<h2>Archive for <?php the_time('F, Y'); ?></h2>
					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
					<?php /* If this is an author archive */ } elseif (is_author()) { ?>
						<h2 class="pagetitle">Author Archive</h2>
					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
						<h2 class="pagetitle">Blog Archives</h2>
					<?php } ?>
				</div><?php // #banner-image ?>
			</div><?php // .container ?>
		</section><?php // #banner ?>
		<section id="main">	
			<div class="container">
				<div class="row">
					<div id="primary" class="col-md-8">
						<?php while (have_posts()) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class('posts-page-content'); ?>>
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
								<div class="entry">
									<?php the_content(); ?>
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
					<h2>Nothing found</h2>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>
