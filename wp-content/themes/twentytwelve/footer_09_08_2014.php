<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<div class="content-bottom">
    	<div class="container">
        	<h4 class="title">Central Mass Auctions, Inc</h4>
            <div class="row">
            	<div class="col-sm-4 col-xs-12 address">
                	<label>Address:</label>
                    <div class="col-xs-9 address-text">
                    	<p>Central Mass Auctions</p>                        
                        <p>267 Providence Street</p>
                        <p>Worcester, MA 01607-1109</p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 contact-add">
                	<p>
                        <label>Phone:</label>
                        <span class="col-xs-9">508-612-6111</span>
                    </p>
                    <p>
                        <label>E-Mail:</label>
                        <span class="col-xs-9"><a href="mailto:contact@centralmassauctions.com">contact@centralmassauctions.com</a></span>
                    </p>
                </div>
                <div class="col-sm-4 networks">
                	<p>Be in touch with us trough our Networks</p>
                    <div>
	                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt=""></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" alt=""></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt=""></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/pinterest.png" alt=""></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt=""></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/gplus.png" alt=""></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/good.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="footer">
    	<div class="container">
        	<div class="footer-top">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="title">Note for Executors, <br>Personal Representatives, Estate Planning Attorneys & Realtors:</h4>
                        <ul class="list-unstyled">
                            <li>Personal representatives are accountable for selling personal property in an estate</li>
                            <li>Make certain that you are getting “fair market value” for your estate contents</li>
                            <li>Valuables like antiques, coins, jewelry and artwork require special expertise </li>
                            <li>Estate auctions and estate sale companies are proven and trusted methods</li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="title">Central Mass Auctions<br> have been estate specialists <br>for over a decade:</h4>
                        <ul class="list-unstyled">
                            <li>We run antique and estate auctions, estate sales and perform estate appraisals</li>
                            <li>If you are downsizing or facing any life transition we are here to assist you</li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="title">We are based in Worcester <br>and Boston, MA but service a wide area:</h4>
                        <ul class="list-unstyled">
                            <li>Central Mass Auctions services all areas of Massachusetts </li>
                            <li>We’ve sold quality antiques and collections from the Northeast, Mid-West and South</li>
                            <li>Clients in Connecticut, Rhode Island, New Hampshire, Vermont, Maine, New York, Pennsylvania, Ohio and Kentucky have trusted us to sell their higher end estates, antiques and collections.  Please consider us to handle all of your estate needs!</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
            	<div class="footer-nav">
                    <ul class="list-inline">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Areas Served</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <p>Copyright© 2002-2014 Central Mass Auctions, Inc. - All rights reserved.    XML Sitemap</p>
                <div class="jumbotron">
                	<p>We offering estate sales, ma appraisers, estate liquidations, antique auction, estate auction, mass appraisers, massachusetts appraisers, ma auctioneers, estate auctions, antique auctions, massachusetts auctioneers, ma estate sales, ma auctions. </p>
                </div>
                <div class="website-boston">
                	<a target="_blank" href="http://websiteboston.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/website-boston.png" alt=""></a>
                </div>
            </div>
        </div>
	</div>
	<footer id="colophon" role="contentinfo" style="display: none;">
		<div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery_002.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jcarousel.js"></script>
</body>
</html>