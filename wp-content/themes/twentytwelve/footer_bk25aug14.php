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
        	<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('Footer-bottom-1') ) : ?>
<?php endif; ?> 

        </div>
    </div>
        <div class="footer">
    	<div class="container">
        	<div class="footer-top">
                <?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('Footer-bottom-2') ) : ?>
<?php endif; ?> 
            </div>
            <div class="footer-bottom">
            	<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('Footer-bottom-3') ) : ?>
<?php endif; ?> 
            </div>
        </div>
	</div>
	


<?php wp_footer(); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery_002.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jcarousel.js"></script>
</body>
</html>