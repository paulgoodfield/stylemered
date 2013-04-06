<?php get_header(); ?>

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

<?php get_footer(); ?>