<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="page-header">
                    <div class="container"><h1 class="entry-title" style="margin: 0;color: #fff;font-family: Trajan Pro;font-size: 24px;">
				<?php the_title(); ?>
			</h1></div></div>
<div style="margin-left: 191px!important;">
<?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
</div>
<div class="content">
    	<div class="container">
            
            <div class="row">
                 
	<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
	
<div class="col-sm-12"><section><div class="">
		
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
				<?php //comments_template( '', true ); ?>
            </div></section></div>
			<?php endwhile; // end of the loop. ?>

            </div></div></div>	

<?php get_footer(); ?>