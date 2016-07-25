<?php get_header(); ?>
	<section id="banner">
		<div class="container">
			<div id="banner-image" class="blog-banner">
				<h2>Blog</h2>
			</div><?php // #banner-image ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
	<section id="main">	
		<div class="container">
			<div class="row">
				<div id="primary" class="col-md-8">
					<?php while (have_posts()) : the_post(); ?>
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
							<div class="blog-entry">
								<p><?php $excerpt = get_the_content();
									echo string_limit_words($excerpt,50); ?>
									<br /><span class="read-more"><a href="<?php the_permalink(); ?>">Read More</a></span>
								</p>
							</div>
							<div class="postmetadata">
								<?php the_tags('Tags: ', ', ', '<br />'); ?>
								Posted in <?php the_category(', ') ?> | 
								<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
							</div>
						</div>
						<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
					<?php endwhile; ?>
					<?php if (function_exists("pagination")) {
					    pagination($post->max_num_pages);
					} ?>
				</div><?php // #primary ?>
				<?php get_sidebar(); ?>
			</div><?php // .row ?>
		</div><?php // .container ?>
	</section><?php // #banner ?>
<?php get_footer(); ?>
