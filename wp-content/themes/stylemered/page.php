<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h1><?php the_title(); ?></h1>

<?php the_content(); ?>

<?php endwhile; else: ?>

<p>Sorry, we couldn't find the page you're looking for.</p>

<?php endif; ?>

<?php get_footer(); ?>