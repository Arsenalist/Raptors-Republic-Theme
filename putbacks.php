                            <h3 class="heading">Put Backs</h3>
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                    'posts_per_page'=>18,
                                    //'cat' => '1595'
                                    'tag' => 'put-backs',
                                    'paged' => $paged
                                   );

                           $pb_query = new WP_Query($args);

 
 #                           query_posts($args); ?>
                            <?php if ($pb_query->have_posts()) : while ($pb_query->have_posts()) : $pb_query->the_post(); 
                                    $forum_link = get_forum_link();
                                    $post_link = $forum_link != null ? $forum_link : get_permalink();
                            ?>
                                <?php render_sidebar_article($post_link);?>
                            <?php endwhile; ?>	
                            <?php endif; ?>

