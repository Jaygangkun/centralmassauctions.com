<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>
<div class="page-header">
  <div class="container">
     <h3 class="entry-title"><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h3></div></div>

			<?php twentytwelve_content_nav( 'nav-above' ); ?>
<div style="margin-left: 191px!important;">
<?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
</div>
<div class="content">
    	<div class="container">
            
            <div class="row"><div class="col-sm-9">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?></div>
<div id="sidebar" class="col-sm-3"><?php get_sidebar(); ?></div></div></section></div>
			<?php twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<div class="container">
            
            <div class="row"><div class="col-sm-12">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
                </div></div></div>

		<?php endif; ?>

		

                        </div></div></div>
<?php get_footer(); ?>