<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="page-header">
                    <div class="container">
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php endif; // is_single() ?>
			</div></div>
<div style="margin-left: 191px!important;">
<?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
</div>
<div class="content">
    	<div class="container">
            
            <div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
 <div class="col-sm-9">
     <section>
                       <div class="">
		 <?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
		</footer><!-- .entry-meta -->
	
<?php //comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>
                       </div></section></div>
                <div id="sidebar" class="col-sm-3"> <?php get_sidebar(); ?> </div></div></div></div>


<?php get_footer(); ?>