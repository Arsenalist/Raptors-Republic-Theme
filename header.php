<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="<?php echo get_option('google_site_verification_code')?>" />
        <meta name="msvalidate.01" content="<?php echo get_option('microsoft_site_verification_code')?>" />
        <link rel="icon" href="<?php echo get_option('image_favicon')?>">
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
<style><?php echo get_option('styles_override');?></style>






    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--[if lt IE 9]>
<style type="text/css">
  .container-fluid
{
    display:table;
    width: 100%;
}

.row
{
    height: 100%;
    display: table-row;
}
.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12,
.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12,
.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12,
.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12
{
    display: table-cell;
}
</style>
<![endif]-->

	</head>
	
	<body <?php body_class(); ?>>


<?php echo get_option('ad_page_level')?>


				<div class="container-fluid" style="margin: 0; padding: 0;">

        <div class="container" style="padding: 0">
        <header role="banner">

            <div class="navbar navbar-default" id="nav">


                    <div class="row visible-xs" style="border-bottom: 1px solid #ccc">
                        <div class="col-xs-8">
                            <a title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_option( 'banner_small' )?>"/>
                        </a>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>

                    <div class="row hidden-xs">
                        <div class="col-sm-12 col-xs-12">
                            <a class="brand navbar-brand"  title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
                                <img src="<?php echo get_option( 'banner_large' )?>"/>
                            </a>
                        </div>
                    </div>
                    <div class="row navbar-row">
                        <div class="col-sm-12 col-xs-12 collapse navbar-collapse navbar-responsive-collapse">
                            <?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
                        </div>
                    </div>

            </div> <!-- end .navbar -->
        </header> <!-- end header -->
        </div>
<?php if (is_home() && get_option('ad_home_header')) {?>

		<div class="container">
        <div class="row">
        <div class="col-lg-12" style="margin-top: 10px">
                <div class="responsive-ad text-center">
                    <?php echo get_option('ad_home_header');?>
    
                </div>
 
        </div>
        </div>
        </div>
<?php }?>
				<div class="container">
