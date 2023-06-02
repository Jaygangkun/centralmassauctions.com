<?php

/**

 * Template Name: Page-home

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

<style>
#Auctions.carousel {
    margin-bottom: 50px;
    padding: 0 80px;
}    
</style>
<div class="valuables-container">

    	<div class="container">

        	<div class="row">

            	<div class="col-sm-6 valuables">

                	<?php $options = get_option('plugin_options'); ?><?php echo $options['slidertext_heading']; ?>

                </div>

            	<div class="col-sm-6"> 

                    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>

	<?php dynamic_sidebar( 'sidebar-3' ); ?>

	<?php endif; ?>

               </div>

            </div>

            <div class="row">

                <div class="col-xs-12">

                    <div class="for-container">

                    	<!-- Nav tabs -->

                        <ul class="nav nav-tabs" role="tablist">

                          <li class="active"><a href="#sellers" role="tab" data-toggle="tab">For Sellers</a></li>

                          <li><a href="#buyers" role="tab" data-toggle="tab">For Buyers</a></li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <div class="valuables-bottom">

			<div class="container">

            	<div class="jumbotron sellers">

                	<!-- Tab panes -->

                    <div class="tab-content">

                      <div class="tab-pane fade active in" id="sellers">

                      	<p><?php $options = get_option('plugin_options'); ?><?php echo $options['seller_heading']; ?></p>

                      </div>

                      <div class="tab-pane fade" id="buyers">

                      	<p><?php $options = get_option('plugin_options'); ?><?php echo $options['buyer_heading']; ?></p>

                      </div>

                    </div>



                    

                </div>

            </div>

        </div>

        



        

    </div>


        </div>

    	<div class="container">
            
            <section>

                <div class="">

                    <h2 class="block-title">

                        <span class="title-left"></span>

                        <span class="text">Our Services Include</span>

                        <span class="title-right"></span>

                    </h2>

                </div>

                <div class="serivces">

                    <div class="row">

                        <div class="col-sm-4">

                            <h3 class="title"><?php $options = get_option('plugin_options'); ?><?php echo $options['service1_heading']; ?></h3>

                            <p><?php $options = get_option('plugin_options'); ?><?php echo $options['servicebox1_heading']; ?></p>

                        </div>

                        <div class="col-sm-4">

                            <h3 class="title"><?php $options = get_option('plugin_options'); ?><?php echo $options['service2_heading']; ?></h3>

                            <p><?php $options = get_option('plugin_options'); ?><?php echo $options['servicebox2_heading']; ?></p>

                        </div>

                        <div class="col-sm-4 img">

                            <h5><?php $options = get_option('plugin_options'); ?><?php echo $options['servlogoheading1']; ?></h5>

                            <img class="img-thumbnail" src="<?php echo $options['servlogo1']; ?>" alt="">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-4">

                            <h3 class="title"><?php $options = get_option('plugin_options'); ?><?php echo $options['service3_heading']; ?></h3>

                            <p><?php $options = get_option('plugin_options'); ?><?php echo $options['servicebox3_heading']; ?></p>

                        </div>

                        <div class="col-sm-4">

                            <h3 class="title"><?php $options = get_option('plugin_options'); ?><?php echo $options['service4_heading']; ?></h3>

                            <p><?php $options = get_option('plugin_options'); ?><?php echo $options['servicebox4_heading']; ?></p>

                        </div>

                        <div class="col-sm-4 img">

                            <h5><?php $options = get_option('plugin_options'); ?><?php echo $options['servlogoheading2']; ?></h5>

                            <img class="img-thumbnail" src="<?php echo $options['servlogo2']; ?>" alt="">

                        </div>

                    </div>

                </div>

            </section>
			
			<?php dynamic_sidebar('after-service'); ?>
            
			<section id="Mailing">

                <div class="">

                    <h2 class="block-title">

                        <span class="title-left"></span>

                        <span class="text">Join Our Mailing List</span>

                        <span class="title-right"></span>

                    </h2>

                </div>

                <div class="">

                    <div class="row">
			<!--Begin CTCT Sign-Up Form-->
<!-- EFD 1.0.0 [Thu Feb 09 04:14:18 EST 2017] -->
<link rel='stylesheet' type='text/css' href='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/css/signup-form.css'>
<div class="ctct-embed-signup" style="font: 16px Helvetica Neue, Arial, sans-serif; font: 1rem Helvetica Neue, Arial, sans-serif; line-height: 1.5; -webkit-font-smoothing: antialiased;">
   <div style="color:#444444; background-color:#FFFFFF; border-radius:5px;">
       <span id="success_message" style="display:none;">
           <div style="text-align:center;">Thanks for signing up!</div>
       </span>
       <form data-id="embedded_signup:form" class="ctct-custom-form Form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">
           <!--<h2 style="margin:0;">Sign up to stay in touch!</h2>-->
           <p>Keep updated on antique auction and estate sale news!</p>
           <!-- The following code must be included to ensure your sign-up form works properly. -->
           <input data-id="ca:input" name="ca" value="d93d3034-245c-4fe8-9dcf-a66650305366" type="hidden">
           <input data-id="list:input" name="list" value="1228418255" type="hidden">
           <input data-id="source:input" name="source" value="EFD" type="hidden">
           <input data-id="required:input" name="required" value="list,email" type="hidden">
           <input data-id="url:input" name="url" value="" type="hidden">
           <p data-id="Email Address:p" ><label data-id="Email Address:label" data-name="email" class="ctct-form-required">Email Address</label> <input data-id="Email Address:input" name="email" value="" maxlength="80" type="text"></p>
           <button type="submit" class="Button ctct-button Button--block Button-secondary" data-enabled="enabled">Sign Up</button>
       	<!--<div><p class="ctct-form-footer">By submitting this form, you are granting: Central Mass Auctions, Inc., 386 Stafford Street, Cherry Valley, Massachusetts, 01611, United States, http://www.centralmassauctions.com permission to email you. You may unsubscribe via the link found at the bottom of every email.  (See our <a href="http://www.constantcontact.com/legal/privacy-statement" target="_blank">Email Privacy Policy</a> for details.) Emails are serviced by Constant Contact.</p></div>-->
       </form>
   </div>
</div>
<script type='text/javascript'>
   var localizedErrMap = {};
   localizedErrMap['required'] = 		'This field is required.';
   localizedErrMap['ca'] = 			'An unexpected error occurred while attempting to send email.';
   localizedErrMap['email'] = 			'Please enter your email address in name@email.com format.';
   localizedErrMap['birthday'] = 		'Please enter birthday in MM/DD format.';
   localizedErrMap['anniversary'] = 	'Please enter anniversary in MM/DD/YYYY format.';
   localizedErrMap['custom_date'] = 	'Please enter this date in MM/DD/YYYY format.';
   localizedErrMap['list'] = 			'Please select at least one email list.';
   localizedErrMap['generic'] = 		'This field is invalid.';
   localizedErrMap['shared'] = 		'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
   localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
	localizedErrMap['state_province'] = 'Select a state/province';
   localizedErrMap['selectcountry'] = 	'Select a country';
   var postURL = 'https://visitor2.constantcontact.com/api/signup';
</script>
<script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>
<!--End CTCT Sign-Up Form-->
                        <?php //echo do_shortcode('[email-newsletter-plugin]'); ?>

           </div>

               </div>

            </section>

            <section>

                <div class="previous-videos">

                    <h2 class="block-title">

                        <span class="title-left"></span>

                        <span class="text">Previous Videos</span>

                        <span class="title-right"></span>

                    </h2>

                </div>

                <div class="">

                    <div class="row">

                        <div class="col-sm-12">

                            <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

	<?php dynamic_sidebar( 'sidebar-2' ); ?>

	<?php endif; ?>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-6 testimonials">

                        	<h4 class="title">Testimonials</h4>

                        	<div id="Testimonials" class="carousel slide" data-ride="carousel">

 <div class="carousel-inner">

  <?php 

  $args = array( 'post_type' => 'testimonial', 'posts_per_page' => 1);

$the_query = new WP_Query( $args );

   while ( $the_query->have_posts() ) : 

   $the_query->the_post();

  ?>

   <div class="item active">

    <?php //the_post_thumbnail('large');?>

    <div class="carousel-caption">

     <p><?php the_excerpt();?></p><h5><?php the_title();?></h5>

    </div>

   </div><!-- item active -->

  <?php 

   endwhile; 

   wp_reset_postdata();

  ?>

  <?php 

 $args = array( 'post_type' => 'testimonial', 'posts_per_page' =>3,'offset' => 1 );

$the_query = new WP_Query( $args );

   while ( $the_query->have_posts() ) : 

   $the_query->the_post();

  ?>

   <div class="item">

    <?php //the_post_thumbnail('large');?>

    <div class="carousel-caption">

    <p><?php the_excerpt();?></p><h5><?php the_title();?></h5>

    </div>

   </div><!-- item -->

  <?php 

   endwhile; 

   wp_reset_postdata();

  ?>

 </div>

                  <a class="left carousel-control" href="#Testimonials" role="button" data-slide="prev">

                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png" alt="">

                  </a>

                  <a class="right carousel-control" href="#Testimonials" role="button" data-slide="next">

                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.png" alt="">

                  </a>

</div>

                        </div>

                    </div>

                    

                </div>

            </section>

             

        </div>

    </div>

<div id="primary" class="site-content" style="display: none;">

		<div id="content" role="main">



			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">

			<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>

			<?php the_post_thumbnail(); ?>

			<?php endif; ?>

			<!-- <h1 class="entry-title"><?php // the_title(); ?></h1> -->

		</header>



		<div class="entry-content">

			<?php the_content(); ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>

		</div><!-- .entry-content -->

		<footer class="entry-meta">

			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>

		</footer><!-- .entry-meta -->

	</article><!-- #post -->



				<?php //comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>



		</div><!-- #content -->

	</div><!-- #primary -->



<?php get_footer(); ?>

<script type="text/javascript">

jQuery(document).ready(function($) {

    jQuery('.carousel').carousel({

  		interval: 5000	

  	});

});

</script>