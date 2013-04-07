<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h1><?php the_title(); ?></h1>

<?php the_content(); ?>

<?php
$args = array(

	'post_type'		=> 'testimonial',
	'numberposts'	=> -1,
	'orderby'		=> 'menu_order',
	'order'			=> 'asc'
);
$testimonials = get_posts( $args );

if ( count( $testimonials ) > 0 )
{
?>
<ul>
	<?php
	foreach ( $testimonials as $t )
	{
		$job = get_post_meta( $t->ID, 'job-title', true );
	?>
	<li>
		<h2><?php echo $t->post_title; ?><?php if ( $job != '' ) { ?> - <span><?php echo $job; ?></span><?php } ?></h2>
		<?php echo get_the_post_thumbnail( $t->ID, 'medium', array( 'class' => 'alignleft' ) ); ?>
		<?php echo $t->post_content; ?>
	</li>
	<?php
	}
	?>
</ul>
<?php } ?>

<?php endwhile; else: ?>

<p>Sorry, we couldn't find the page you're looking for.</p>

<?php endif; ?>

<?php get_footer(); ?>