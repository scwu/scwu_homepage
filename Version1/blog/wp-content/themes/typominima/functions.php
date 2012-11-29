<?php
// Including the Control Panel
include(TEMPLATEPATH.'/cp/controlpanel.php');
$cpanel = new ControlPanel();



// Initializing the theme's options for front-end usage
function typominima() {
	global $typominima;
	$typominima = get_option('Typominima');
}
add_action('wp_head','typominima');

if(function_exists(add_theme_support)) {

	// Adds support for post thumbnails

	add_theme_support('post-thumbnails');

	// Register top custom menu

	add_theme_support( 'menus' );

	if(function_exists('register_nav_menus')) {
		register_nav_menus(array(
			'top-menu' => __( 'Top Menu' ),
		));
	}

}



// Top menu checker & builder

function typominima_nav_menu() {
	if(function_exists(wp_nav_menu)) {
		$typominima_nav_menu = wp_nav_menu(array('menu' => 'Top Menu', 'container' => '', 'fallback_cb' => 'wp_page_menu', 'echo' => false, 'depth' => 2));
	}
	else {
		$typominima_nav_menu = '<ul class="menu">'.wp_list_pages('sort_column=menu_order&title_li=&echo=0&depth=2').'</ul>';
	}
	echo $typominima_nav_menu;
}



// Register widget-ready areas

if ( function_exists('register_sidebar') ) {

    register_sidebar(array(
		'name' => 'Widget-box Left',
		'description' => 'Bottom left widget-area',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>'
    ));

    register_sidebar(array(
		'name' => 'Widget-box Center',
		'description' => 'Bottom middle widget-area',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>'
    ));
    
    register_sidebar(array(
		'name' => 'Widget-box Right',
		'description' => 'Bottom right widget-area',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>'
    ));

}



// Comments template

function respond_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	$gravatar_baseurl = get_bloginfo("template_directory"); ?>
	
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-author-image"><?php echo get_avatar( $comment, 40, $default = $gravatar_baseurl . '/img/gravatar.gif' ); ?></div>
		<div class="comment-details">
			<div class="comment-meta">On <?php echo get_comment_date() ?></div>
			<strong><?php echo get_comment_author_link() ?></strong> wrote:

			<div class="comment-text">
				<?php
				comment_text();
				if ($comment->comment_approved == '0') { ?>
			    <p><em><?php echo ('Your comment is awaiting moderation.') ?></em></p>
				<?php } ?>
			</div>
		</div>
<?php
}


// Filter comments from trackbacks & pingback.

function comment_count( $count ) {
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}
add_filter('get_comments_number', 'comment_count', 0);



// Adds Twitter, Facebook and LinkedIn fields for users to fill-in

function typominima_contactmethods( $contactmethods ) {
    // Add Twitter
    $contactmethods['twitter'] = 'Twitter';
    //add Facebook
    $contactmethods['facebook'] = 'Facebook';
    //add LinkedIn
    $contactmethods['linkedin'] = 'LinkedIn';

    return $contactmethods;
}
add_filter('user_contactmethods','typominima_contactmethods',10,1);
?>