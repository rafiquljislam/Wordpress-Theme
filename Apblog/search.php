<?php get_header()?>


		
		<div class="content_wrapper">
			<h1>Hello  all I am Search page</h1>
			<div class="left_content">
				<?php 
					if(have_posts()): ?>
							<h2>Search Result For: "<?php the_search_query(); ?>"</h2>
						<?php
						while (have_posts()):the_post(); ?>


						 	<?php get_template_part( 'content' ) ?>


				<?php endwhile;
					endif;
				?>

				<!-- simple  paganiation -->
<!-- 				<div class="pagenation">
					<div class="older_posts">
						<?php next_posts_link('&#8592;	Older Posts') ?>							
					</div>
					<div class="new_posts">
						<?php previous_posts_link('New Posts &#8594;') ?>
					</div>
				</div> -->

				<!-- paganiations in functions -->
			<?php if (function_exists("pagination")) {    pagination($additional_loop->max_num_pages);} ?>
				
				


			</div>

			<div class="sidebar">			
					<?php dynamic_sidebar('sidebar1');?>
			</div>
			<br class="clear" />
		</div>

<?php get_footer()?>