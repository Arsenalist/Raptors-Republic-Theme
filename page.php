<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	
    
        <div class="row">
                            <?php echo get_featured_image()?>
</div>




    
    					
						<header>
							
							<div class="page-header"><h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1></div>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">


							<?php the_content(); ?>
	
<?php
if (is_page('90')) {
   include (TEMPLATEPATH . '/custom/articles.php');
} else if (is_page('71113')) {
   include (TEMPLATEPATH . '/custom/free-agents.php');
} else if (is_page('7650')) {
   include (TEMPLATEPATH . '/custom/rotd.php');
} else if (is_page('58153')) {
   include (TEMPLATEPATH . '/custom/biyombo.php');
} else if (is_page('11088')) {
   include (TEMPLATEPATH . '/custom/tweeps.php');
} else if (is_page('20601')) {
   include (TEMPLATEPATH . '/custom/live-chat.php');
} else if (is_page('57798')) {
   include (TEMPLATEPATH . '/custom/den-nyk-pick.php');
} else if (is_page('237')) {
   include (TEMPLATEPATH . '/custom/bios.php');


} else if (is_page('47891')) {

   include (TEMPLATEPATH . '/custom/instagram.php');

}
?>


    				
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ', ', '</p>'); ?>
							
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
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
