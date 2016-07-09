<?php

/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)

// Shortcodes
require_once('library/shortcodes.php');

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

// Custom Backend Footer
add_filter('admin_footer_text', 'wp_bootstrap_custom_admin_footer');
function wp_bootstrap_custom_admin_footer() {
//	echo '<span id="footer-thankyou">Developed by <a href="http://320press.com" target="_blank">320press</a></span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.';
}

// adding it to the admin area
add_filter('admin_footer_text', 'wp_bootstrap_custom_admin_footer');

// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpbs-featured', 780, 300, true );
add_image_size( 'wpbs-featured-home', 970, 311, true);
add_image_size( 'wpbs-featured-carousel', 970, 400, true);

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function wp_bootstrap_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Main Sidebar',
    	'description' => 'Used on every page BUT the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
      'before_title' => '<h3 class="heading">',
      'after_title' => '</h3>'

    ));
    
    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Homepage Sidebar',
    	'description' => 'Used only on the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
       'before_title' => '<h3 class="heading">',
      'after_title' => '</h3>'
   ));
    
    register_sidebar(array(
      'id' => 'footer1',
      'name' => 'Footer 1',
      'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer2',
      'name' => 'Footer 2',
      'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer3',
      'name' => 'Footer 3',
      'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    
    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function wp_bootstrap_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard clearfix">
				<div class="avatar col-sm-3">
					<?php echo get_avatar( $comment, $size='75' ); ?>
				</div>
				<div class="col-sm-9 comment-text">
					<?php printf('<h4>%s</h4>', get_comment_author_link()) ?>
					<?php edit_comment_link(__('Edit','wpbootstrap'),'<span class="edit-comment btn btn-sm btn-info"><i class="glyphicon-white glyphicon-pencil"></i>','</span>') ?>
                    
                    <?php if ($comment->comment_approved == '0') : ?>
       					<div class="alert-message success">
          				<p><?php _e('Your comment is awaiting moderation.','wpbootstrap') ?></p>
          				</div>
					<?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
                    
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
			</div>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;<?php comment_author_link(); ?>
<?php 

}

/************* SEARCH FORM LAYOUT *****************/

/****************** password protected post form *****/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
	' . '<p>' . __( "This post is password protected. To view it please enter your password below:" ,'wpbootstrap') . '</p>' . '
	<label for="' . $label . '">' . __( "Password:" ,'wpbootstrap') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__( "Submit",'wpbootstrap' ) . '" /></div>
	</form></div>
	';
	return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

// filter tag clould output so that it can be styled by CSS
function add_tag_class( $taglinks ) {
    $tags = explode('</a>', $taglinks);
    $regex = "#(.*tag-link[-])(.*)(' title.*)#e";

    foreach( $tags as $tag ) {
    	$tagn[] = preg_replace($regex, "('$1$2 label tag-'.get_tag($2)->slug.'$3')", $tag );
    }

    $taglinks = implode('</a>', $tagn);

    return $taglinks;
}

add_action( 'wp_tag_cloud', 'add_tag_class' );

add_filter( 'wp_tag_cloud','wp_tag_cloud_filter', 10, 2) ;

function wp_tag_cloud_filter( $return, $args )
{
  return '<div id="tag-cloud">' . $return . '</div>';
}

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Disable jump in 'read more' link
function remove_more_jump_link( $link ) {
	$offset = strpos($link, '#more-');
	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_jump_link' );

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Add the Meta Box to the homepage template
function add_homepage_meta_box() {  
	global $post;

	// Only add homepage meta box if template being used is the homepage template
	// $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : "");
	$post_id = $post->ID;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

	if ( $template_file == 'page-homepage.php' ){
	    add_meta_box(  
	        'homepage_meta_box', // $id  
	        'Optional Homepage Tagline', // $title  
	        'show_homepage_meta_box', // $callback  
	        'page', // $page  
	        'normal', // $context  
	        'high'); // $priority  
    }
}

add_action( 'add_meta_boxes', 'add_homepage_meta_box' );

// Field Array  
$prefix = 'custom_';  
$custom_meta_fields = array(  
    array(  
        'label'=> 'Homepage tagline area',  
        'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  
        'id'    => $prefix.'tagline',  
        'type'  => 'textarea' 
    )  
);  

// The Homepage Meta Box Callback  
function show_homepage_meta_box() {  
  global $custom_meta_fields, $post;

  // Use nonce for verification
  wp_nonce_field( basename( __FILE__ ), 'wpbs_nonce' );
    
  // Begin the field table and loop
  echo '<table class="form-table">';

  foreach ( $custom_meta_fields as $field ) {
      // get value of this field if it exists for this post  
      $meta = get_post_meta($post->ID, $field['id'], true);  
      // begin a table row with  
      echo '<tr> 
              <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
              <td>';  
              switch($field['type']) {  
                  // text  
                  case 'text':  
                      echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;
                  
                  // textarea  
                  case 'textarea':  
                      echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;  
              } //end switch  
      echo '</td></tr>';  
  } // end foreach  
  echo '</table>'; // end table  
}  

// Save the Data  
function save_homepage_meta( $post_id ) {  

    global $custom_meta_fields;  
  
    // verify nonce  
    if ( !isset( $_POST['wpbs_nonce'] ) || !wp_verify_nonce($_POST['wpbs_nonce'], basename(__FILE__)) )  
        return $post_id;

    // check autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    // check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
    }
  
    // loop through fields and save the data  
    foreach ( $custom_meta_fields as $field ) {
        $old = get_post_meta( $post_id, $field['id'], true );
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta( $post_id, $field['id'], $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, $field['id'], $old );
        }
    } // end foreach
}
add_action( 'save_post', 'save_homepage_meta' );

// Add thumbnail class to thumbnail links
function add_class_attachment_link( $html ) {
    $postid = get_the_ID();
    $html = str_replace( '<a','<a class="thumbnail"',$html );
    return $html;
}
add_filter( 'wp_get_attachment_link', 'add_class_attachment_link', 10, 1 );


if ( ! function_exists( 'bootstrapwp_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function bootstrapwp_content_nav( $nav_id ) {
	global $wp_query;

	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bootstrapwp' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bootstrapwp' ) . '</span>' ); ?>
</ul>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
<ul class="pager">
		<?php if ( get_next_posts_link() ) : ?>
		<li class="next"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<li class="previous"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>
</ul>
	<?php endif; ?>

	<?php
}
endif; // bootstrapwp_content_nav

// Add lead class to first paragraph
function first_paragraph( $content ){
    global $post;

    // if we're on the homepage, don't add the lead class to the first paragraph of text
    if( is_page_template( 'page-homepage.php' ) )
        return $content;
    else
        return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
#add_filter( 'the_content', 'first_paragraph' );

// Menu output mods
class Bootstrap_walker extends Walker_Nav_Menu{

  function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0){

	 global $wp_query;
	 $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	 $class_names = $value = '';
	
		// If the item has children, add the dropdown class for bootstrap
		if ( $args->has_children ) {
			$class_names = "dropdown ";
		}
	
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		
		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
       
   	$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

   	$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
   	$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
   	$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
   	$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

   	// if the item has children add these two attributes to the anchor tag
   	// if ( $args->has_children ) {
		  // $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
    // }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
    $item_output .= $args->link_after;

    // if the item has children add the caret just before closing the anchor tag
    if ( $args->has_children ) {
    	$item_output .= '<b class="caret"></b></a>';
    }
    else {
    	$item_output .= '</a>';
    }

    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
  } // end start_el function
        
  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
      
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
        $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }        
}

add_editor_style('editor-style.css');

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
	}
  
  return $classes;
}


// enqueue styles
if( !function_exists("theme_styles") ) {  
    function theme_styles() { 
        // This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
        wp_deregister_script('jquery');
        wp_register_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', array(), '', 'all' );
        wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Lora:400,700', array(), '', 'all' );
        wp_register_script( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js', array(), '3.3d', 'all' );
        wp_register_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array(), '3.3.1', 'all' );
        wp_register_script( 'datatables-js', '//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js', array(), '3.3.1', 'all' );
        wp_register_script( 'rr-js', get_template_directory_uri() . '/js/rr.js', array(), '21', 'all' );
//        wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '', 'all' );
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'google-fonts' );
  //      wp_enqueue_style( 'font-awesome' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'bootstrap-js' );
        wp_enqueue_script( 'rr-js' );

        // For child themes
        wp_register_style( 'wpbs-style', '/wp-content/themes/rr/style.css', array(), '1', 'all' );
        wp_register_style( 'datatables-style', '//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css', array(), '2ff10ffx', 'all' );
        wp_enqueue_style( 'wpbs-style' );

        if (is_page('71113')) {
            wp_enqueue_script( 'datatables-js' );
            wp_enqueue_style( 'datatables-style' );

        }
    }
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function wpdocs_dequeue_script() {
            wp_deregister_script( 'jquery' ); 
            wp_dequeue_script( 'jquery' ); 
            wp_dequeue_script( 'jquery-core' ); 
            wp_dequeue_script( 'jquery-migrate' ); 
} 
//add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );

// enqueue javascript
if( !function_exists( "theme_js" ) ) {  
  function theme_js(){
  /*
    wp_register_script( 'bootstrap', 
      get_template_directory_uri() . '/library/js/bootstrap.min.js', 
      array('jquery'), 
      '1.2' );
    wp_register_script( 'wpbs-scripts', 
      get_template_directory_uri() . '/library/js/scripts.js', 
      array('jquery'), 
      '1.2' );
  
    wp_register_script(  'modernizr', 
      get_template_directory_uri() . '/library/js/modernizr.full.min.js', 
      array('jquery'), 
      '1.2' );
  
//    wp_enqueue_script('bootstrap');
    wp_enqueue_script('wpbs-scripts');
    wp_enqueue_script('modernizr');
  */
    
  }
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

// Get <head> <title> to behave like other themes
function wp_bootstrap_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() ) {
    return $title;
  }

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title = "$title $sep $site_description";
  }

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) {
    $title = "$title $sep " . sprintf( __( 'Page %s', 'wpbootstrap' ), max( $paged, $page ) );
  }

  return $title;
}
add_filter( 'wp_title', 'wp_bootstrap_wp_title', 10, 2 );

class Rapcast_Widget extends WP_Widget {
    function Rapcast_Widget() {
        // Instantiate the parent object
        parent::__construct( false, 'Rapcast' );
    }
    public function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;
        echo $before_title;
        echo '<span class="glyphicon glyphicon-headphones"></span><a class="widget-link" href="' . get_category_link(573)  .'">Podcasts</a>';
        echo $after_title;
        $this->render();
        echo $after_widget;
    }
    function render() { ?>
        <iframe width="100%" height="315" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/9766685&amp;color=e51c23&amp;auto_play=false&amp;hide_related=false&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false"></iframe>
    <?php
    }
}


class RRLatestPosts_Widget extends WP_Widget {
    function RRLatestPosts_Widget() {
        // Instantiate the parent object
        parent::__construct( false, 'RRLatestPosts' );
    }
    public function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;
        echo $before_title;
        echo 'Latest';
        echo $after_title;
        $this->render();
        echo $after_widget;
    }
    function render() { ?>


                            <?php 
                                $args = array(
                                    'posts_per_page'=>'7',
                                    'cat' => '-1419'
                                   );
 
                            
                            query_posts( $args ); ?>
                            <?php 
                            
                                $latest_index = 0;
                                if (have_posts()) : while (have_posts()) : the_post(); 
                                    $latest_index++;
                                    $forum_link = get_forum_link();
                                    $post_link = $forum_link != null ? $forum_link : get_permalink();
                                    render_sidebar_article($post_link);
                            ?>

                            <?php endwhile; ?>	
                            <?php endif; ?>
    <?php
    }
}





class Forum_Widget extends WP_Widget {
    function Forum_Widget() {
        // Instantiate the parent object
        parent::__construct( false, 'Forum' );
    }
    public function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;
        echo $before_title;
        echo 'RR Forums';
        echo $after_title;
        $this->forum_feature();
        echo $after_widget;
    }

    function get_topics() {
        include_once( ABSPATH . WPINC . '/feed.php' );
        $rss = fetch_feed( 'http://pipes.yahoo.com/pipes/pipe.info?_id=b8cff9463e8e04db05c26c59f9d747ed' );
        if ( ! is_wp_error( $rss ) ) {
            $maxitems = $rss->get_item_quantity( 10 ); 
            $rss_items = $rss->get_items( 0, $maxitems );
        }
        return $rss_items;
    }

    function forum_feature() {
        
        wp_reset_query();
        query_posts('posts_per_page=1&cat=1419');
        if (have_posts()) : while (have_posts()) : the_post(); 
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb');
        $post_link = get_forum_link();
        $rss_items = $this->get_topics();
        if (!is_array($rss_items)) {
            $rss_items = array();    
        }
        ?>
        
            <div class="media">
                    <a class="pull-left" href="<?php echo $post_link ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'class' => 'media-object img-square square')); ?></a>

                <div class="media-body">
                    <div class="meta">Featured</div>
                    <div class="media-heading">
                    <h4 class="item-headline">
                    <a href="<?php echo $post_link ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                    </div>
                </div>
            </div>
                  <ul class="flat" style="margin-top: 10px">
                        <?php foreach ( $rss_items as $item ) : ?>
                            <li><a href="<?php echo esc_url( $item->get_permalink() ); ?>"><?php echo esc_html( $item->get_title() ); ?></a></li>
                        <?php endforeach; ?>
                  </ul>
                                <?php endwhile; ?>	
                            <?php endif; ?>

    <?php 

    }
}

class Reddit_Widget extends WP_Widget {
    function Reddit_Widget() {
        // Instantiate the parent object
        parent::__construct( false, 'Reddit Links' );
    }
    public function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;
        echo $before_title;
        echo 'Latest Web Articles';
        echo $after_title;
       
        $this->render();
        echo $after_widget;
    }
    function render() { ?>
        <script>
        function show_reddit(json) {
          str = '<ul class="reddit-widget">';

        for (var i=0; i<json.data.children.length; i++) {
          link = json.data.children[i];
          str += '<li class="clearfix">';
          str += '<div class="reddit-meta">' + link.data.domain + '</div><a onclick="ga(\'send\', \'event\', \'Latest Web Articles Click\', this.innerHTML, this.getAttribute(\'href\')); return true;" href="' + link.data.url + '">' + link.data.title + '</a>';
          str += '</li>';
        }
        str += '</ul>';
        document.getElementById("reddit-widget").innerHTML = str;
        }
        </script>
        <div id="reddit-widget"></div>
        <script src="http://www.reddit.com/r/rtz.json?jsonp=show_reddit&limit=20" type="text/javascript"></script>
    <?php }
}


class UpcomingGames_Widget extends WP_Widget {
    function UpcomingGames_Widget() {
        // Instantiate the parent object
        parent::__construct( false, 'Up Next' );
    }
    public function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;
        echo $before_title;
        echo '<span class="glyphicon glyphicon-calendar"></span> Schedule';
        echo $after_title;
       
        $this->upcoming();
        echo $after_widget;
    }

    function upcoming() {
       date_default_timezone_set ("America/Toronto");
       $c = file_get_contents(get_option('thescore_recent_games_url'));
       $results = json_decode($c);

 
       $c = file_get_contents(get_option('thescore_upcoming_games_url'));
       $json = json_decode($c);
       $clean = array();
       ?>
       <div class="row schedule">
       <div class="col-lg-6 col-xs-6">
       <h4>Up Next</h4>
       <ul class="list-unstyled">
       <?php foreach ($json as $g) {
         $c = file_get_contents("https://api.thescore.com" . $g->api_uri);
         $event = json_decode($c);
         $tvs = $event->tv_listings;
         $tv_string = "";
         foreach ($tvs as $tv) {
            if (preg_match('/(TSN|TSN2|TSN3|TSN4|SNET|SNET1|ESPN|ESPN2|TNT)/', $tv->short_name))
                $tv_string .= $tv->short_name . ", ";    
         }
         if ($tv_string == "" && count($tvs) != 0) {
             $tv_string = $tvs[count($tvs) - 1]->short_name;
         }
         $tv_string = rtrim($tv_string, ", ");
         $unix = strtotime($event->game_date);
         $newformat = date('M j, g:i', $unix);
         $other = $g->away_team->abbreviation == "TOR" ? $g->home_team : $g->away_team;
         $location = $g->away_team->abbreviation == "TOR" ? "@" : "vs"; ?>
            <li class="clearfix">
               <!--  <img src="<?php echo $other->sportsnet_logos->tiny;?>" class="pull-left" style="margin-right: 5px"/> -->
                    <div class="pull-left">
                    <?php echo $location?> <?php echo $other->medium_name?><br/>
                    <span style="font-size: .8em" class="text-muted"><?php echo $newformat?> <?php echo $tv_string?></span>
                    </div>
            </li>
       <?php } ?>
       </ul>
       </div>
       <div class="col-lg-6 col-xs-6">
       <h4>Previous</h4>
        <ul class="list-unstyled">
            <?php foreach ($results as $g) { 
                 $other = $g->away_team->abbreviation == "TOR" ? $g->home_team : $g->away_team;
                 $raptors = $g->away_team->abbreviation == "TOR" ? 'away' : 'home';
                 $location = $g->away_team->abbreviation == "TOR" ? "@" : "vs"; 
                 $home_win = $g->box_score->score->home->score > $g->box_score->score->away->score;
                 $raptors_win = ($home_win && $raptors == "home") || ($raptors == "away" && !$home_win);  

                 $c = file_get_contents("https://api.thescore.com" . $g->api_uri);
                 $event = json_decode($c);


                 ?>
                
                    <li class="clearfix">
                 <!--       <img class="pull-left" src="<?php echo $other->sportsnet_logos->tiny;?>" style="margin-right: 5px"/> -->
                        <div class="pull-left">
                            <?php echo $location?> <?php echo $other->medium_name?><br/>
                            <span style="font-size: .8em" class="text-muted"><a href="<?php echo $event->share_url?>"><?php echo $raptors_win ? "W" : "L"?> <?php echo $g->box_score->score->away->score?>-<?php echo $g->box_score->score->home->score?></a></span>
                        </div>
                    </li>
            <?php } ?>
      </div>
       </div>
       <?php
    }
}

function get_forum_link() {
    $custom_fields = get_post_custom();
    if (array_key_exists('forumlink', $custom_fields)) {
        $forum_link = $custom_fields['forumlink'];
        $post_link = $forum_link[0];
        return $post_link;
    }
    return null;
}


class Rotd_Widget extends WP_Widget {
    function Rotd_Widget() {
        // Instantiate the parent object
        parent::__construct( false, 'ROTD' );
    }
    public function widget( $args, $instance ) {
        extract($args);
        global $wpdb;
        echo $before_widget;
        echo $before_title;
        echo 'Rap of the Day';
        echo $after_title;

        $rotd = $wpdb->get_row('SELECT * FROM rr_rotd ORDER BY ts DESC LIMIT 1');
        ?>
        <div class="textwidget">
                <?echo nl2br($rotd->comment);?>

        <div style="text-align: right;"><a href="<?echo $rotd->link;?>" style="color: rgb(204, 0, 0);"><?echo $rotd->author;?></a></div>
        </div>
        <?php echo $after_widget;
    }
}

function display_podcast_list($query) {
    global $post;
    wp_reset_query();
    query_posts($query);
    $loop_index = 0;
    if (have_posts()) : while (have_posts()) : the_post(); 
            $loop_index++;?>
            <?php if ($loop_index < 3) {?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix well latest-podcasts'); ?> role="article">
                    <header>
                        <h3><a class="entry-title" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                                                <p class="vcard author"><span class="fn">By <?php the_author_posts_link()?></span></p>
                                                <span><time class="post_date date updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php echo the_time('M j, Y'); ?></time></span>
 



                    </header> <!-- end article header -->
                    <section class="post_content">
                        <?php the_excerpt(); ?>
                        <?php echo extract_soundcloud_widget($content = apply_filters ("the_content", $post->post_content)) ?>
                    </section> <!-- end article section -->
                </article> <!-- end article -->
            <?php } else { ?>
            <?php if ($loop_index == 3) {?>
            <h4>Older Podcasts</h4>
            <?php }  ?>
            <ul class="list-group">
                <li class="list-group-item older-podcasts"><h5><a class="entry-title" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                <p><?php the_excerpt(); ?></p></li>
            </ul>
            <?php }  
    endwhile; 	
    endif; 	

}
function extract_soundcloud_widget($html) {
    require_once( 'ext/phpQuery.php' );
    $doc = phpQuery::newDocument($html);
    return pq("iframe[src*='soundcloud']", $doc->getDocumentID())->attr("width", "100%")->attr("height", "400");

}



    register_widget( 'RRLatestPosts_Widget' );
    register_widget( 'Rapcast_Widget' );
    register_widget( 'UpcomingGames_Widget' );
    register_widget( 'Forum_Widget' );
    register_widget( 'Reddit_Widget' );
    register_widget( 'Rotd_Widget' );
    add_filter( 'show_admin_bar', '__return_false' );


$author_info = array(

    'thompson' =>  array('twitter_username' => 'MarmaladeJacko'),

    'blake' =>  array('twitter_username' => 'BlakeMurphyODC', 'pic' => 'http://i.imgur.com/apofCyL.jpg'),

    'tamberlyn' =>  array('twitter_username' => 'TTOTambz', 'pic' => 'http://i.imgur.com/G4IC4nU.jpg'),

    'phdsteve' =>  array('twitter_username' => 'therealphdsteve'),

    'hinchey' => array('twitter_username' => 'garretthinchey', 'pic' => 'http://i.imgur.com/zxYczQl.jpg'),

    'shyam' => array('twitter_username' => 'ShyamBaskaran', 'pic' => 'http://www.raptorsrepublic.com/wp-content/uploads/2015/09/shyam1.jpg'),
    'j.priemski' => array('twitter_username' => 'HoopPlusTheHarm', 'pic' => 'http://www.raptorsrepublic.com/wp-content/uploads/2015/10/jp.jpg'),

    'Raps Fan' => array('twitter_username' => 'rapsfan', 'pic' => 'http://www.raptorsrepublic.com/wp-content/uploads/2014/10/sam-80x80.png'),

    'jmpoulard' => array('twitter_username' => 'ShyneIV'),

    'timw' => array('twitter_username' => 'the_picketfence'),

    'william' => array('twitter_username' => 'william_lou', 'pic' => 'http://i.imgur.com/I7wNy1A.jpg'),

    'Arsenalist' => array('twitter_username' => 'CornerSniper', 'pic' => 'http://i.imgur.com/9RFDUJl.jpg'),
    'matt' => array('twitter_username' => 'm_shantz', 'pic' => 'http://www.raptorsrepublic.com/wp-content/uploads/2015/12/mattshantz.jpg'),
    'greg' => array('twitter_username' => 'votaryofhoops', 'pic' => 'http://i.imgur.com/CQ2u9dy.jpg'),

    'timp' => array('twitter_username' => 'timpchisholm'),

    'forumcrew' => array('twitter_username' => 'DocNaismith'),

    'nick' => array('twitter_username' => 'NickReynoldson'),

    'barry' => array('twitter_username' => 'btjokes'),

    'ryan' => array('twitter_username' => 'hoopsaddict', 'pic' => 'http://i.imgur.com/k6fmnuG.jpg'),

    'mholian' => array('twitter_username' => 'Holi_Smokes', 'pic' => 'http://www.raptorsrepublic.com/wp-content/uploads/2015/02/michaelholian.jpg')

);






function get_author_image($author_id=null) {
  global $author_info;
  $login = $author_id ? get_the_author_meta('user_login', $author_id) : get_the_author_meta('user_login');
  if (array_key_exists($login, $author_info) && array_key_exists('pic', $author_info[$login])) {
    return $author_info[$login]['pic'];
  }
  return "http://www.raptorsrepublic.com/wp-content/uploads/2013/11/Raptors_Republic_-_Logo_Design.png";
}


function get_article_twitter_username($author_id=null) {
    $name = get_author_twitter_username($author_id);
    return $name == null ? get_option('social_twitter_username') : $name;
}

function get_author_twitter_username($author_id=null) {
  global $author_info;
  $login = $author_id ? get_the_author_meta('user_login', $author_id) : get_the_author_meta('user_login');
  if (array_key_exists($login, $author_info) && array_key_exists('twitter_username', $author_info[$login])) {
    return $author_info[$login]['twitter_username'];
  }
  return null;
}

require_once( get_template_directory() . '/shortcodes.php' );
add_image_size( 'square', 80, 80, False ); 
// Allow this stuff in the content editor so that the player rater can be pasted.
$div_allowed = $allowedposttags["div"];
$div_allowed["data-player-id"] = array();
$allowedposttags["div"] = $div_allowed;
$allowedposttags["iframe"] = array(
  "tab-index" => array(),
  "style" => array(),
  "data-game-id" => array(),
  "hidden" => array(),
  "data-team-id" => array(),
  "id" => array(),
  "src" => array(),
  "height" => array(),
  "width" => array()
);
$allowedposttags["script"] = array(
  "src" => array(),
  "async" => array()
);

// For GFY stuff
$div_allowed = $allowedposttags["img"];
$div_allowed["data-id"] = array();
$allowedposttags["img"] = $div_allowed;

add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-{$cat->slug}.php"; } return $t;' )); 
add_filter('single_template', create_function('$t', 'foreach( (array) get_the_tags() as $tag) { if ( file_exists(TEMPLATEPATH . "/single-{$tag->slug}.php") ) return TEMPLATEPATH . "/single-{$tag->slug}.php"; } return $t;' )); 

function center_tweet($content) {
    return str_replace('class="twitter-tweet', 'align="center" class="twitter-tweet"', $content);
}


add_filter( 'the_content', 'in_post_ad' );
add_filter( 'the_content', 'featured_image' );
add_filter( 'the_content', 'pre_content_ad' );
add_filter( 'the_content', 'center_tweet' );
add_filter( 'the_content', 'social_promo' );
add_filter( 'the_content', 'patreon_promo' );


function pre_content_ad($content) {
    $ad = get_option('ad_after_article_title') ? '<div class="row"><div class="col-xs-12 text-center">' . get_option('ad_after_article_title')  .'</div></div>' : '';
    return $ad . $content;

}

function get_featured_image() {
      $post = $GLOBALS['post'];
                setup_postdata($post);
                $custom_fields = get_post_custom();
                $hideFeatured = array_key_exists('hide_featured_image', $custom_fields);
                if (!$hideFeatured) {
                    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                    $large_image_url = $large_image_url[0];
                    $image = '<figure><img src="' . $large_image_url . '" class="full single-featured"/><figcaption style="color: #767676; font-size: .8em; margin-top: 3px">'
        . get_post(get_post_thumbnail_id())->post_excerpt . '</figcaption></figure>';
return $image;
    } else {
        return "";
    }


}
function featured_image($content) {
    if (is_feed()) {
        return "<div class='row'>" . get_featured_image() . "</div>" . $content;
    }
    return $content;
}

function patreon_promo($content) {
    if (is_page() || !get_option('social_patreon_username')) return $content;

      $post = $GLOBALS['post'];
      if (has_tag('Clean', $post)) {
        return $content;
      }


    //return $content . "<a onclick=\"ga('send', 'event', 'Promos', 'Summer Slam 2016 ', 'http://www.raptorsrepublic.com/2016/05/13/summer-smackdown-rrs-3on3-basketball-tournament-back-sign-now-2/'); return true;\"  href=\"http://www.raptorsrepublic.com/2016/05/13/summer-smackdown-rrs-3on3-basketball-tournament-back-sign-now-2/\"><img src=\"http://www.raptorsrepublic.com/wp-content/uploads/2016/05/summerslam-2.jpg\"/></a>";
    return $content . "<a onclick=\"ga('send', 'event', 'Promos', 'Patreon Post Bottom ', 'http://patreon.com/" . get_option('social_patreon_username') . "'); return true;\"  href=\"http://patreon.com/" . get_option('social_patreon_username') . "\"><img src=\"" . get_option('image_patreon_article_bottom') ."\"/></a>";
}

function social_promo($content) {
        if (is_page()) return $content;
       $post = $GLOBALS['post'];

      if (has_tag('Clean', $post)) {
        return $content;
      }


       $twitter = get_the_author_meta('twitter'); 
       $str = '<a href="https://twitter.com/' . get_option('social_twitter_username') . '"  class="twitter-follow-button" data-show-count="true">Follow @' . get_option('social_twitter_username') . '</a>';

        if ($twitter) {
            $str .= '<br/><a href="https://twitter.com/' . $twitter .'"  class="twitter-follow-button" data-show-count="true">Follow @' . $twitter .'</a>';
        }
        //$str .= '<div class="fb-follow" data-href="https://www.facebook.com/raptorsrepublic" data-layout="standard" data-show-faces="true"></div>';
        return $content.$str;
    
}

function in_post_ad($content) {
    $content = str_replace("&nbsp;", "", $content);
    $num_paras = count(explode ( "</p>", $content ));

    if( !is_single() )
        return $content;

       $css = "";
    $ad = '<div class="in-post-ad">' . get_option('ad_in_post') . '</div>';
        
       $social = "";

      $post = $GLOBALS['post'];
      setup_postdata($post);
 
       if (has_category('Quick Reaction', $post)) {
        return insert_after_tag($content, "<tr><td colspan='3' align='center' style='text-align:center'>$ad</tr>", 'tr', 5);
        }
     
      if (has_tag('Clean', $post)) {
        return $content;
      }
     //   $content a= $content . $css . $ad;

        return insert_after_tag($content, $ad, 'p', floor($num_paras/2));
        /*
      if (has_category('Quick Reaction', $post)) {
        return insert_after_tag($content, $css . $ad, 'table', 1);
      } else if ($num_paras > 5){
        return insert_after_tag($content, $css.$ad, 'p', floor($num_paras/2));
      } else {
        return $content . $css . $ad;
      }*/
}



function insert_after_tag($content, $fragment, $tag, $occurrence) {
        if ($occurrence == -1) {
            return $fragment . $content;    
        }
        $content = explode ( "</$tag>", $content );
        if (count($content) <= 3) {
            $occurrence = 0;    
        }
        for ( $i = 0; $i < count ( $content ); $i ++ ) {
            if ( $i == $occurrence ) {
                $new_content .= $fragment;
            }
            $new_content .= $content[$i] . "</$tag>";
        }

        return $new_content;  
}


function smart_date() {
    $posted_today = get_the_time('Ymd') === date('Ymd');
    //return $posted_today ? get_the_time('g:i A') : get_the_time('M j');
    return get_the_time('M j, Y');
}



function meta_tags() { ?>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:domain" content="raptorsrepublic.com">
    <meta property="fb:admins" content="28121195"/>
    <meta property="fb:app_id" content="125387554216"/>
    <meta name="bitly-verification" content="ea9cccc73b87"/>


    <?php if ( is_home() ) { ?>
        <title><?php echo get_bloginfo()?></title>
        <meta name="twitter:description" content="<?php echo get_bloginfo('description');?>" />
        <meta name="description" content="<?php echo get_bloginfo('description');?>" />
        <meta name="og:description" content="<?php echo get_bloginfo('description');?>" />
        <meta name="twitter:site" content="@raptorsrepublic"/>
    <?} else { ?>
        <title><?php  wp_title( '|', true, 'right' ) ?></title>
    <?}?>



    <?php if (is_singular()) {?>
     <meta name="og:description" content="<?php echo strip_tags(get_the_excerpt()) ?>" />
     <meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt()) ?>" />
     <meta name="description" content="<?php echo strip_tags(get_the_excerpt()) ?>" />
   <?php } ?>

    <?php if ( is_single() ) { ?>
        <meta name="twitter:url" content="<?php the_permalink() ?>">
        <meta name="twitter:creator" content="@<?php echo get_article_twitter_username($post->post_author)?>">
        <meta property="og:type" content="article" />
        <?php 
        if ( !has_post_thumbnail() ) { 
            $url = get_gfy_url(true);
            echo '<meta property="og:image" content="' . $url .'" />';
        }
    }

}

    function aside_handler( $attrs, $content = null ) {
       $str = '<div class="aside panel panel-default">';
       if (is_array($attrs) && array_key_exists('header', $attrs)) {
           $str.= '<div class="panel-heading">' . $attrs['header'] . '</div>';
       }
       $str .= '<div class="panel-body">' . $content . '</div>';
       $str .= '</div>';
       return $str;
 
    }
add_action('wp_head','meta_tags');
/*

    function aside_shortcode_handler( $attrs, $content = null ) {
       $str = '<div class="panel panel-default">';
       if (array_key_exists('header', $attrs)) {
           $str.= '<div class="panel-heading">' . $attrs['header'] . '</div>';
       }
       $str .= '<div class="panel-body">' . $content . '</div>';
       $str .= '</div>';
       return $str;
    }


*/

    add_shortcode( 'aside', 'aside_handler' );
    add_shortcode( 'posts_summary', 'posts_summary' );


    function gfy_handler( $attrs, $content = null ) {
       return '<div class="gfyitem" data-title=true data-autoplay=false data-controls=true data-expand=true  data-id="' . $content .'" ></div><a class="text-center" style="display:block; font-size: .8em;; color: #848482" href="http://www.gfycat.com/' . $content .'">Direct Link</a>';
    }


    add_shortcode( 'gfy', 'gfy_handler' );


/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a bootstrap.
 */
function soundcloud_get_tracks() {
	$json_url = get_option('soundcloud_tracks_url') . '?client_id=' . get_option('soundcloud_client_id');
  
	$ch = curl_init( $json_url );
 
	$options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => array('Accept: application/json')
	);
 
	// Setting curl options
	curl_setopt_array( $ch, $options );
 
	// Getting results
	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		error_log("CURL error when accessing soundcloud.");
		$result = null;
	} else {
		$result = json_decode($result);
	}
	curl_close($ch);
    $filtered = array();
    foreach ($result as $r) {
        // if the skip-sidebar tag exists, then don't add it to list
        if (strpos($r->tag_list, 'skip-sidebar') !== false) {
        } else {
            array_push($filtered, $r);
        }
    }
    //return $result;
    return $filtered;
}

function sc_alt() {
	$tracks = soundcloud_get_tracks();
    $tracks = array_splice($tracks, 0, 2);
    foreach ($tracks as $t) { ?>
          <div style="position:relative" class="media sc-container" data-embed='<iframe width="100%" height="300" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $t->id?>&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>"'>
              <a class="media-left media-middle" href="#" onclick="var e = jQuery(this).closest('.sc-container'); e.html(e.attr('data-embed')); return false;"><img src="<?php echo $t->artwork_url?>" style="opacity: 0.9; filter: alpha(opacity=90); width:80px; height: 70px;"/><span style="position: absolute; top: 25px; left: 25px; color:#eee; font-size: 30px" class="glyphicon glyphicon-play-circle"></span></a>
              <div class="media-body media-middle">
                  <div class="media">
                      <div class="media-body media-middle">
                        <h4 class="item-headline"><a href="#" onclick="var e = jQuery(this).closest('.sc-container'); e.html(e.attr('data-embed')); return false;"><?php echo $t->title?></a>
                        <br/>
                        <span class="meta">
                        <?php echo formatMillis($t->duration)?> 
                        <?php if ($t->downloadable) { ?>
                            | <a style="color:#aaa;" class="meta" href="<?php echo $t->download_url?>?client_id=<?php echo get_option('soundcloud_client_id')?>" onclick="ga('send','event','Soundcloud Click', '<?php $t->title?>', this.getAttribute('href')); return true;">Download</a>
                        <?php }  ?>
                        </span>
                        </h4>
                      </div>

                  </div>
              </div>
          </div>
<?php    }


    
}
function soundcloud_get_latest_track_widget() {
 //   if (is_user_logged_in()) {
    sc_alt();
    return;
   // }
	$tracks = soundcloud_get_tracks();
	if ($tracks == null || count($tracks) == 0)
		return 'Soundcloud not available.';
	
	$track = $tracks[0];
    $pod1 = "";
    $pod2 = "";
	$pod1 = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F' . $track->id  .'"></iframe>';
    if (count($tracks) > 1) {
	    $track = $tracks[1];
	    $pod2 = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F' . $track->id  .'"></iframe>';
    }

    $list = "";
    if (count($tracks) >= 5) {
        //if (is_user_logged_in()) {
            $list = "<ul style='list-style-type:none; padding: 0; margin: 0'>";
            for ($i=2; $i<4; $i++) {
               $list .= "<li style=\"list-style-type:none; vertical-align:middle\"><a style=\"display:inline;\" onclick=\"ga('send','event','Soundcloud Click', '" . $tracks[$i]->title . "', this.getAttribute('href')); return true;\" href=\"" . $tracks[$i]->permalink_url. "\"><span class=\"glyphicon glyphicon-play-circle\"></span> " . $tracks[$i]->title . "</a></li>";
            }
        $list .= "</ul>";
        //}
    }
    return $pod1 . $pod2 . $list;
}

class BiyomboWatch {
    var $json = null;
    function __construct() {
       $text = file_get_contents ("/www/rr_production/wp-content/themes/rr/scripts/output/biyombo_misses.json");
       $this->json = json_decode($text);
    }
    function getCount() {
        return $this->json->biyombo_fgx;
    }
 }

class DenNykPick {
    var $status = null;
    function __construct() {
       $this->status = $this->calculate_status();
    }
    function get_rank($teams, $abbr) {
        for ($i=0; $i<count($teams); $i++) {
            if ($abbr == $teams[$i]->team->abbreviation)
                return $i+1;
        }
        return 0;
    }
    function get_team($teams, $abbr) {
        for ($i=0; $i<count($teams); $i++) {
            if ($abbr == $teams[$i]->team->abbreviation)
                return $teams[$i];
        }
        return null;
    }

    function winning_percentage_cmp($a, $b)
    {
       $af = floatval($a->winning_percentage);
       $bf = floatval($b->winning_percentage);
       if ($af < $bf) return -1;
       else if ($af > $bf) return 1;
       else return 0;
    }
    function torPickMessage() {
        if ($this->status['den_rank'] == $this->status['nyk_rank']) {
            return "A coin flip will be made to determine if the Raptors get Denver or New York's pick at " . ($this->status['total_teams'] - $this->status['den_rank'] + 1) . ".";
            
        } else {
            if ($this->status['nyk_rank'] > $this->status['den_rank']) {
                return "The Raptors will be receiving Denver's pick at " . ($this->status['total_teams'] - $this->status['den_rank'] + 1) . ".";
            } else {
                return "The Raptors will be receiving New York's pick at " . ($this->status['total_teams'] - $this->status['nyk_rank'] + 1) . ".";
            }
        }
    }
    function status() {
        return $this->status;
    }
    function calculate_status() {

        $text = file_get_contents("http://api.thescore.com/nba/standings.json");
        $teams = json_decode($text); 
        usort($teams, array($this, "winning_percentage_cmp"));
        $teams = array_reverse($teams);
        $result = array(
            'den_rank' =>intval($this->get_rank($teams, "DEN")),
            'nyk_rank' => intval($this->get_rank($teams, "NYK")),
            'nyk' => $this->get_team($teams, "NYK"),
            'den' => $this->get_team($teams, "DEN"),
            'total_teams' => count($teams)
        );
        return $result;
    }
}

class Biyombo_Widget extends WP_Widget {
    function Biyombo_Widget() {
        // Instantiate the parent object
        parent::__construct( false, 'Biyombo Blown Bunny Counter' );
    }
    public function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;
        echo $before_title;
        echo '<a href="/bismack-biyombo-missed-bunny-counter/">Biyombo Blown Bunnies Watch</a>';
        echo $after_title;
        $b = new BiyomboWatch();
        ?>
        <div class="media">
      <div class="media-left">
        <a href="">
          <img class="media-object square" src="/wp-content/uploads/2015/11/bismack1.jpg">
        </a>
      </div>
      <div class="media-body">
            We're up to <?php echo $b->getCount()?> blown bunnies. <a href="/bismack-biyombo-missed-bunny-counter/">More</a>.
      </div>
    </div>
        <?php
        echo $after_widget;
    }
}





class DenNykPick_Widget extends WP_Widget {
    function DenNykPick_Widget() {
        // Instantiate the parent object
        parent::__construct( false, 'DEN/NYK Pick Watch' );
    }
    public function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;
        echo $before_title;
        echo '<a href="/pick-watch-new-york-knicks-vs-denver-nuggets-pick-which-pick-will-the-raptors-get/">DEN/NYK Pick Watch</a>';
        echo $after_title;
        $pick = new DenNykPick();
        ?>
        <div class="media">
      <div class="media-left">
        <a href="/pick-watch-new-york-knicks-vs-denver-nuggets-pick-which-pick-will-the-raptors-get/">
          <img class="media-object square" src="http://www.raptorsrepublic.com/wp-content/uploads/2015/10/andreabargnanith.jpg">
        </a>
      </div>
      <div class="media-body">
            <?php echo $pick->torPickMessage()?>
            <a href="/pick-watch-new-york-knicks-vs-denver-nuggets-pick-which-pick-will-the-raptors-get/">More</a>.
      </div>
    </div>
        <?php
        echo $after_widget;
    }
}

// http://stackoverflow.com/questions/22504076/how-can-i-stop-wordpress-from-returning-a-cached-rss-feed
add_filter( 'wp_feed_cache_transient_lifetime', 
   create_function('$a', 'return 600;') );


class Soundcloud_Widget extends WP_Widget {
    function Soundcloud_Widget() {
        // Instantiate the parent object
        parent::__construct( false, 'Soundcloud Latest' );
    }
    public function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;
        echo $before_title;
        echo '<span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> <a href="/category/podcast">Latest Rapcasts</a>';
        echo $after_title;
        echo soundcloud_get_latest_track_widget();
        echo $after_widget;
    }
}




    register_widget( 'Soundcloud_Widget' );
    register_widget( 'DenNykPick_Widget' );
    register_widget( 'Biyombo_Widget' );

function get_gfy_url($poster = false) {
    global $post;
    $content = $post->post_content;
    $regex = "/\[gfy\](.*)\[\/gfy\]/";
    $matches = array();
    $url = '';
    if (preg_match_all($regex, $content, $matches)) {
      $gfy = $matches[1][0];
      $url = 'http://thumbs.gfycat.com/' . $gfy .'-' . ($poster ? 'poster' : 'thumb100') . '.jpg';
    }
    return $url;
}


function my_post_image_html($html, $post_id, $post_image_id, $size='large', $attr=array()) {
    global $is_single, $is_home;
    if (!$html) {
        if ($is_single || $is_home) {
            $url = get_gfy_url(false);
            $html = "<img src='$url' class='media-object img-circle square wp-post-image' style='width:80px'/>";
        } else {
            $url = get_gfy_url(true);
            $html = "<img src='$url' class='wp-post-image'/>";
        }
    }
    return $html;
}


add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

function formatMillis($milliseconds) {
    $seconds = floor($milliseconds / 1000);
    $minutes = floor($seconds / 60);
    $hours = floor($minutes / 60);
    $milliseconds = $milliseconds % 1000;
    $seconds = $seconds % 60;
    $minutes = $minutes % 60;

    $format = '%u:%02u:%02u';
    $time = sprintf($format, $hours, $minutes, $seconds, $milliseconds);
    return ltrim($time, '0:');
}

function featured_on_homepage( $query ) {
        if ( $query->is_home() && $query->is_main_query() ) {
            //$tumblr_tag = get_term_by('slug', 'put-backs', 'post_tag');
            //$forum_topics_cat = get_category_by_slug( 'forum-topics' );           
            $query->set('posts_per_page', 7);
            $query->set('cat', '-1595');
            //$query->set('cat', "-$forum_topics_cat->cat_ID");
            //$query->set('tag__not_in', array($tumblr_tag->term_id));
        }
}
function featured_on_raptors905( $query ) {
        if ( is_category('raptors905') && $query->is_main_query() ) {
            //$tumblr_tag = get_term_by('slug', 'put-backs', 'post_tag');
            //$forum_topics_cat = get_category_by_slug( 'forum-topics' );           
            $query->set('posts_per_page', 7);
            //$query->set('cat', "-$forum_topics_cat->cat_ID");
            //$query->set('tag__not_in', array($tumblr_tag->term_id));
        }
}

add_action( 'pre_get_posts', 'featured_on_homepage' );
add_action( 'pre_get_posts', 'featured_on_raptors905' );



function render_sidebar_article($show_image = true) { 
    
    
	global $post;
    ?>

                                    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix sidebar-article'); ?> role="article">

                                     <div class="media">
                                     <?php if ($show_image == true) {?>
                                             <a onclick="ga('send', 'event', 'Single Post', this.innerHTML, this.getAttribute('href')); return true;"  class="pull-left" style="position: relative" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'class' => 'media-object img-square square')); ?>

                                    <?php }?></a>
                                            <div class="media-body">
                                            <div class="media-heading"><h4 class="item-headline" style="margin: 0; padding: 0"><?php if (is_sticky($post->ID)) {?><span class="badge live" style="background:#cc0000">Sticky</span> <?php }?><a onclick="ga('send', 'event', 'Latest Click - Single Post', this.innerHTML, this.getAttribute('href')); return true;"  class="entry-title" href="<?php echo the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                                                <time class="meta updated dtstart" datetime="<?php echo the_time('c') ?>" pubdate="<?php echo the_time('Y-m-d')?>"><?php echo smart_date(); ?></time>
                                               <?php if (get_comments_number() > 0) {?>
                                               <span class="meta"> | </span>
                                            <a class="meta" href="<?php the_permalink()?>#disqus_thread">
                                               <?php comments_number('', '1', '%' );?>
                                            </a>
                                            <?php } ?>
                                            </div>
                                        <span style="display:none" class="vcard author">
                                        <span class="fn"><?php the_author(); ?></span>
                                        </span>


                                           </div>
                                        </div>
                                    </article>
<hr/>
<?php }

function print_block($cat_slug, $label, $css='') {
            ?>
            <div class="row">
            <div class="col-xs-12">
            <div class="content-block" style="<?php echo $css?>">
                <div class="row content-block-heading">
                <div class="col-xs-12">
                        <h3 class="heading">
                        <?php echo $label;?>
                        </h3>
                </div>
                </div>
                <div class="row content-block-content">
            <?php

             wp_reset_query();
             $slugs = explode(',', $cat_slug); 
             $cat = '';
             foreach ($slugs as $slug) {
                $cat .= get_category_by_slug( $slug )->cat_ID . ','; 
             }
             $cat = rtrim($cat, ",");
                            $args = array(
                                    'posts_per_page'=>5,
                                    'cat' => $cat
                                   );

                           $pb_query = new WP_Query($args);
 
 
 
                            $index = 0;
                            global $post;
                            if ($pb_query->have_posts()) : while ($pb_query->have_posts()) : $pb_query->the_post(); 
                                    $post_link = get_permalink();
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium');
                                    $index++;
                            ?>
                            <?php if ($index == 1) {?>
                            <div class="col-xs-12 col-sm-6">



                                     <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                                            <div style="width: 100%; height: 160px; overflow:hidden">
                                             <a onclick="ga('send', 'event', 'Content Block - Main - ' . $label, this.innerHTML, this.getAttribute('href')); return true;"  class="pull-left" style="position: relative" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'medium', array( 'style' => 'width: 100%; max-width: 100%; margin-bottom: 10px', 'class' => 'media-object img-square')); ?>
                                             </a>
                                             </div>

                                            <h4><a onclick="ga('send', 'event', 'Content Block - Secondary - ' . $label, this.innerHTML, this.getAttribute('href')); return true;"  class="entry-title" href="<?php the_permalink()?>" style="color: black; font-weight: bold; line-height: 1.5em"  rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>

                                               <div class="excerpt"><?php the_excerpt()?></div>

                                         <div class="row" style="display:none">
                                         <div class="col-xs-6">
                                        <span class="vcard author" style="text-align: center; font-size: .9em">
                                        <span class="fn"><?php the_author_posts_link(); ?></span>
                                        </span>
                                        </div>
                                        <div class="col-xs-6">
 


                                                <time class="meta updated dtstart" datetime="<?php echo the_time('c') ?>" pubdate="<?php echo the_time('Y-m-d')?>"><?php echo smart_date(); ?></time>
                                               <?php if (get_comments_number() > 0) {?>
                                               <span class="meta"> | </span>
                                            <a class="meta" href="<?php the_permalink()?>">
                                               <?php comments_number('', '1', '%' );?>
                                            </a>
                                            <?php } ?>
                                            </div>
                                            </div>

                                    </article>
                                    </div>
                            <?php }?>
                            <?php if ($index == 2) {?>
                                <div class="col-xs-12 col-sm-6">
                            <?php } ?>
                            <?php if ($index > 1 && $index <= 5) {?>
                                <?php render_sidebar_article(false);?>
                            <?php } ?>
                            

                                <?php endwhile; ?>	

                   <?php if ($index > 2) {?>
                                </div>
                            <?php } ?>


                            <?php endif; ?>
        </div>
        </div>
        </div>
        </div>

                            <?php } 
                            
                            
                            
                            
// ------------------------------------------------------------------
 // Add all your sections, fields and settings during admin_init
 // ------------------------------------------------------------------
 //
 
 function rr_theme_settings_api_init() {
    // Add the section to reading settings so we can add our
    // fields to it
    add_settings_section(
        'rr_theme_setting_section',
        'RR Theme Settings',
        'rr_theme_setting_section_callback_function',
        'reading'
    );
    
    // Add the field with the names and function to use for our new
    // settings, put it in our new section
    add_settings_field(
        'banner_large',
        'Banner - Large',
        'banner_large_callback_function',
        'reading',
        'rr_theme_setting_section'
    );
 
     add_settings_field(
        'banner_small',
        'Banner - Small',
        'banner_small_callback_function',
        'reading',
        'rr_theme_setting_section'
    );
 
      add_settings_field(
        'ad_home_header',
        'Ad - Home Header',
        'ad_home_header_callback_function',
        'reading',
        'rr_theme_setting_section'
    );
 
      add_settings_field(
        'ad_in_latest_posts',
        'Ad - In Latest Posts',
        'ad_in_latest_posts_callback_function',
        'reading',
        'rr_theme_setting_section'
    );
 


      add_settings_field(
        'ad_page_level',
        'Ad - Page Level',
        'ad_page_level_callback_function',
        'reading',
        'rr_theme_setting_section'
    );
 add_settings_field(
    'ad_after_article_title',
    'Ad - After Article Title',
    'ad_after_article_title_callback_function',
    'reading',
    'rr_theme_setting_section'
);


 add_settings_field(
    'ad_in_post',
    'Ad - In Post',
    'ad_in_post_callback_function',
    'reading',
    'rr_theme_setting_section'
);

      add_settings_field(
        'ad_after_post',
        'Ad - After Post',
        'ad_after_post_callback_function',
        'reading',
        'rr_theme_setting_section'
    );
 
       add_settings_field(
        'google_site_verification_code',
        'Google Site Verification Code',
        'google_site_verification_code_callback_function',
        'reading',
        'rr_theme_setting_section'
    );
 
        add_settings_field(
        'google_analytics_code',
        'Google Analytics Code',
        'google_analytics_code_callback_function',
        'reading',
        'rr_theme_setting_section'
    );
    

       add_settings_field(
        'microsoft_site_verification_code',
        'Microsoft Site Verification Code',
        'microsoft_site_verification_code_callback_function',
        'reading',
        'rr_theme_setting_section'
    );
 
add_settings_field(
    'image_favicon',
    'Image - Favicon',
    'image_favicon_callback_function',
    'reading',
    'rr_theme_setting_section'
);
 add_settings_field(
    'thescore_recent_games_url',
    'The Score - Recent Games URL',
    'thescore_recent_games_url_callback_function',
    'reading',
    'rr_theme_setting_section'
);
add_settings_field(
    'thescore_upcoming_games_url',
    'The Score - Upcoming Games URL',
    'thescore_upcoming_games_url_callback_function',
    'reading',
    'rr_theme_setting_section'
);
add_settings_field(
    'soundcloud_tracks_url',
    'Soundcloud - Get Tracks URL',
    'soundcloud_tracks_url_callback_function',
    'reading',
    'rr_theme_setting_section'
);
add_settings_field(
    'soundcloud_client_id',
    'Soundcloud - Client ID',
    'soundcloud_client_id_callback_function',
    'reading',
    'rr_theme_setting_section'
);
add_settings_field(
    'image_patreon_article_bottom',
    'Patreon - Article Bottom Image',
    'image_patreon_article_bottom_callback_function',
    'reading',
    'rr_theme_setting_section'
);
add_settings_field(
    'image_patreon_sidebar',
    'Patreon - Sidebar Image',
    'image_patreon_sidebar_callback_function',
    'reading',
    'rr_theme_setting_section'
);
add_settings_field(
    'social_twitter_username',
    'Twitter Username',
    'social_twitter_username_callback_function',
    'reading',
    'rr_theme_setting_section'
);
add_settings_field(
    'social_facebook_username',
    'Facebook Username',
    'social_facebook_username_callback_function',
    'reading',
    'rr_theme_setting_section'
);
add_settings_field(
    'social_patreon_username',
    'Patreon Username',
    'social_patreon_username_callback_function',
    'reading',
    'rr_theme_setting_section'
);
 add_settings_field(
    'front_page_sections',
    'Front Page Sections',
    'front_page_sections_callback_function',
    'reading',
    'rr_theme_setting_section'
);
 add_settings_field(
    'styles_override',
    'CSS Styles - Override',
    'styles_override_callback_function',
    'reading',
    'rr_theme_setting_section'
);




    // Register our setting so that $_POST handling is done for us and
    // our callback function just has to echo the <input>
    register_setting( 'reading', 'banner_large' );
    register_setting( 'reading', 'banner_small' );
    register_setting( 'reading', 'ad_home_header' );
    register_setting( 'reading', 'ad_in_latest_posts' );
    register_setting( 'reading', 'ad_page_level' );
    register_setting( 'reading', 'ad_after_article_title' );
    register_setting( 'reading', 'ad_in_post' );
register_setting( 'reading', 'ad_after_post' );
    register_setting( 'reading', 'google_site_verification_code' );
    register_setting( 'reading', 'google_analytics_code' );
    register_setting( 'reading', 'microsoft_site_verification_code' );
    register_setting( 'reading', 'image_favicon' );
register_setting( 'reading', 'thescore_recent_games_url' );
register_setting( 'reading', 'thescore_upcoming_games_url' );
register_setting( 'reading', 'soundcloud_tracks_url' );
register_setting( 'reading', 'soundcloud_client_id' );
register_setting( 'reading', 'image_patreon_article_bottom' );
register_setting( 'reading', 'image_patreon_sidebar' );
register_setting( 'reading', 'social_twitter_username' );
register_setting( 'reading', 'social_facebook_username' );
register_setting( 'reading', 'social_patreon_username' );
register_setting( 'reading', 'front_page_sections' );
register_setting( 'reading', 'styles_override' );

 } // eg_settings_api_init()
 
 add_action( 'admin_init', 'rr_theme_settings_api_init' );

 
  
 // ------------------------------------------------------------------
 // Settings section callback function
 // ------------------------------------------------------------------
 //
 // This function is needed if we added a new section. This function 
 // will be run at the start of our section
 //
 
 function rr_theme_setting_section_callback_function() {
    echo '<p>RR Theme</p>';
 }
 
 // ------------------------------------------------------------------
 // Callback function for our example setting
 // ------------------------------------------------------------------
 //
 // creates a checkbox true/false option. Other types are surely possible
 //
 
 function banner_large_callback_function() {
    echo '<input name="banner_large" id="banner_large" type="text" value="' . get_option( 'banner_large' ) . '" class="code"/>';
 }                          
  function banner_small_callback_function() {
    echo '<input name="banner_small" id="banner_small" type="text" value="' . get_option( 'banner_small' ) . '" class="code"/>';
 }                          
 function ad_home_header_callback_function() {
    echo '<textarea name="ad_home_header" id="ad_home_header" rows="10" cols="50">' .  get_option( 'ad_home_header' ) . '</textarea>';
 }                          
 function ad_in_latest_posts_callback_function() {
    echo '<textarea name="ad_in_latest_posts" id="ad_home_header" rows="10" cols="50">' .  get_option( 'ad_in_latest_posts' ) . '</textarea>';
 }                          
 
  function ad_page_level_callback_function() {
    echo '<textarea name="ad_page_level" id="ad_page_level" rows="10" cols="50">' .  get_option( 'ad_page_level' ) . '</textarea>';
 }                          
function ad_after_article_title_callback_function() {
    echo '<textarea name="ad_after_article_title" id="ad_after_article_title" rows="10" cols="50">' .  get_option( 'ad_after_article_title' ) . '</textarea>';
}

function ad_in_post_callback_function() {
    echo '<textarea name="ad_in_post" id="ad_in_post" rows="10" cols="50">' .  get_option( 'ad_in_post' ) . '</textarea>';
}
function ad_after_post_callback_function() {
    echo '<textarea name="ad_after_post" id="ad_after_post" rows="10" cols="50">' .  get_option( 'ad_after_post' ) . '</textarea>';
}




   function google_site_verification_code_callback_function() {
    echo '<input name="google_site_verification_code" id="google_site_verification_code" type="text" value="' . get_option( 'google_site_verification_code' ) . '" class="code"/>';
 }                          
 
 function google_analytics_code_callback_function() {
    echo '<textarea name="google_analytics_code" id="google_analytics_code" rows="10" cols="50">' .  get_option( 'google_analytics_code' ) . '</textarea>';
}


 
  
function microsoft_site_verification_code_callback_function() {
    echo '<input name="microsoft_site_verification_code" id="microsoft_site_verification_code" type="text" value="' . get_option( 'microsoft_site_verification_code' ) . '" class="code"/>';
}                          
  
  
 function image_favicon_callback_function() {
         echo '<input name="image_favicon" id="image_favicon" type="text" value="' . get_option( 'image_favicon' ) . '" class="code"/>';
 }


function thescore_recent_games_url_callback_function() {
    echo '<input name="thescore_recent_games_url" id="thescore_recent_games_url" type="text" value="' . get_option( 'thescore_recent_games_url' ) . '" class="code"/>';
}
function thescore_upcoming_games_url_callback_function() {
    echo '<input name="thescore_upcoming_games_url" id="thescore_upcoming_games_url" type="text" value="' . get_option( 'thescore_upcoming_games_url' ) . '" class="code"/>';
}
function soundcloud_tracks_url_callback_function() {
    echo '<input name="soundcloud_tracks_url" id="soundcloud_tracks_url" type="text" value="' . get_option( 'soundcloud_tracks_url' ) . '" class="code"/>';
}
function soundcloud_client_id_callback_function() {
    echo '<input name="soundcloud_client_id" id="soundcloud_client_id" type="text" value="' . get_option( 'soundcloud_client_id' ) . '" class="code"/>';
}
function image_patreon_article_bottom_callback_function() {
    echo '<input name="image_patreon_article_bottom" id="image_patreon_article_bottom" type="text" value="' . get_option( 'image_patreon_article_bottom' ) . '" class="code"/>';
}
function image_patreon_sidebar_callback_function() {
    echo '<input name="image_patreon_sidebar" id="image_patreon_sidebar" type="text" value="' . get_option( 'image_patreon_sidebar' ) . '" class="code"/>';
}

function social_twitter_username_callback_function() {
    echo '<input name="social_twitter_username" id="social_twitter_username" type="text" value="' . get_option( 'social_twitter_username' ) . '" class="code"/>';
}

function social_facebook_username_callback_function() {
    echo '<input name="social_facebook_username" id="social_facebook_username" type="text" value="' . get_option( 'social_facebook_username' ) . '" class="code"/>';
}

function social_patreon_username_callback_function() {
    echo '<input name="social_patreon_username" id="social_patreon_username" type="text" value="' . get_option( 'social_patreon_username' ) . '" class="code"/>';
}
function front_page_sections_callback_function() {
    echo '<textarea name="front_page_sections" id="front_page_sections" rows="10" cols="50">' .  get_option( 'front_page_sections' ) . '</textarea>';
}
function styles_override_callback_function() {
    echo '<textarea name="styles_override" id="styles_override" rows="10" cols="50">' .  get_option( 'styles_override' ) . '</textarea>';
}





                           ?>
