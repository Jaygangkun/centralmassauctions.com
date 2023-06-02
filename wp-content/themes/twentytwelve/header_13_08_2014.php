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
<title><?php wp_title( '|', true, 'right' ); ?></title>
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
    <?php wp_head(); ?>
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
          <div class="container">
            <div class="navbar-header">
              <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li><a href="javascript:void(0)">About Us</a></li>
                <li><a href="javascript:void(0)">Services</a></li>
                <li><a href="javascript:void(0)">Estate Sales</a></li>
                <li><a href="javascript:void(0)">Estate Appraisals</a></li>
                <li><a href="javascript:void(0)">Flyer</a></li>
                <li><a href="javascript:void(0)">Estate Auction News</a></li>
                <li><a href="javascript:void(0)">Auction reviews</a></li>
                <li><a href="javascript:void(0)">Resources</a></li>
                <li><a href="javascript:void(0)">Contact Us</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
	</div>
	

	