<style>
#latestlist {list-style: square; padding: 10px; margin: 0}
</style>
                            <div class="row" style="border: 1px solid #eee">
                            <?php
                                wp_reset_query() ;
                                $idx = 0;
                                if (have_posts()) : while (have_posts()) : the_post();  
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
                                        ?>

                              <?php if ($idx == 0) {?>
                    <a href="<?echo the_permalink()?>"  onclick="ga('send', 'event', 'Main Article Image Click', this.innerHTML, this.getAttribute('href')); return true;"><img class="img-responsive" style="width: 100%" src="<?php echo $image[0]; ?>"/></a>

                                <div class="col-sm-6">
                    <h2 style="color: black; font-size: 1.5em;  font-weight: bold"><?php if (is_sticky()) {?><span class="badge" style="background:#cc0000">Sticky</span> <?php }?><a style="color: black" onclick="ga('send', 'event', 'Main Article Title Click', this.innerHTML, this.getAttribute('href')); return true;" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a></h2>
                        <?php the_excerpt();?>
                               </div>
                                
                                <div class="col-sm-6" style="margin-top: 15px">
<ul id="latestlist">
                               <?php } else if ($idx < 6) {?>
                                    <li ><a style="font-size: 13px" onclick="ga('send', 'event', 'Home Page Latest Title Click', this.innerHTML, this.getAttribute('href')); return true;" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a></li>
                               <?php } else {  ?>
                               </ul>
                               </div>
            </div>
                               <?php break; } ?>



                                <?php 
                                $idx++;
                                endwhile; ?>	
                            <?php endif; ?>








