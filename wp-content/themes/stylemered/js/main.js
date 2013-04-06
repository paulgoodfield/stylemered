$( window ).load( function()
{
	// EXTERNAL LINKS
	$( 'a[rel=external], .twitter a' ).click(function()
	{
		window.open( $( this ).attr( 'href' ) );
		return false;
	});

	// HOMEPAGE SLIDESHOW
	if ( $( 'body' ).hasClass( 'home' ) )
	{
		$( '.flexslider' ).flexslider({
			controlNav: 	false,
			directionNav: 	false
		});
	}

	// ANALYTICS
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
});