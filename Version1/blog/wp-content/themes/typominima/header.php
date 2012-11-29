<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /> 
	<title><?php if (is_home() || is_front_page()) { ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php } else { ?><?php wp_title($sep = ''); ?> - <?php bloginfo('name'); ?><?php } ?></title>
	<link type="text/css" rel="stylesheet" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
	
	<?php
	$typo_header = get_option('Typominima');
	if(isset($typo_header['cufon']) && $typo_header['cufon']==1) { ?>
	<!-- Cufon: Custom Font Replacement -->
	<script src="<?php bloginfo('template_directory'); ?>/js/cufon/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/cufon/typoslabserif-light-300.font.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/cufon/cufon-replace.js" type="text/javascript"></script>
	<?php } ?>

	<!--[if lte IE 7]>
	<style type="text/css">
	body {
		behavior: url("<?php bloginfo('template_directory'); ?>/hover.htc");
	}
	#nav ul li ul {
		top: 48px;
	}
	</style>
	<![endif]-->
	<link type="text/css" rel="stylesheet" media="screen" href="<?php bloginfo('template_directory'); ?>/custom-colors.php?colors=<?php echo substr($typo_header['link_color'],1); ?>-<?php echo substr($typo_header['link_hover_color'],1); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrap">

		<!-- Start: Header -->
		<div id="header">
			<div class="top-options">
				<?php
				$rssURL = get_bloginfo('rss2_url');
				if ($typo_header["custom_rss"] == 1 && isset($typo_header["custom_rss_url"]) && $typo_header["custom_rss_url"] != "") {
					$rssURL = $typo_header["custom_rss_url"];
				}
				?>
				<div class="rss-link left"><a href="<?php echo $rssURL; ?>" title="Subscribe to feed">Subscribe to RSS Feed</a></div>
				<div class="search-wrap right">
					<form method="get" id="searchform" name="searchform" action="<?php bloginfo('home'); ?>/">
						<input type="text" value="Site Search" name="s" id="s" onblur="if (this.value == '') {this.value = 'Site Search';}" onfocus="if (this.value == 'Site Search') {this.value = '';}" />  
						<button type="submit" class="searchsubmit">Go</button>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			<div id="nav">
				<?php typominima_nav_menu(); ?>
			</div>

			<div id="sitename">
				<a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a><?php if(isset($typo_header['description']) && $typo_header['description']==1) { ?><br /><span>&#126; <?php bloginfo('description'); ?> &#126;</span><?php } ?>
			</div>
		</div>
		<!-- End: Header -->