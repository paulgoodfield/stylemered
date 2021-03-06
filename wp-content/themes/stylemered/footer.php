        		</div><!-- .content -->

        		<aside>

                    <?php
                    // Show categories instead of latest post on Blog and Single pages
                    global $is_blog;
                    if ( $is_blog == true || is_category() || ( is_single() && get_post_type() == 'post' ) )
                    {
                    ?>
                    
                    <h3>Categories</h3>

                    <ul>
                        <?php
                        $args = array(
                            'title_li'      => '',
                            'show_count'    => 1
                        );
                        wp_list_categories( $args );
                        ?>
                    </ul>

                    <?php } else { ?>

        			<h3>From the blog</h3>

                    <?php
                        $args   = array(

                            'numberposts'   => 1
                        );
                        $latest = get_posts( $args );

                        foreach( $latest as $l )
                        {
                            setup_postdata( $l );
                    ?>

        			<article>

        				<h4><a href="<?php echo get_permalink( $l->ID ); ?>"><?php echo $l->post_title; ?></a></h4>
                        <time datetime="<?php echo date( 'Y-m-d', strtotime( $l->post_date ) ); ?>"><?php echo date( 'jS M Y', strtotime( $l->post_date ) ); ?></time>
        				<p><?php the_excerpt(); ?></p>

        			</article>

                    <?php
                        } // foreach( $latest)
                    } // if ( is_page( 'blog' ) )
                    ?>

                    <div class="twitter">

                        <h3>From twitter</h3>

                        <?php
                        require 'twitter/tmhOAuth.php';
                        require 'twitter/tmhUtilities.php';

                        $tmhOAuth = new tmhOAuth( array(

                            'consumer_key'    => 'xjnL4sosKr2HsyUExekgeQ',
                            'consumer_secret' => 'UqGwwECrKGhEzDvZ6PK3sBvEawbEfURMPXlKgVUPA',
                            'user_token'      => '558474844-GrB1U0JtF0URSh5zkBu7EACiKN2mfpIUvOBW9b6L',
                            'user_secret'     => 'aOyy1iT1wROBTfbxKHCAI6xSD8D4fBcq73CtvQSksY'
                        ));

                        $code = $tmhOAuth->request( 'GET', $tmhOAuth->url( '1.1/statuses/user_timeline' ), array(

                            'include_entities'      => '1',
                            'include_rts'           => '1',
                            'screen_name'           => 'stylemered',
                            'count'                 => 2
                        ));

                        if ( $code == 200 )
                        {
                            $timeline = json_decode( $tmhOAuth->response['response'], true );

                            foreach ( $timeline as $tweet ) :

                                $entified_tweet = tmhUtilities::entify_with_options( $tweet );

                                $diff = time() - strtotime( $tweet['created_at'] );

                                if ( $diff < 60*60 )
                                    $created_at = floor( $diff/60 ) . ' minutes ago';
                                elseif ( $diff < 60*60*24 )
                                    $created_at = floor( $diff/( 60*60 ) ) . ' hours ago';
                                else
                                    $created_at = date( 'd M', strtotime( $tweet['created_at'] ) );
                        ?>
                          <p><?php echo $entified_tweet; ?></p>
                          <time><?php echo $created_at; ?></time>
                        <?php
                            endforeach;
                        }
                        else
                        {
                        ?>
                        <p><?php tmhUtilities::pr($tmhOAuth->response); ?></p>
                        <?php } ?>

                    </div><!-- .twitter -->

        		</aside>

        	</div><!-- .main -->

            <footer>

                <ul class="clearfix">
                    <li class="twitter"><a href="http://twitter.com/stylemeredred" rel="external"></a></li>
                    <li class="facebook"><a href="http://www.facebook.com/pages/Style-Me-Red/529687507083720" rel="external"></a></li>
                </ul>

            </footer>

        </div><!-- .wrapper -->

       <?php wp_footer(); ?>

    </body>
</html>
