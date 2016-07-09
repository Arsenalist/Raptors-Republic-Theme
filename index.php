<?php get_header(); ?>
<?php $is_home = true; ?>			
			<div id="content" class="clearfix row">
               <div class="col-md-9">
                    <div class="row">
                      <div id="latest" class="col-sm-4">
                      <h3 class="hidden-xs heading">Latest</h3>
                            <?php get_template_part( 'latest' ); ?> 
                      </div>		
                        <div id="featured" class="col-sm-8">

                    <?php require_once('common.php'); ?>
                                <?php
                                    $front_page_sections_data = json_decode(get_option("front_page_sections"));
                                    $front_page_sections = $front_page_sections_data->sections;
                                    foreach ($front_page_sections as $value) {
                                        print_block($value->category_slugs, $value->title);    
                                    }
                                ?>
 
 
 
                       </div>		
                       </div>		

                </div>
				<?php  get_sidebar('sidebar2'); // sidebar 1 ?>
			</div> <!-- end #content -->






<?php get_footer(); ?>
