<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">	
	<head  profile="http://www.w3.org/2005/10/profile">
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="google-site-verification" content="riFfdJtyXF1xuzvgjmyI2_C8zhjSinEfMXq89_uHnyg" />
        <link rel="icon" href="<?php bloginfo( 'template_url' );?>/ico/favicon.ico">
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <style type="text/css">
            .iosSlider {
                position: relative;
                top: 0;
                left: 0;
                overflow: hidden;
                width: 900px;
                height: 300px;
            }

            .iosSlider .slider {
                width: 100%;
                height: 100%;
            }

            .iosSlider .slider .item {
                position: relative;
                top: 0;
                left: 0;
                width: 820px;
                height: 300px;
            }

            .iosSlider .slider .item .image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 300px;
            }

            .iosSlider .slider .item .image .bg {
                border: 10px solid #000;
                border-right: 0;
                height: 180px;
                width: 340px;
                opacity: 0.5;
                display: none;
            }

            .iosSlider .slider .item .text {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 120px;
                padding: 10px;
            }

            .iphoneUI .iosSlider .slider .item .text {
                display: none;
            }

            .iosSlider .slider .item .text .bg {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 120px;
                background: black;
                opacity: 0.75;
            }

            .iphoneUI .iosSlider .slider .item .text .bg {
                display: none;
            }

            .iosSlider .slider .item .title {
                position: relative;
                top: 0;
                left: 0;
                margin-bottom: 5px;
                text-indent: -1px;
            }

            .iosSlider .slider .item .title span {
                color: #fff;
                font: bold 26px/24px "Helvetica Neue",Helvetica,Arial,sans-serif;
            }

            .iosSlider .slider .item .desc {
                position: relative;
                top: 0;
                left: 0;
                margin: 0 0 0px 0;
                color: white;
            }

            .iosSlider .slider .item .desc span,
            .iosSlider .slider .item .desc span p {
                font: 14px/16px "Helvetica Neue",Helvetica,Arial,sans-serif;
                color: #d8d8d8;
                margin: 0;
            }

            .iosSlider .slider .item .button {
                position: absolute;
                right: 20px;
                bottom: 20px;
                padding: 0 10px 0 10px;
                margin: 10px 0 0 0;
                background: #aaa;
                border: 1px solid #000;
                cursor: pointer;
            }

            .iosSlider .slider .item .button span {
                color: #000;
                font: normal 14px/30px;
            }


            .iosSliderButtons {
                width: 100%;
                height: 80px;
            }

            .iosSliderButtons .button {
                float: left;
                margin: 10px;
                width: 80px;
                height: 80px;
                opacity: 0.60;
                filter: alpha(opacity:60);
            }

            .iosSliderButtons .button .border {
                border: 1px solid #000;
                opacity: 0.5;
                width: 80px;
                height: 80px;
            }

            .iosSliderButtons .first {
                margin-left: 0;
            }

            .iosSliderButtons .selected,
            .iosSliderButtons .button:hover {
                opacity: 1;
                filter: alpha(opacity:100);
            }
        </style>


		<!-- wordpress head functions -->
		<?php wp_head(); ?>







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

<?php if (!is_home()) {?>
<script type="text/javascript">
 window._taboola = window._taboola || [];
_taboola.push({article:'auto'}); 
!function (e, f, u) {
    e.async = 1;
    e.src = u;
    f.parentNode.insertBefore(e, f);
}(document.createElement('script'), document.getElementsByTagName('script')[0], 'http://cdn.taboola.com/libtrc/raptorsrepublic/loader.js');
</script>
<?php }?>

				<div class="container-fluid" style="margin: 0; padding: 0;">
<div style="background: #414548; height: 35px"><iframe frameborder="0" scrolling="no" src="http://sports.espn.go.com/nba/truehoop/format/nav?site=raptorsrepublic" style="height: 35px; display:block; width: 100%;"></iframe></div></div>


    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bootstrap theme</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<div class="container">
        <div class="row">
        <div class="col-lg-12">
                <div class="responsive-ad" style="text-align:center">


                        <style>
                        .blog-header-responsive { width: 320px; height: 50px; }
                        @media(max-width: 467px) { .blog-header-responsive { width: 320px; height: 50px; } }
                        @media( (min-width: 468px) and (max-width: 727px) ) { .blog-header-responsive { width: 468px; height: 60px; } }
                        @media( (min-width: 728px) and (max-width: 969px) ) { .blog-header-responsive { width: 728px; height: 90px; } }
                        @media(min-width: 970px) { .blog-header-responsive { width: 970px; height: 90px; } }
                        </style>

                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Blog Header Responsive -->
                        <ins class="adsbygoogle blog-header-responsive"
                             style="display:inline-block"
                             data-ad-client="ca-pub-2862903819444632"
                             data-ad-slot="7307883701"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                </div>
 
        </div>
        </div>
        </div>

				<div class="container">
