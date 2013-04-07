<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h1><?php the_title(); ?></h1>

<?php the_content(); ?>

<?php
$args = array(

	'post_type'		=> 'editorial',
	'numberposts'	=> -1,
	'orderby'		=> 'menu_order',
	'order'			=> 'asc'
);
$editorials = get_posts( $args );

if ( count( $editorials ) > 0 )
{
?>
<ul>
	<?php
	foreach ( $editorials as $e )
	{
		$args = array(

			'post_type' 		=> 'attachment',
			'posts_per_page'	=> -1,
			'post_parent'		=> $e->ID,
		);
		$attachments = get_posts( $args );

		$size = filesize( get_attached_file( $attachments[0]->ID ) );
	?>
	<li><a href="<?php echo wp_get_attachment_url( $attachments[0]->ID ); ?>" rel="external"><?php echo $e->post_title; ?></a> <span>( <?php echo number_format( $size/1000, 0 ); ?>kb )</span></li>
	<?php
	}
	?>
</ul>
<?php } ?>

<?php endwhile; else: ?>

<p>Sorry, we couldn't find the page you're looking for.</p>

<?php endif; ?>

<?php get_footer(); ?>