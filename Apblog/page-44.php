<?php get_header()?>
<div class="content_wrapper">
	<h1 style="color:red;">Hello World i am About Page Page </h1>
	<div class="left_content">
		<?php
			if(have_posts()):
		while (have_posts()):the_post(); ?>
		<article>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="featured_image">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail()?></a>
			</div>
			<div class="post_meta">
				Posted By: <?php the_author_posts_link(  );?> || Posted On : <?php the_time( 'M d,Y' )?> || Posted In <?php the_category( ',' )?> || <?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');  ?>
			</div>
			<p><?php echo the_content(); ?></p>
		</article>
		<?php endwhile;
			endif;
		?>
	</div>
	<!-- <div class="sidebar">
		<?php dynamic_sidebar('sidebar1');?>
	</div> -->
	<br class="clear" />
</div>
<?php get_footer()?>