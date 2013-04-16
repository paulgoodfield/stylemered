<?php
// Determine if we're on blog page before post loop
global $is_blog;
$is_blog = ( is_page( 'blog' ) ) ? true : false;
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php bloginfo( 'name' ); ?> | <?php is_home() ? bloginfo( 'description' ) : wp_title(''); ?></title>
        <meta name="description" content="">

        <?php
        wp_head();

        $class = $post->post_type.'-'.$post->post_name;
        ?>
    </head>
    <body <?php echo body_class( $class ); ?>>

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper clearfix">

        	<header>

        		<a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/global/logo.png" width="244" height="105"></a>

        		<nav class="primary">

                    <?php
                    $defaults = array(

                        'menu'            => 'Primary Menu',
                        'container'       => false
                    );

                    wp_nav_menu( $defaults );
                    ?>

        		</nav>

        	</header>

        	<div class="main clearfix">

        		<div class="content">