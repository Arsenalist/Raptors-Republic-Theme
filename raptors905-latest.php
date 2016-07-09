                            
                            <?php 
                               $args = array(
                                    'posts_per_page'=>'25',
                                    'cat' => '2149'
                                   );
 
                            query_posts($args); ?>
                            <?php 
                            
                                $latest_index = 0;
                                if (have_posts()) : while (have_posts()) : the_post(); 
                                    $forum_link = get_forum_link();
                                    $latest_index++;
                                    $post_link = $forum_link != null ? $forum_link : get_permalink();
                                    render_sidebar_article($post_link);
                            ?>

                                

                                <?php if ($latest_index == 2) { ?>
                                    <div style="margin: 20px 0; text-align: center;">
                                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- visible-xs ad on latest posts -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-2862903819444632"
     data-ad-slot="2389420901"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                    </div>
                                <hr class="hidden-xs"/>
                                <?php } ?>
                            <?php endwhile; ?>	
                            <?php endif; ?>

