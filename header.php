<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wporg-developer
 */

$GLOBALS['pagetitle'] = wp_get_document_title();

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'html' ); ?> class="no-js">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="masthead" class="site-header" role="banner">
	<?php if ( get_query_var( 'is_handbook' ) ) : ?>
	<a href="#" id="secondary-toggle" onclick="return false;"><strong><?php _e( 'Menu', 'wporg' ); ?></strong></a>
	<?php endif; ?>
	<div class="site-branding">
		<?php $tag = is_front_page() ? 'span' : 'h1'; ?>
		<<?php echo $tag; ?> class="site-title">
			<a href="<?php echo esc_url( DevHub\get_site_section_url() ); ?>" rel="home"><?php echo DevHub\get_site_section_title(); ?></a>
		</<?php echo $tag; ?>>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle dashicons dashicons-arrow-down-alt2" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Primary Menu', 'wporg' ); ?>"></button>
			<?php
			$active_menu = is_post_type_archive( 'command' ) || is_singular( 'command' ) ? 'devhub-cli-menu' : 'devhub-menu';
			wp_nav_menu( array(
				'theme_location'  => $active_menu,
				'container_class' => 'menu-container',
				'container_id'    => 'primary-menu',
			) ); ?>
		</nav>
	</div>
</header><!-- #masthead -->

<div id="page" class="hfeed site devhub-wrap">
	<a href="#main" class="screen-reader-text"><?php _e( 'Skip to content', 'wporg' ); ?></a>

	<?php do_action( 'before' ); ?>
	<?php
	if ( DevHub\should_show_search_bar() ) : ?>
		<div id="inner-search">
			<?php get_search_form(); ?>
			<div id="inner-search-icon-container">
				<div id="inner-search-icon">
					<div class="dashicons dashicons-search"><span class="screen-reader-text"><?php _e( 'Search', 'wporg' ); ?></span></div>
				</div>
			</div>
		</div>

	<?php endif; ?>
	<div id="content" class="site-content">
