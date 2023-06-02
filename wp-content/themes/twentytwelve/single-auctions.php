<?php
/**
 * The Template for displaying all single posts
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

<div class="breadcrumb_mn">
    <div class="container">
        <?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
    </div>
</div>
<div class="content">
    	<div class="container">
            <div class="row">
	          <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-9">
                <section>
                    <div class="auction-content-area">
                        <div class="auction-single-images">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="content-auction-single">
            			<?php the_content(); ?>
            			</div>
            			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
                		<footer class="entry-meta">
                			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
                		</footer><!-- .entry-meta --> 
        				<?php 
        				$iid = get_the_ID();
                        $images = acf_photo_gallery('auction_photos',$iid );
                        $aulocation = get_post_meta($iid,'auction_location', true);
                        //Check if return array has anything in it
                        if( count($images) ):
                            //Cool, we got some data so now let's loop over it
                            foreach($images as $image):
                                $id = $image['id']; // The attachment id of the media
                                $title = $image['title']; //The title
                                $caption= $image['caption']; //The caption
                                $full_image_url= $image['full_image_url']; //Full size image url
                                $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
                                $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                                $url= $image['url']; //Goto any link when clicked
                                $target= $image['target']; //Open normal or new tab
                                $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                                $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
                                ?>
                               
                                    <div class="col-xs-6 col-md-3 auction-bulk-images">
                                        <div class="thumbnail">
                                            <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
                                                <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                                            <?php if( !empty($url) ){ ?></a><?php } ?>
                                        </div>
                                    </div>
                           
                        <?php endforeach; endif; ?>

                        <!--script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script-->
                        <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyD7_akL6wSECUm5ZHj34SVTEZsLZgBKDgc"></script>

                        <script type="text/javascript">
                            function initialize() {
                               var latlng = new google.maps.LatLng(<?php echo $aulocation['lat'] ?>,<?php echo $aulocation['lng'] ?>);
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  center: latlng,
                                  zoom: 13
                                });
                                var marker = new google.maps.Marker({
                                  map: map,
                                  position: latlng,
                                  draggable: false,
                                  anchorPoint: new google.maps.Point(0, -29)
                               });
                                var infowindow = new google.maps.InfoWindow();   
                                google.maps.event.addListener(marker, 'click', function() {
                                  var iwContent = '<div id="iw_container">' +
                                  '<div class="iw_title"><b>Location</b> : <?php echo $aulocation['address'] ?></div></div>';
                                  // including content to the infowindow
                                  infowindow.setContent(iwContent);
                                  // opening the infowindow in the current map and at the current marker location
                                  infowindow.open(map, marker);
                                });
                            }
                            google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
                        <div id="map" style="width: 100%; height: 300px;"></div> 
				    <?php //comments_template( '', true ); ?>
                  </div>
                </section>
            </div>
			<?php endwhile; // end of the loop. ?>

<?php if($actual_link!='http://centralmassauctions.com/hartford-ct-auction-and-estate-sale-services/' && $actual_link!='http://centralmassauctions.com/providence-ri-antique-auction-and-estate-sale-services/' && $actual_link!='http://centralmassauctions.com/newton-ma-and-metro-west-antique-auctions-and-estate-sales/'){?>
            <div id="sidebar" class="col-sm-3"><?php get_sidebar(); ?></div> <?php }?></div></div></div>	

<?php get_footer(); ?>

<?php /*
Auction single
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
			
			<?php
            //Get the images ids from the post_metadata
            $iid = get_the_ID();
            $images = acf_photo_gallery('auction_photos',$iid );
            $aulocation = get_post_meta($iid,'auction_location', true);
            //Check if return array has anything in it
            if( count($images) ):
                //Cool, we got some data so now let's loop over it
                foreach($images as $image):
                    $id = $image['id']; // The attachment id of the media
                    $title = $image['title']; //The title
                    $caption= $image['caption']; //The caption
                    $full_image_url= $image['full_image_url']; //Full size image url
                    $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
                    $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                    $url= $image['url']; //Goto any link when clicked
                    $target= $image['target']; //Open normal or new tab
                    $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                    $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
                    ?>
                    <div class="col-xs-6 col-md-3">
                        <div class="thumbnail">
                            <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
                                <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                            <?php if( !empty($url) ){ ?></a><?php } ?>
                        </div>
                    </div>
            <?php endforeach; endif; ?>
            
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
            <script type="text/javascript">
                function initialize() {
                   var latlng = new google.maps.LatLng(<?php echo $aulocation['lat'] ?>,<?php echo $aulocation['lng'] ?>);
                    var map = new google.maps.Map(document.getElementById('map'), {
                      center: latlng,
                      zoom: 13
                    });
                    var marker = new google.maps.Marker({
                      map: map,
                      position: latlng,
                      draggable: false,
                      anchorPoint: new google.maps.Point(0, -29)
                   });
                    var infowindow = new google.maps.InfoWindow();   
                    google.maps.event.addListener(marker, 'click', function() {
                      var iwContent = '<div id="iw_container">' +
                      '<div class="iw_title"><b>Location</b> : <?php echo $aulocation['address'] ?></div></div>';
                      // including content to the infowindow
                      infowindow.setContent(iwContent);
                      // opening the infowindow in the current map and at the current marker location
                      infowindow.open(map, marker);
                    });
                }
                google.maps.event.addDomListener(window, 'load', initialize);
            </script>
            <div id="map" style="width: 100%; height: 300px;"></div>  


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


<?php get_footer(); ?> */ ?>