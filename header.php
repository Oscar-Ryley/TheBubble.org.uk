<?php
/**
 * The template for displaying the header.
 *
 * The area of the page that contains links to fonts & scripts, the logo, and header menu.
 *
 * @package WordPress
 * @subpackage TheBubble
 * @since TheBubble 0.1 alpha
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>">
		<script src="https://use.fontawesome.com/b5ba9501bd.js"></script>
		<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/append-classes.js"></script><!-- The external class adding file. -->
		<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/masonry-properties.js"></script><!-- The external masonry properies file. -->
	</head>
	
<body <?php body_class(); ?>>
	
	<div class="container">
	
		<header class="header clearfix" id="headerid">
		
		<nav>
			<div class="header-title">	
				<?php if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				} ?>
			</div><!-- /header-title -->

			<ul id="headerid">
				<?php
				$sec1_parent = get_theme_mod( 'title_section1' );
                $sec2_parent = get_theme_mod( 'title_section2' );
                $sec3_parent = get_theme_mod( 'title_section3' );

				$category_slugs = array($sec1_parent, $sec2_parent, $sec3_parent);

				foreach ($category_slugs as $slug) :
					$parent_category = get_category_by_slug($slug);
					if ($parent_category) :
						$parent_id = $parent_category->term_id;
						?>
						<li>
							<div class="dropdown-title">
								<a style="text-decoration: none; color: inherit;">
									<?php echo esc_html($parent_category->name); ?>
								</a>
							</div>
							<ul class="dropdown">
								<?php
								wp_list_categories(array(
									'orderby'    => 'name',
									'show_count' => false,
									'depth'      => 1,
									'title_li'   => '',
									'child_of'   => $parent_id
								));
								?>
							</ul>
						</li>
					<?php endif;
				endforeach;
				?>

				<li> <a href="https://www.thebubble.org.uk/about/contact/" style="text-decoration:none;"> Contact </a> </li>
				<li> <a href="https://www.instagram.com/thebubbledurham/" style="text-decoration:none;"><i class="fa fa-instagram fa-1x"></i> </a> </li>
				
			</ul>
		</nav>

	
			
		</header><!-- /header -->