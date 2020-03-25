<div id="content">
	<?php
		if (have_posts()):
	while (have_posts()) : the_post(); ?>
	<article id="main_article_single">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(  ); ?></a></h2>
		<div id="imgp_wrap">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<!-- <?php $a = the_content() ?> -->
			<p><?php echo content('50'); ?></p>
		</div>
	</article>
	<?php	endwhile;
	endif;
	?>
	<!-- paganiations in functions -->
	<?php if (function_exists("pagination")) {    pagination($additional_loop->max_num_pages);} ?>
	
	
</div>