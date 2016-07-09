<?php get_header(); ?>
<?php $is_single = true; ?>			
			<div id="content" class="clearfix row">







				<div id="main" class="col-lg-push-1 col-lg-7 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                    <?php
                        $forum_link = get_forum_link();
                        if ($forum_link != null) { ?>
                            <script>
                            window.location.replace('<?php echo $forum_link?>');
                            </script>

                    <?php } ?>  
	
    
    <div class="row">
                            <?php echo get_featured_image()?>
</div>


    					
						<header>
							<div class="page-header">
                            <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
                            
 


 							<p class="meta vcard author">

                            <time class="post_date date updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
                            <?php if (date('MjY') === get_the_time('MjY')) { ?>
                                <?php //the_time(); ?>
                                <?php echo the_time('M j, Y'); ?>
                            <?php } else { ?>
                                <?php echo the_time('M j, Y'); ?>
                            <?php }  ?>
                            </time>
 

                            &middot; 
                            By <?php _e("", "wpbootstrap"); ?><span itemprop="author" class="fn"><?php the_author_posts_link(); ?></span> 
                            <?php 
                            $twitter_name = get_author_twitter_username();
                            if ($twitter_name != null) { ?>
                                <span style="text-transform: none; font-size: .9em">(<a style="text-transform: none;color: #e51c23" href="http://twitter.com/<?php echo $twitter_name?>">@<?php echo $twitter_name?></a>)</span>

                            <?php }
                            ?>

                            
                           </p>
    


                        
                            </div>

					
						</header> <!-- end article header -->

	
   
    				
						<section class="post_content clearfix" itemprop="articleBody">

							<?php the_content(); ?>


							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
                        <p>
                            <span class="categories"><?php the_category(' ')?></span>
							<?php the_tags('<span class="tag">', '</span> <span class="tag">', ' </span>'); ?>
						</p>	
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","wpbootstrap"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					</article> <!-- end article -->
					
<div class="row clearfix">
                        </div>
                    <div class="row clearfix">
                        <div class="text-center col-lg-12 clearfix">
    

                    <?php bootstrapwp_content_nav('nav-below');?>

            </div>
            </div>


<?php if (get_option('ad_after_post')) {?>
<div class="row clearfix">
<div class="text-center col-lg-12 clearfix">
    <?php echo get_option('ad_after_post');?>
</div>
</div>
<?php }?>


					
					<?php comments_template('',true); ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
                    <?php wp_reset_query();?>
			
				</div> <!-- end #main -->
                <div id="latest" class="col-lg-push-2 col-lg-3">
			    <?php  get_template_part('single-sidebar'); // sidebar 1 ?>
                    <?php wp_reset_query();
                    ?> 
	            </div>

    
			</div> <!-- end #content -->

<?php get_footer(); ?>
