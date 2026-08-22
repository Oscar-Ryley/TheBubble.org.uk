<?php
/**
 * The template for single post pages.
 *
 * The site pages that display articles (although article content is scaffolded out to content-single.php).
 *
 * @package WordPress
 * @subpackage TheBubble
 * @since TheBubble 0.1 alpha
 */

get_header(); ?>

<div class="content clearfix">

		<?php if (have_posts()) :
			while (have_posts()) : the_post();
	
			if (get_post_format() == false) {
				get_template_part('content', 'article');
			} else {
				get_template_part('content', get_post_format());
			}
	
			endwhile;
	
			else :
				echo '<p>No content found</p>';
	
			endif; ?>
			
		<div class="article-pagination">
		
			<?php $defaults = array(
				'before'           => '<p>' . __( 'Pages:', 'thebubble' ),
				'after'            => '</p>',
				'link_before'      => '',
				'link_after'       => '',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'nextpagelink'     => __( 'Next page', 'thebubble' ),
				'previouspagelink' => __( 'Previous page', 'thebubble' ),
				'pagelink'         => '%',
				'echo'             => 1
			);

			wp_link_pages( $defaults ); ?>
		
		</div><!-- /link-pages -->
			
		<div id="article-popular" class="popular-widget clearfix">

			<div class="popular-info clearfix">
				<span class="popular-title"><h2>Most Read</h2></span>
			</div><!-- /popular-head -->
			
			<?php $args = array(
				'limit' => 5,
				// 'range' => 'weekly',
				// 'freshness' => 1,
				'order_by' => 'views',
				'post_type' => 'post',
				'stats_views' => 0,
				'stats_author' => 1,
				'wpp_start' => '<ol class="popular-list clearfix">',
				'wpp_end' => '</ul>',
				'post_html' => '<li class="popular-article clearfix"><p class="popular-article-title">{title}</p></li>'
			);
		
			wpp_get_mostpopular( $args ); ?>

		</div><!-- /popular-widget -->
		
		<div id="article-comments" class="comments">
		
			<?php if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>
		
		</div><!-- /comments -->
	
</div><!-- /content -->

<?php get_footer(); ?>