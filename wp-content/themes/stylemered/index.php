<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Style Me Red</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,700|Lato:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body class="home">

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper clearfix">

        	<header>

        		<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/global/logo.png" class="logo"></a>

        		<nav>

        			<ul class="clearfix">
        				<li class="current-menu-item"><a href="#">Home</a></li>
        				<li><a href="#">About</a></li>
        				<li><a href="#">Case Studies</a></li>
        				<li><a href="#">Clients</a></li>
        				<li><a href="#">Packages</a></li>
        				<li><a href="#">Tips &amp; Cheats</a></li>
        				<li><a href="#">Contact Me</a></li>
        				<li><a href="#">Blog</a></li>
        			</ul>

        		</nav>

        	</header>

        	<div class="main clearfix">

        		<div class="content">

        			<img src="<?php echo get_template_directory_uri(); ?>/img/home/catwalk.jpg" width="730" height="487">

        		</div><!-- .content -->

        		<aside>

        			<h3>From the blog</h3>

        			<article>

        				<h4><a href="#">Article title</a></h4>
                        <time datetime="2012-03-12">13th March 2013</time>
        				<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

        			</article>

                    <div class="twitter">

                        <h3>From twitter</h3>

                        <p>Pellentesque habitant morbi tristique <a href="#">senectus et netus</a> et malesuada fames ac turpis egestas.</p>
                        <time>27 minutes ago</time>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                        <time>3 hours ago</time>

                    </div><!-- .twitter -->

        		</aside>

        	</div><!-- .main -->

            <footer>

                <ul class="clearfix">
                    <li class="twitter"><a href="#"></a></li>
                    <li class="facebook"><a href="#"></a></li>
                </ul>

            </footer>

        </div><!-- .wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>