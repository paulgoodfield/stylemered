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