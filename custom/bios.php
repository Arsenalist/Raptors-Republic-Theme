<?php 
//error_reporting(-1);
//ini_set('display_errors', 'On');
$args = array ( 'orderby' => 'display_name', 'order' => 'ASC' );
// The Query
$user_query = new WP_User_Query( $args );

if ( ! empty( $user_query->results ) ) {
    foreach ( $user_query->results as $user ) {
       $image = get_the_author_meta('aim', $user->ID);
       $twitter = get_the_author_meta('twitter', $user->ID);
       if (!$image) continue; ?>

<div class="media">
  <div class="media-left media-top text-center">
      <img class="media-object" src="<?php echo $image?>" alt="<?php echo $user->first_name . $twitter?> <?php echo $user->last_name?>">
      <br/>
  <a href="https://twitter.com/<?php the_author_meta('twitter', $user->ID)?>"  data-size="large" data-show-screen-name="false" class="twitter-follow-button" data-show-count="false">Follow @<?php the_author_meta('twitter', $user->ID)?></a>
  
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $user->first_name?> <?php echo $user->last_name?></h4>
       <p><?php echo nl2br($user->description)?></p>
  </div>
</div>
<hr/>
<?php
    }
} else {
    echo 'No users found.';
}
?>

  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
