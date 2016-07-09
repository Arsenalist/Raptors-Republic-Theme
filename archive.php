<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-lg-8 clearfix" role="main">
				
					<div class="page-header">
					<?php if (is_category()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("", "wpbootstrap"); ?></span> <?php single_cat_title(); ?>
						</h1>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<span><?php _e("Posts Tagged:", "wpbootstrap"); ?></span> <?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Author:", "wpbootstrap"); ?></span> <?php echo get_the_author_meta('display_name'); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Daily Archives:", "wpbootstrap"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Monthly Archives:", "wpbootstrap"); ?>:</span> <?php the_time('F Y'); ?>
					    </h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Yearly Archives:", "wpbootstrap"); ?>:</span> <?php the_time('Y'); ?>
					    </h1>
					<?php } ?>
					</div>
                    <div class="row archive-row">
                            <?php
                                $loop_index = 0; 
                                if (have_posts()) : while (have_posts()) : the_post(); 
                                    $loop_index++;?>
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix col-lg-4'); ?> role="article">
                                        <div class="box">
                                            <div style="width: 100%; height: 160px; overflow:hidden">
                                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'large', array('class'=> 'full') ); ?></a></div>
                                            <div class="teaser">
                                                <h3><a href="<?php the_permalink() ?>" class="entry-title" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                                                <p class="vcard author"><span class="fn">By <?php the_author_posts_link()?></span></p>
                                                <span><time class="post_date date updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php echo the_time('M j, Y'); ?></time></span>
                                                <p>
                                                    <?php the_excerpt() ?>
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                <?php if ($loop_index % 3 == 0) {?>
                                    <div class="post-format-helper clearfix visible-lg-block"></div>
                                <?php }?>
                                <?php endwhile; ?>	
                            <?php endif; ?>
                     </div>
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="pager">
								<li class="previous"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
								<li class="next"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
