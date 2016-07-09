                            
                            <?php 
                               $args = array(
                                    'posts_per_page'=>'25',
                                    'cat' => '-1419'
                                   );
 
                            
                            query_posts($args); ?>
                            <?php 
                            
                                $latest_index = 0;
                                if (have_posts()) : while (have_posts()) : the_post(); 
                                    $latest_index++;
                                    render_sidebar_article($latest_index < 10);
                            ?>

                                

                                <?php if ($latest_index == 2 && get_option('ad_in_latest_posts')) { ?>
                                    <div class="ad300" style="margin: 20px 0; text-align: center;">
                                          <?php echo get_option('ad_in_latest_posts'); ?>
                                    </div>
                                <hr class="hidden-xs"/>
                                <?php } ?>
                            <?php endwhile; ?>	
                            <?php endif; ?>

