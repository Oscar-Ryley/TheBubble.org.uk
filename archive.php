<?php
/**
 * The template for all archive pages.
 *
 * Includes category, tag, author and date archives.
 *
 * @package WordPress
 * @subpackage TheBubble
 * @since TheBubble 0.1 alpha
 */
 
get_header(); ?>

<div class="content clearfix">

		<?php
	
		$ex = array(1, 2);
		$arch_counter=1;

		// Begin the PHP *if* statement, defining behaviour with/without posts. 
		if (have_posts()) :

			// Defining what to do (ie. the title) with each type of category archive.	
			if ( is_category() ) {
				?><section class="archive-title"><h2><?php single_cat_title(); ?></h2></section><?php
			} elseif ( is_tag () ) {
				?><section class="archive-title"><h2><?php single_tag_title(); ?></h2></section><?php
			} elseif ( is_author() ) {
				the_post();
				?><section class="archive-title"><h2><?php echo 'Author Archives: ' . get_the_author(); ?></h2></section><?php
				rewind_posts();
			} elseif ( is_day() ) {
				?><section class="archive-title"><h2><?php echo 'Daily Archives: ' . get_the_date(); ?></h2></section><?php
			} elseif ( is_month() ) {
				?><section class="archive-title"><h2><?php echo 'Monthly Archives: ' . get_the_date('F Y'); ?></h2></section><?php
			} elseif ( is_year() ) {
				?><section class="archive-title"><h2><?php echo 'Yearly Archives: ' . get_the_date('Y'); ?></h2></section><?php
			} else {
				echo 'Archives:';
			} ?>
	
		<div id="archive-content" class="recent-content"><?php

			while (have_posts()) : the_post();
			
				if ( in_category( 36 ) ) {
					?><div id="archive-article" class="recent-article editor-pick"><?php					
				} else {
					?><div id="archive-article" class="recent-article"><?php
				} ?>

					<div id="archive-thumb" class="recent-thumb">
						<?php if( $arch_counter == 1 ) { ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('archive-top'); ?></a><?php
						} elseif( $arch_counter == 2 ) { ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('archive-second'); ?></a><?php
						} else { ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('archive-article'); ?></a><?php
						} ?>
					</div><!-- /archive-thumb -->

					<div id="archive-blurb" class="recent-blurb">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4><?php
					
						if(in_array($arch_counter, $ex)) {
							the_excerpt();
						} else {
							// Display no excerpt.
						} ?>
					
					</div><!-- /archive-info -->

					<div id="archive-meta" class="recent-meta">
						<p id="archive-author" class="recent-author">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></p>
					</div><!-- /archive-cat -->

				</div><!-- /archive-article --><?php
	
			$arch_counter++;

			endwhile;

			else :
				echo '<p>No content found!</p>';

			endif; ?>

		</div><!-- /archive-content -->
		
		<div class="archive-pagination"><?php
		
			global $wp_query;
		
			$big = 999999999;
		
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'prev_text' => __('« Previous Page', 'thebubble'),
				'next_text' => __('Next Page »', 'thebubble')
			) ); ?>
		
		</div><!-- /archive-pagination -->

</div><!-- /site-content -->

<?php get_footer(); ?>