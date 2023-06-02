<?php

/**

 * Template Name: Live Antique Estate Auctions

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
<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
<div class="page-header">
  <div class="container">
     <h3 class="entry-title"><?php the_title(); ?></h3>
  </div>
</div>

<?php twentytwelve_content_nav( 'nav-above' ); ?>

<div class="breadcrumb_mn">
    <div class="container">
        <?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
				<?php the_content(); ?>
			    <?php /* Start the Loop */ ?>
			    <?php
			    /*if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
                elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                else { $paged = 1; }*/
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $the_query = new WP_Query(array(
                    'post_type' => 'auctions', 
                    'orderby' => 'date', 
                    'order' => 'DESC', 
                    'posts_per_page' => 8, 
                    'paged' => $paged, 
                    'nopaging' => false,
					'tax_query' => array(
						array (
							'taxonomy' => 'auction_category',
							'field' => 'slug',
							'terms' => 'live-estate-auctions',
						)
					),
                ));
                $i = 0;
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                            get_template_part( 'content', 'auction' ); 
                    }
                }
                wp_reset_postdata();
                ?>
                <?php
                if (function_exists("pagination")) {
                    pagination($the_query->max_num_pages);
                }
                ?>  
			</div>
			<div id="sidebar" class="col-sm-3"><?php get_sidebar(); ?></div>
		</div>
	</section>
	</div>
	<?php twentytwelve_content_nav( 'nav-below' ); ?>
	<?php endwhile; endif; ?>
</div>
</div>
</div>
<?php get_footer(); ?>