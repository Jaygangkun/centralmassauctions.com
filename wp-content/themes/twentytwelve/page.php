<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
 <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
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
				<?php get_template_part( 'content', 'page' ); ?>
				<?php //comments_template( '', true ); ?>
            </div></section></div>
			<?php endwhile; // end of the loop. ?>
<?php if($actual_link!='http://centralmassauctions.com/hartford-ct-auction-and-estate-sale-services/' && $actual_link!='http://centralmassauctions.com/providence-ri-antique-auction-and-estate-sale-services/' && $actual_link!='http://centralmassauctions.com/newton-ma-and-metro-west-antique-auctions-and-estate-sales/'){?>
            <div id="sidebar" class="col-sm-3"><?php get_sidebar(); ?></div> <?php }?></div></div></div>	

<?php get_footer(); ?>