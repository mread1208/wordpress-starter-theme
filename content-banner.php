<section id="banner">
	<?php if(is_front_page() && is_home()) {
		$bannerTitle =  get_bloginfo('description');
	} else if (is_home() || is_singular('post')){
		if(!get_the_title(get_option('page_for_posts', true))) {
			$bannerTitle = get_the_title(get_option('page_for_posts', true));
		} else {
			$bannerTitle =  get_bloginfo('description');
		}
	} else if (is_post_type_archive()) {
		$bannerTitle =  post_type_archive_title('', false);
	} else if (is_category()) {
		$bannerTitle = 'Archive for the &#8216;'.single_cat_title('', false).'&#8217; Category';
	} else if (is_tag()) {
		$bannerTitle = 'Posts Tagged &#8216;'.single_tag_title().'&#8217;';
	} else if (is_day()) {
		$bannerTitle = 'Archive for &#8216;'.the_time('F jS, Y').'&#8217;';
	} else if (is_month()) {
		$bannerTitle = 'Archive for &#8216;'.the_time('F, Y').'&#8217;';
	} else if (is_year()) {
		$bannerTitle = 'Archive for &#8216;'.the_time('Y').'&#8217;';
	} else if (is_author()) {
		$bannerTitle = 'Author Archive';
	} else if (is_404()){
		$bannerTitle = 'Error - 404';
	} else {
		$bannerTitle = get_the_title(); 
	} ?>
	<div class="container">
		<h1><?= $bannerTitle; ?></h1>
	</div><?php // .container ?>
</section><?php // #banner ?>