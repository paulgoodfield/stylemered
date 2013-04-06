<?php get_header(); ?>

<?php
query_posts( 'post_type=post' );
if ( have_posts() ) :
?>

<h1>Blog</h1>

<?php
while ( have_posts() ) : the_post();
    
    $class = ( has_post_thumbnail() ) ? 'has-thumbnail ' : '';
?>

<article class="<?php echo $class; ?>clearfix">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'thumbnail' ); } ?>
    <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); ?>
    <a href="<?php echo get_permalink(); ?>" class="more">Read more</a>
</article>

<?php endwhile; else: ?>

<p>Sorry, we couldn't find the page you're looking for.</p>

<?php endif; ?>

<?php get_footer(); ?>