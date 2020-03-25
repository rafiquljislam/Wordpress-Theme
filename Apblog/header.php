<!DOCTYPE HTML>
<html lang="en-US">
<head>
<!-- Wordpress Theme Development Tutorial By- Abdul Kader Hawlader -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo( 'name' )?></title>

	<?php wp_head()?>
</head>
<body <?php body_class();?>>
	<div class="container">
		<header class="main-header">
			<h1><a href="<?php echo home_url();?>"><?php bloginfo( 'name' )?></a></h1>
			<h3><?php bloginfo( 'description' )?></h3>



			<!-- search form -->

			<!-- basick -->
			<!-- <?php get_search_form(); ?> -->


<!-- advance -->
				<form role="search" method="get" id="searchform" class="searchform" action="<?php home_url('/'); ?>">
				<div>
					<label class="screen-reader-text" for="s"></label>
					<input type="text" value="" name="s" id="s" placeholder="<?php the_search_query() ?>">
					<input type="submit" id="searchsubmit" value="Search">
				</div>
			</form>
<!-- end form -->


		<nav class="main-menu">
			<div class="menu">
                <?php 
                
                $args = array
                    ('theme_location' => 'Primary');
                
                wp_nav_menu($args)
                
                ?>
			</div>
		</nav>			
		</header>