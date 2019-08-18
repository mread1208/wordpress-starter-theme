<?php $bannerTitle = "";
$bannerImg = "";

if (is_home() || is_singular('post')){
	if(get_the_title(get_option('page_for_posts', true))) {
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
}

if(is_search() || is_archive() || is_404() || is_category() || is_tag() 
|| is_day() || is_month() || is_year() || is_author()) {
	$bannerImg = get_the_post_thumbnail_url(get_option( 'page_for_posts'), "full");
} else if(has_post_thumbnail()) {
	$bannerImg = get_the_post_thumbnail_url($post->ID, "full");
// Check if sub page, grab parent thumbnail
} else if(is_page() && $post->post_parent > 0) {
	$bannerImg = get_the_post_thumbnail_url($post->post_parent, "full");
}
// If post and still blank, grab posts page thumbnail
if(is_singular("post")) {
	if($bannerImg == "") {
		$bannerImg = get_the_post_thumbnail_url(get_option( 'page_for_posts'), "full");
	}
}
// If still blank, get default from customizer
if($bannerImg == "") {
	$bannerImg = get_theme_mod( 'default_banner' );
} ?>
<section class="banner" style="background-image: url('<?= $bannerImg; ?>');'">
	<div class="container">
		<div class="banner--content">
			<h1 class="banner--content--title"><?= $bannerTitle; ?></h1>
		</div>
	</div><?php // .container ?>
</section><?php // #banner ?>