<?php get_header() ?>
<?php get_template_part('menu'); ?>
<?php get_template_part('slider'); ?>

	<div class="main_wrap content_bg">
		<div class="wrap">
			<div id="content_wrapper">
<?php get_template_part( 'article' ) ?>


<?php get_sidebar(  ) ?>

			</div>			
		</div>
	</div>

<?php get_footer() ?>