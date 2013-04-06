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

        <?php wp_head(); ?>
    </head>
    <body <?php echo body_class(); ?>>

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper clearfix">

        	<header>

        		<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/global/logo.png" class="logo"></a>

        		<nav>

        			<ul class="clearfix">
        				<li class="current-menu-item"><a href="#">Home</a></li>
        				<li><a href="#">About Me</a></li>
        				<li><a href="#">Editorial</a></li>
        				<li><a href="#">Personal Styling</a></li>
        				<li><a href="#">They Said</a></li>
        				<li><a href="#">Contact Me</a></li>
        				<li><a href="#">Blog</a></li>
        			</ul>

        		</nav>

        	</header>

        	<div class="main clearfix">

        		<div class="content">

                    <div class="flexslider">

                        <ul class="slides">

                            <?php
                            $args   = array(

                                'post_type'     => 'slide',
                                'numberposts'   => -1,
                                'orderby'       => 'menu_order',
                                'order'         => 'asc'
                            );
                            $slides = get_posts( $args );

                            foreach( $slides as $s )
                            {
                            ?>
                            <li><?php echo get_the_post_thumbnail( $s->ID, 'home-slide' ); ?></li>
                            <?php } ?>

                        </ul>

                    </div><!-- .flexslider -->

        		</div><!-- .content -->

        		<aside>

        			<h3>From the blog</h3>

                    <?php
                    $args   = array(

                        'numberposts'   => 1
                    );
                    $latest = get_posts( $args );

                    foreach( $latest as $l )
                    {
                    ?>

        			<article>

        				<h4><a href="<?php echo get_permalink( $l->ID ); ?>"><?php echo $l->post_title; ?></a></h4>
                        <time datetime="<?php echo date( 'Y-m-d', strtotime( $l->post_date ) ); ?>"><?php echo date( 'jS M Y', strtotime( $l->post_date ) ); ?></time>
        				<p><?php echo wp_trim_words( $l->post_content ); ?></p>

        			</article>

                    <?php } ?>

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

       <?php wp_footer(); ?>

    </body>
</html>