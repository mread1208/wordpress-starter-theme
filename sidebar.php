<div id="sidebar" class="col-md-4">
	<?php if(is_home() || is_archive() || is_search() || is_single()) { ?>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Widgets')) : else : ?>
    
    <?php endif; ?>
	<?php } else if(is_front_page()) { ?>
	
	<?php } else { ?>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
	    
	    <?php endif; ?>
	<?php } ?>
</div> <!-- /.sidebar -->