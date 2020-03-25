						 	
	 <article>
			 <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<div class="featured_image">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail()?></a>
			</div>

			<div class="post_meta">
				Posted By: <?php the_author_posts_link(  );?> || Posted On : <?php the_time( 'M d,Y' )?> || Posted In <?php the_category( ',' )?> || <?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');  ?>					
			</div>
			<p><?php echo get_excerpt('100'); ?></p>
	</article>
	