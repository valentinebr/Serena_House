<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/


/*
 *  adding blindesign :  adds a new field to each of your Advanced Layout Builder element’s pop up menu
 */

add_theme_support('avia_template_builder_custom_css');




/*
 *  adding blindesign :  change the thumbnails format in magazine blog
 */
add_filter('avf_magazine_settings', 'avia_magazine_thumbnail', 10, 2);
function avia_magazine_thumbnail($atts, $magazine){
$atts['image_size']['small'] = 'extra_large';
$atts['image_size']['big'] = 'extra_large';
return $atts;
}




/*
 *  adding blindesign :  adds the possibility to make % minimum height for grid elements
 */
add_action('wp_footer', 'ava_grid_height');
function ava_grid_height(){
?>
<script>
(function($){
    $(window).resize(function() {
		var win		= $(window),
		calc_height = function() {
			var winh		= win.height(),
				header 		= $('#header').height(),
				title       = $('.title_container').height(),
				gridh 		= winh - header - title;
			
				$('#custom-grid').css('height', gridh/1.5 + 'px');
		}
		
		win.on( 'resize', calc_height);
		calc_height();
    }).resize();
})(jQuery);
</script>
<?php
}





/*
 *  adding blindesign :  adds custom posts (pages, portfolio...) to RSS feed
 */
function myfeed_request($qv) {
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
}
add_filter('request', 'myfeed_request');



/*
 *  adding blindesign :  adds images to RSS feed
 */
function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '' . get_the_post_thumbnail( $post->ID, 'entry_with_sidebar', array( 'style' => 'max-width:564px; max-height:214px;' ) ) . '' . $content;
}
return $content;
}

add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');


/*
 *  adding blindesign :  hides the WP top bar
 */
add_filter( 'show_admin_bar', '__return_false' );
 
    function yoast_hide_admin_bar_settings() {
    ?>
        <style type="text/css">
            .show-admin-bar {
                display: none;
            }
        </style>
    <?php
    }
 
    function yoast_disable_admin_bar() {
        add_filter( 'show_admin_bar', '__return_false' );
        add_action( 'admin_print_scripts-profile.php',
             'yoast_hide_admin_bar_settings' );
    }
    add_action( 'init', 'yoast_disable_admin_bar' , 9 );
	












/**
 * adding blindesign : adds categories to custom posts in admin panel
 */
add_action( 'restrict_manage_posts', 'my_restrict_manage_posts' );

function my_restrict_manage_posts() {
    global $typenow, $post, $post_id;

	if( $typenow != "page" && $typenow != "post" ){
		//get post type
		$post_type=get_query_var('post_type'); 
	
		//get taxonomy associated with current post type
		$taxonomies = get_object_taxonomies($post_type);
	
		//in next loop add filter for tax
		if ($taxonomies) {
			foreach ($taxonomies as $tax_slug) {
				$tax_obj = get_taxonomy($tax_slug);
				$tax_name = $tax_obj->labels->name;
				$terms = get_terms($tax_slug);
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>Show All $tax_name</option>";
				foreach ($terms as $term) { 
					$label = (isset($_GET[$tax_slug])) ? $_GET[$tax_slug] : ''; // Fix
					echo '<option value='. $term->slug, $label == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
				}
				echo "</select>";
			}
		}
	}
}



/**
 * adding blindesign : css enfold-child first
 */
add_action( 'wp_enqueue_scripts', 'av_dequeue_child_stylecss', 20 );
function av_dequeue_child_stylecss() {
    if(is_child_theme()){
        wp_dequeue_style( 'avia-style' );
    }
}

add_action( 'wp_enqueue_scripts', 'av_reenqueue_child_stylecss', 9999999 );
function av_reenqueue_child_stylecss() 
{
    if (is_child_theme()){
        wp_enqueue_style( 'avia-style', get_stylesheet_uri(), true, filemtime( get_stylesheet_directory() . '/style.css' ), 'all');
    }
}





/**
 * adding blindesign : exclude current portfolio item from post slider
 */
function ava_exclude_portfolio($query) {
	if (is_singular('portfolio')) {
    $exclude = avia_get_the_ID();
		$query->set( 'post__not_in', array($exclude) );
	}
}

add_action('pre_get_posts', 'ava_exclude_portfolio');



/**
 * adding blindesign : disable Gutenberg editor (WP 5)
 */
// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);





