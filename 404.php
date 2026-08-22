<?php
/**
 * The template for the 404 page.
 *
 * What the theme displays when a user navigates to a null link.
 *
 * @package WordPress
 * @subpackage TheBubble
 * @since TheBubble 0.1 alpha
 */

get_header(); ?>

<div class="content clearfix">

	<div class="left">
			
		<div class="message-404">
			<h1 class="message-404-title">Oh no!</h1>
			<i class="fa fa-question fa-5x fa-spin" aria-hidden="true"></i>
			<h2>We're not sure what you meant by that. Have another go.<h2>
			<?php get_search_form(); ?>
		</div>
			
	</div><!-- /left -->

	<?php get_sidebar('singlepage'); ?>
	
</div><!-- /content -->

<?php get_footer(); ?>