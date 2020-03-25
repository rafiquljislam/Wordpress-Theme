<?php
function calling_resources(){
wp_enqueue_style ( 'style', get_stylesheet_uri(),'','1.0.9', );
wp_enqueue_style( 'comment_style',get_template_directory_uri().'/css/comments.css','','1.0.0' );
}
add_action("wp_enqueue_scripts",'calling_resources');
function our_theme_setup(){
// Register nav
register_nav_menus(array(
'Primary' => __('Primary Menu'),
'Footer' => __('Footer Menu'),
));
// Thumbnail Image
add_theme_support('post-thumbnails');
}
add_action( 'after_setup_theme', 'our_theme_setup' );
//sidebar register
function owerfdfdfdfdfdfdfd(){
register_sidebar(array(
'name' => 'Primary Sidbar',
'id' => 'sidebar1',
'before_widget' => '<div class="before_widget_tt">',
'after_widget'  => '</div>',
'before_title'  => '<h2 class="">',
        'after_title'   => '</h2>',
));
}
add_action('widgets_init','owerfdfdfdfdfdfdfd');
// Excerpt Function
function get_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 200);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.'... <a class="post_link" href="'.get_the_permalink().'">more</a>';
return $excerpt;
}
/* Custom Pagination */
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