<?php
/**
 * Implement an optional custom header
 * http://codex.wordpress.org/Custom_Headers
 *
 * @since Book 103
 */
function book_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '111',
		'default-image'          => '',

		// Set height and width, with a maximum value for the width.
		'height'                 => 500,
		'width'                  => 1440,
		
		// Support flexible height and width.
		'flex-height'            => false,
		'flex-width'             => false,

		// Random image rotation off by default.
		'random-default'         => false,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'book_header_style',
		'admin-head-callback'    => 'book_admin_header_style',
		'admin-preview-callback' => 'book_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'book_custom_header_setup' );

// Add specific CSS class by filter
add_filter( 'body_class', 'book_custom_header_class' );
function book_custom_header_class( $classes ) {
	if( ( is_home() && get_header_image() ) || ( is_single() && has_post_thumbnail() )  ) {
		$classes[] = 'custom-header';
	} else {
		$classes[] = 'no-custom-header';
	}
	
	if( ! is_home() ) {
		$classes[] = 'no-home';
	}
	return $classes;
}


/**
 * Styles the header text displayed on the blog.
 *
 */
function book_header_style() {
	$text_color = get_header_textcolor();
	global $content_width;
	
	// If we get this far, we have custom styles.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text, use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $text_color; ?>;	
		}
		/* .site-title a {
			text-shadow: -1px -1px 0 #333,  
    			1px -1px 0 #333,
    			-1px 1px 0 #333,
     			1px 1px 0 #333;
		} */
		.site-title a:hover {
			opacity: 0.7;
		}
		
	<?php endif; ?>
	<?php 
		if( is_single() ) :
		
			if( has_post_thumbnail() ) : 
			
				$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'featured');			
				$header_image = "background: url(" . $featured_image_url[0] . ") center 0 no-repeat; background-attachment: fixed;";
				$textcolor = "#fff";
				$background = "url( ". get_template_directory_uri() ."/images/nav-bg.png)";
				$libackground = "url( ". get_template_directory_uri() ."/images/diamond-white.png)";
				$bgcolor = "#111";
				$height = "500px";
				$paddingbot = "0";
				
			else :
			
				$header_image = "";
				$textcolor = "#000";
				$libackground = "url( ". get_template_directory_uri() ."/images/diamond.png)";
				$bgcolor = "none";
				$height = "auto";
				$background = "none";
				$paddingbot = "auto";
				
				
			endif;
			?>
			<?php if( has_post_thumbnail() ) : ?>
			hgroup {
				position: absolute;
				bottom: 50px;
				width: 100%;
			}	
			<?php endif; ?>
			#masthead {
				<?php echo $header_image; ?>
				margin-top: 0;
				padding-bottom: <?php echo $paddingbot; ?>;
				max-width: 100%;
				height: <?php echo $height; ?>;
				position: relative;
				background-color: <?php echo $bgcolor; ?>;
			}
			.admin-bar.custom-header #masthead {
				background-position: center 28px;
			}
			#page {
				max-width: 100%;
			}
			#main, #colophon {
				max-width: <?php echo $content_width; ?>px;
				margin: 0 auto;
			}
			.main-navigation {
				background: <?php echo $background; ?>;
			}
			.main-navigation ul a {
				color: <?php echo $textcolor; ?>;
			}
			.home .main-navigation ul li, .main-navigation ul li {
				background: <?php echo $libackground; ?> 0 24px no-repeat;
			}
			.main-navigation ul li:first-child {
				background: none;
			}
			.site-title a {
				color: <?php echo $textcolor; ?>;	
			}			
			
		<?php
		
		else :
		
			$header_image = get_header_image();
			
			if ( ! empty( $header_image ) ) : 

				$textcolor = "#ccc";
				$background = "url( ". get_template_directory_uri() ."/images/nav-bg.png)";
				$libackground = "url( ". get_template_directory_uri() ."/images/diamond-white.png)";
				
			 ?>
			#masthead {
				background: url( <?php echo esc_url( $header_image ); ?> ) center 0 no-repeat;
				margin-top: 0;
				padding-bottom: 0;
				max-width: 100%;
				height: <?php echo get_custom_header()->height; ?>px;
				position: relative;
				background-attachment: fixed;
			}			
			hgroup {
				position: absolute;
				bottom: 50px;
				width: 100%;
			}
			.site-title {
				max-width: <?php echo $content_width; ?>px;
				margin: auto;
			}
			h2.site-description {
				max-width: <?php echo ( $content_width - 200 ); ?>px;
			}
			#page {
				max-width: 100%;
			}
			#main, #colophon {
				max-width: <?php echo $content_width; ?>px;
				margin: 0 auto;
			}
			.main-navigation {
				background: <?php echo $background; ?>
			}
			.main-navigation ul a {
				color: <?php echo $textcolor; ?>
			}
			.home .main-navigation ul li, .main-navigation ul li {
				background: <?php echo $libackground; ?> 0 24px no-repeat ;
			}
			.main-navigation ul li:first-child {
				background: none;
			}
		
		<?php endif; ?>
	<?php endif; ?>
	
	</style>
	<?php
}

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 */
function book_admin_header_style() {
	$header_image = get_header_image();
	global $content_width;
	
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		position: relative;
		border: none;		
		<?php if ( ! empty( $header_image ) ) : ?>
		
		background: url( <?php echo esc_url( $header_image ); ?> ) 0 0 no-repeat;
		max-width: <?php echo get_theme_support( 'custom-header', 'max-width' ); ?>px;
		width: <?php echo get_custom_header()->width; ?>px;
		height: <?php echo get_custom_header()->height; ?>px;
		
		<?php endif; ?>
	}
	.admin-bar #masthead {
		background-position: center 28px;
	}
	
	#headimg h1,
	#headimg h2 {
		margin: 0 auto;
		padding: 0;
		font-family: "Century Schoolbook", Century, Garamond, serif;
		text-align: center; 
		text-shadow: none;
	}
	#headimg h1 {
		font-size: 48px;
		line-height: 1.2;
		max-width: <?php echo $content_width; ?>px;
		text-transform: uppercase;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#headimg h2 {
		margin-top: 24px;
		max-width: <?php echo ( $content_width - 200 ); ?>px;
		font-size: 17px;
		line-height: 1.9;
		font-style: italic;
		font-weight: normal;
	}
	<?php if ( ! empty( $header_image ) ) : ?>
	#headimg .header-text {
		position: absolute;
		bottom: 50px;
		width: 100%;
		margin: auto;
	}	
	<?php endif; ?>
	
		
	</style>
<?php
}

/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 */
function book_admin_header_image() {
	?>
	<div id="headimg">
		<?php
		if ( ! display_header_text() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<div class="header-text">
			<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
		</div>
		
	</div>
<?php }
