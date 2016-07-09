<?php get_header(); ?>
<?php $is_single = true; ?>			
			<div id="content" class="clearfix row">







				<div id="main" class="col-lg-push-3 col-lg-6 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
    
    <div class="row">
                            <?php echo get_featured_image()?>
</div>


    					
						<header>
							<div class="page-header">
                            <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
                            
 							<p style="display:none" class="meta vcard author">

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
					<!--		
                            <div class="alert alert-danger">
                                <strong>NOTE:</strong> We have spots for <strong>two</strong> teams left in the Raptors Republic 3-on-3 tournament to be held
                                on June 21, 2015. <a href="http://www.raptorsrepublic.com/2015/03/20/summer-smackdown-rrs-3on3-basketball-tournament-is-back-sign-up-now/">Find details here, and register your team now</a>.
                            </div>
-->







							<?php the_content(); ?>


					
						</section> <!-- end article section -->
						
						<footer>
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","wpbootstrap"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					</article> <!-- end article -->
					



					
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
			
				</div> <!-- end #main -->

    
			</div> <!-- end #content -->

<?php get_footer(); ?>
