<?php

/**

 * Template Name: Blog page

 * The main template file

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * For example, it puts together the home page when no home.php file exists.

 *

 * @link http://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */



get_header(); ?>



	 <div class="page-header">

    	<div class="container">

		

			<?php the_post_thumbnail(); ?>

			<?php if ( is_single() ) : ?>

			<h3 class="entry-title"><?php the_title(); ?></h3>

			<?php else : ?>

			<h3 class="entry-title">

				<?php the_title(); ?>

			</h3>

			<?php endif; // is_single() ?>

			<?php //if ( comments_open() ) : ?>

				<div class="comments-link">

					<?php //comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>

				</div><!-- .comments-link -->

			<?php //endif; // comments_open() ?>

		

        </div></div>
<div style="margin-left: 191px!important;">
<?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
</div>

<div class="content">

    	<div class="container">

         <div class="row">

             <div class="col-sm-9">

                 <section>

                       <div class="">

                            <h1 class="block-title">

                                <span class="title-left"></span>

                                <span class="text">latest blog posts</span>

                                <span class="title-right"></span>

                            </h1>

                        </div>

                        <div class="latest-posts">

        <?php query_posts('post_type=post&post_status=publish&posts_per_page=6&order=DESC&paged='. get_query_var('paged')); ?>

<?php if( have_posts() ): ?><?php while( have_posts() ): the_post(); ?>

                            <div class="row">

      <div class="col-xs-5"><?php the_post_thumbnail(); ?></div>

        <div class="col-xs-7"><h3><?php the_title(); ?></h3>

         <div class="posted-by">Posted by: <span class="name">Admin</span> Date:<span><?php the_time('F jS, Y'); ?></span>

         </div><p><?php the_excerpt(__('Continue reading »','example')); ?></p><p><a href="<?php the_permalink(); ?>">read more</a></p></div></div><?php endwhile; ?></div></section>

                 <div class="pager"><div class="navigation"><?php twentytwelve_content_nav( 'nav-below' ); ?>

</div><!-- /.navigation --></div><?php else: ?>



		<div id="post-404" class="noposts">



		    <p><?php _e('None found.','example'); ?></p>



	    </div><!-- /#post-404 -->



	<?php endif; wp_reset_query(); ?>

                </div> <div id="sidebar" class="col-sm-3"><?php get_sidebar(); ?></div></div>

 

    </div><!--content end -->

	

</div>





<?php get_footer(); ?>