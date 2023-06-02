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
		  <div itemscope itemtype="http://schema.org/LocalBusiness">


        	<?php if ( !function_exists('dynamic_sidebar')

|| !dynamic_sidebar('Footer-bottom-1') ) : ?>

<?php endif; ?> 


		  </div>
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



   <!-- <script src="http://code.jquery.com/jquery.js"></script>-->



    <!-- Include all compiled plugins (below), or include individual files as needed -->



    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>







    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery_002.js"></script>



    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jcarousel.js"></script>



<div id="mni-membership-635518896360234870" style="background-color: #421616;color: white;"></div>

<script src="http://worcesterchamber.chambermaster.com/Content/Script/Member.js" type="text/javascript"></script>

<script type="text/javascript">

new MNI.Widgets.Member("mni-membership-635518896360234870",{member:24169,styleTemplate:"#@id{text-align:center;position:relative}#@id .mn-widget-member-name{font-weight:700}#@id .mn-widget-member-logo{max-width:100%}"}).create();

</script>



<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0050/0461.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>



</body>



</html>