			<footer role="contentinfo">
				<div id="inner-footer" class="clearfix">
		          <hr />
		          <div id="widget-footer" class="clearfix row">
                    <div class="col-lg-12">
                    <div class="row">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
                    </div>
                    </div>
		          </div>
					
					<nav class="clearfix">
						<?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
					<p class="attribution">&copy; <?php bloginfo('name'); ?></p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>


    <?php echo get_option('google_analytics_code')?>


        <script type="text/javascript">
            jQuery(document).ready(function() {

                jQuery('a.rsswidget').attr('target', '_blank');
                 if(jQuery().DataTable) {
                        jQuery('#freeagents').DataTable({"paging":   false});
                    }
            });


        </script>


<script>
<?php if (get_option('social_patreon_username')) {?>
// Function called if AdBlock is detected
function adBlockDetected() {
   var html = '<a href="http://patreon.com/<?php echo get_option('social_patreon_username')?>"><img class="img-responsive" src="<?php echo get_option('image_patreon_sidebar')?>" alt="Support <?php echo get_bloginfo('name'); ?> on Patreon"/></a>';
   jQuery('.ad300').replaceWith(html);
   
}
<?php }?>
// Recommended audit because AdBlock lock the file 'blockadblock.js' 
// If the file is not called, the variable does not exist 'blockAdBlock'
// This means that AdBlock is present
if(typeof blockAdBlock === 'undefined') {
    adBlockDetected();
} else {
    blockAdBlock.onDetected(adBlockDetected);
    // and|or
    blockAdBlock.on(true, adBlockDetected);
    // and|or
    blockAdBlock.on(true, adBlockDetected);
}

// Change the options
blockAdBlock.setOption('checkOnLoad', false);
// and|or
blockAdBlock.setOption({
    debug: false,
    checkOnLoad: true,
    resetOnEnd: false
});

</script>

	</body>

</html>
