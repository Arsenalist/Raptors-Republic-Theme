<?
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('../../../../wp-config.php');
include_once('../../../../wp-load.php');
include_once('../../../../wp-includes/wp-db.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

// include_once('disqusapi/disqusapi.php');


$action = $_REQUEST['action'];

if ($action == 'setrotd') {
	$comment_id = $_REQUEST['comment_id'];
//	$post_id = $_REQUEST['post_id'];

    $str = file_get_contents('http://disqus.com/api/3.0/posts/details.json?api_secret=3VtA9PIeD1ZNsygOtpYusksQRCEnDqtpybHF4l5pfRymDo4f2f3pxzUyNEB4Hy08&post=' . $comment_id);
    if ($str) {
    	$json = json_decode($str);
		if ($json->code == 0) {
			$name = $json->response->author->name;
			$message = $json->response->message;
            $thread = $json->response->thread;
            $str = file_get_contents('http://disqus.com/api/3.0/threads/details.json?api_secret=3VtA9PIeD1ZNsygOtpYusksQRCEnDqtpybHF4l5pfRymDo4f2f3pxzUyNEB4Hy08&thread=' . $thread);
            $json = json_decode($str);
            $permalink = $json->response->link;

			//$p = $wpdb->get_row('SELECT * FROM wp_posts WHERE ID = ' . $post_id);
			// $permalink = $p->guid . '#comment-' . $comment_id;
			$permalink = $permalink . '#comment-' . $comment_id;
			$wpdb->query($wpdb->prepare('insert into rr_rotd (comment,author,link,ts) values(%s, %s, %s, now())', $message, $name, $permalink));
  		    echo 'Done! Click <a href="'. $permalink. '">here</a> to go back.';
   	    }

    }





}



	?>


