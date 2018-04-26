<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Joel_Busch_Portfolio
 */

 $background = get_field('background');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title>Joel Busch KC - Web Development Portfolio</title>
	<meta name="description" content="Providing professional web development services to businesses and individuals out of the Kansas City area.">
	<meta name="keywords" content="Joel Busch, web developer, Kansas City, software, WordPress" />

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<?php wp_head(); ?>

	<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body <?php body_class(); ?> style="background: url(<?php echo $background; ?>) top left repeat;">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jb-portfolio' ); ?></a>

	<!-- HEADER -->
	<header>

		<!-- NAVBAR -->
		<div class="navbar-wrapper">
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="/">Joel Busch</a>
					</div>

					<?php
						wp_nav_menu( array(
							'menu' => 'Primary',
							'container' => 'nav',
							'container_class' => 'navbar-collapse collapse',
							'menu_class' => 'nav navbar-nav navbar-right'
						));
					?>

				</div>
			</div>
		</div>
	</header>
