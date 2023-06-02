<?php
/**
* Template Name: Auction Prices Page
*
* @package WordPress
* @subpackage 
* @since 
*/
get_header();
?>
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
	</div>
</div>
<div style="margin-left: 191px!important;">
	<?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
</div>
<style>
.auction-section-gallery {
	display: flex;
	justify-content: space-between;
}

.auction-section-gallery-wrap {
	width: calc(25% - 20px);
	border: 1px solid #A9A9A9;
	cursor: pointer;
	padding: 1px;
	text-align: center;
}

.auction-section-gallery-img-wrap {
	width: 100%;
	height: 0px;
	padding-top: 50%;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
}

.fancybox__container {
	z-index: 100000 !important;
}

</style>
<div class="content">
	<div class="container">            
		<div class="row">
			<div class="col-sm-9">
				<h1 class=""><?php the_field('title')?></h1>
				<?php if( have_rows('auction_sections') ): while ( have_rows('auction_sections') ) : the_row(); ?>
					<div class="auction-sections">
						<h3 class="auction-section-title"><?php the_sub_field('title')?></h3>
						<div class="auction-section-gallery">
							<?php if( have_rows('gallery') ): while ( have_rows('gallery') ) : the_row(); ?>
								<?php
									$gallery_img = get_sub_field('image');
								?>
								<div class="auction-section-gallery-wrap" href="<?php echo $gallery_img?>">
									<div class="auction-section-gallery-img-wrap" style="background-image:url(<?php echo $gallery_img?>)"></div>
									<p class="auction-section-gallery-title"><?php the_sub_field('caption')?></p>
									<p class="auction-section-gallery-cost">$ <?php the_sub_field('cost')?></p>
								</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
				<?php endwhile; endif; ?>
			</div>        
			<div id="sidebar" class="col-sm-3"> 
				<?php get_sidebar(); ?> 
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" type="text/css" media="screen" />
<script>
	Fancybox.bind(".auction-section-gallery-wrap", {
	// Your options go here
	infinite: false,
	});
</script>