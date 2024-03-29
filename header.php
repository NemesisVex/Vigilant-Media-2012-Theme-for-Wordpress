<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Vigilant Media
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php echo get_vigilante_uri(); ?>/css/blueprint/screen.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="<?php echo get_vigilante_uri(); ?>/css/blueprint/print.css" type="text/css" media="print">
		<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo get_vigilante_uri(); ?>/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/typography.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/layout.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mobile.css" type="text/css" media="screen and (max-width: 600px)" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<script type="text/javascript" src="<?php echo get_vigilante_uri(); ?>/js/modernizr-1.6.min.js"></script>
		<!--[if lt IE 9]><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script><![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
	</head>

	<body>

		<div id="masthead">
			<div class="container">
				<header id="masthead-title">
					<hgroup>
						<h1 id="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h3 id="subtitle"><?php bloginfo( 'description' ); ?></h3>
					</hgroup>
				</header>

				<nav id="nav-main">
					<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
				</nav>

			</div>
		</div>

		<div id="content">
			<div class="container">
