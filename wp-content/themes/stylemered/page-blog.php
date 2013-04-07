<?php get_header(); ?>

<?php
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args 	= array(

	'post_type'			=> 'post',
	'posts_per_page'	=> get_option( 'posts_per_page' ),
	'paged'				=> $paged
);
query_posts( $args );
if ( have_posts() ) :
?>

<h1>Blog</h1>

<?php
while ( have_posts() ) : the_post();
    
    $class = ( has_post_thumbnail() ) ? 'has-thumbnail ' : '';
?>

<article class="<?php echo $class; ?>clearfix">
    <?php if ( has_post_thumbnail() ) { ?>
    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
    <?php } ?>
    <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); ?>
    <a href="<?php echo get_permalink(); ?>" class="more">Read more</a>
</article>

<?php endwhile; ?>

<?php
global $wp_query;

$big = 999999999; // need an unlikely integer

$args = array(
	'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' 		=> '?paged=%#%',
	'current' 		=> max( 1, get_query_var('paged') ),
	'total' 		=> $wp_query->max_num_pages,
	'prev_text'    	=> '&lt;',
	'next_text'    	=> '&gt;'
);
$pagination = paginate_links( $args );
?>

<?php if ( $pagination != '' ) { ?>
<nav class="pagination">

	<?php echo $pagination; ?>

</nav>
<?php } ?>

<?php else: ?>

<p>Sorry, we couldn't find the page you're looking for.</p>

<?php endif; ?>

<?php get_footer(); ?>