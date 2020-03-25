<?php
// calling all stylesheet and js files
function calling_our_resersoerses(){
  wp_enqueue_style( 'mainstyle', get_stylesheet_uri(),'','1.0.1' );
  wp_enqueue_style( 'nevo_default', get_template_directory_uri().'/themes/default/default.css','','1.0.0' );
  wp_enqueue_style( 'nevo_light', get_template_directory_uri().'/themes/light/light.css','','1.0.0' );
  wp_enqueue_style( 'nevo_dark', get_template_directory_uri().'/themes/dark/dark.css','','1.0.0' );
  wp_enqueue_style( 'nevo_bar', get_template_directory_uri().'/themes/bar/bar.css','','1.0.0' );
  wp_enqueue_style( 'nevo_slider', get_template_directory_uri().'/css/nivo-slider.css','','1.0.0' );
  wp_enqueue_script( 'nevo_js1', get_template_directory_uri().'/js/jquery-1.9.0.min.js','','1.0.0' );
  wp_enqueue_script( 'nevo_js2', get_template_directory_uri().'/js/jquery.nivo.slider.js','','1.0.0' );
}
add_action( 'wp_enqueue_scripts','calling_our_resersoerses' );




//mane menue
function out_theme_setup(){
  register_nav_menus(
    array(
      'mainmenu' => __('Primary Menu'),
    )
  );
  add_theme_support( 'post-thumbnails' );


  // slider
  register_post_type( 'customslider',array(
    'labels' => array(
      'name'=> 'Slider',
      'add_new_item' => 'Add New Slider',
    ),
    'public' => true,
    'supports' => array(
      'title','thumbnail'
    ),
  ) );
}
add_action('after_setup_theme','out_theme_setup');





// // excerpt function
function content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
  }
$content = preg_replace('/[.+]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
$content = $content.'... <a class="read_more" href="'.get_the_permalink().'">[...]</a>';
return $content;
}
// /* Custom Pagination */
function pagination($pages = '', $range = 4){
$showitems = ($range * 2)+1;
global $paged;
if(empty($paged)) $paged = 1;
if($pages == ''){
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages){$pages = 1;}
}
if(1 != $pages){
echo "<div class=\"pagination\"><span>Page No- ".$paged." of ".$pages."</span>";
if($paged > 2 && $paged > $range+1 && $showitems < $pages)
echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
for ($i=1; $i <= $pages; $i++){
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
}
}
if ($paged < $pages && $showitems < $pages)
echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next Page &rsaquo;</a>";           if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last Page &raquo;</a>";
echo "</div>\n";
}}
// /* End Custom Pagination */
//  * Add a sidebar.

function wpdocs_theme_slug_widgets_init() {
register_sidebar( array(
'name'          => __( 'Main Sidebar' ),
'id'            => 'sidebar_1',
'description'   => __( 'aprafiq is a man' ),
'before_widget' => '<aside id="main_sidebar">',
'after_widget'  => '</aside>',
'before_title'  => '<h2>',
'after_title'   => '</h2>',
) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );