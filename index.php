<?php
/**
 * The template for displaying the blog page.
 *
 * The page of the site that lists all of the published posts.
 *
 * @package WordPress
 * @subpackage TheBubble
 * @since TheBubble 0.1 alpha
 */
 
get_header(); ?>

<div class="content clearfix">
	
	<?php

	if (have_posts()) :
		while (have_posts()) : the_post();

		get_template_part('content', get_post_format());

		endwhile;

		else :
			echo '<p>No content found!</p>';
	
	endif; ?>

	
</div><!-- /content -->

<?php get_footer(); ?>