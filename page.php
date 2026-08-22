<?php
/**
 * The template for displaying single pages.
 *
 * The pages that are created in Wordpress.
 *
 * @package WordPress
 * @subpackage TheBubble
 * @since TheBubble 0.1 alpha
 */
 
get_header(); ?>

<div class="content clearfix">

		<?php
		if (have_posts()) :
			while (have_posts()) : the_post(); ?>
	
			<article class="page">
		
				<h2 class="page-title"><?php the_title(); ?></h2>
				<div class="page-content">
					<?php the_content(); ?>
				</div><!-- /page-body -->
				
			</article>
	
			<?php endwhile;
	
			else :
				echo '<p>No content found!</p>';
		
			endif; ?>
	
</div><!-- /content -->

<?php get_footer(); ?>