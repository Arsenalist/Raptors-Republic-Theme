<?php get_header(); ?>
			<div id="content" class="clearfix row">


               <div class="col-md-9">
                         <div class="page-header">
                    <h1>Raptors 905 <small>Toronto Raptors D-League Affiliate</small></h1>
                    </div>
 
 
                    <div class="row">
                      <div id="latest" class="col-sm-4">
                      <h3 class="hidden-xs heading">Latest</h3>
                            <?php get_template_part( 'raptors905-latest' ); ?> 
                      </div>		
                        <div id="featured" class="col-sm-8">        
                   <?php require_once('common.php'); ?>

                                <?php print_block('raptors905-post-game', 'Game Coverage')?>
                                <?php print_block('raptors905-news', 'Raptors905 News')?>
                                <?php print_block('raptors905-columns', 'Editorials')?>


 
 
                       </div>		
                       </div>		

                </div>
				<?php  get_sidebar('sidebar2'); // sidebar 1 ?>
			</div> <!-- end #content -->






<?php get_footer(); ?>
