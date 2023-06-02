<?php

/**

 * The Header template for our theme

 *

 * Displays all of the <head> section and everything up till <div id="main">

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */

?><!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 7) | !(IE 8)  ]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width" />

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?php wp_title('', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>

<!--[if lt IE 9]>

<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>

<![endif]-->

<!-- Bootstrap -->

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">

	<!--[if IE 7]>

	  <link rel="stylesheet" href="css/font-awesome-ie7.min.css">

	<![endif]-->



    <!-- Example assets -->

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jcarousel.css">

        

   <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css">

	

	

	<!--[if IE 7]>

	  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">

	<![endif]-->



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->
<?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>

	<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-55649852-1', 'auto');

  ga('send', 'pageview');



</script>
<!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA32Qyiraf636YUASMoox4yisIIayLqEI8" async defer type="text/javascript" </script> -->
<meta name="robots" content="noodp,noydir" /><meta name="google-site-verification" content="dKC_VT_XQO7tkEjerXvLVbQSfSU-bBkCRoOO5mHO-_w" />
<?php 
if($_SERVER['REQUEST_URI']=='/about-us')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/about-us/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/antique-estate-auction-jan1')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/antique-estate-auction-jan1/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/auction-previews')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/auction-previews/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/contact')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/contact/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/contact-us/')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/contact/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/estate-auction-news')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/estate-auction-news/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/estate-sales')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/estate-sales/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/flyer')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/flyer/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/ma-estate-sales-auctions')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/ma-estate-sales-auctions/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/services-page')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/services-page/");
	exit;
}
if($_SERVER['REQUEST_URI']=='/services/')
{
	header("HTTP/1.1 301 Moved Permanently"); 
	header("location:http://centralmassauctions.com/services-page/");
	exit;
}

?>

	
</head>



<body <?php body_class(); ?>>

<div class="header">

		<div class="top_bar">

        	<div class="container">

            	<div class="row">

                	<div class="col-sm-6 col-xs-5 logo">

                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php $options = get_option('plugin_options'); ?><img src="<?php echo $options['logo']; ?>" alt="Logo"></a>

                    </div>

                    <div class="col-sm-6 col-xs-7 contact-info">

                        <?php $options = get_option('plugin_options'); ?><?php echo $options['address']; ?>

                    </div>

                </div>

            </div>

        </div>



        <div role="navigation" class="navbar">
		
			<div class="container-fluid">
				<?php wp_megamenu(array('theme_location' => 'primary')); ?>							
			</div>
			<div class="container-fluid">
				<?php  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header-menu') ) : ?>
				<?php  endif; ?> 
			</div>
        </div>

	</div>

	



	