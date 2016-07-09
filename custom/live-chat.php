<?php
if (isset($_REQUEST['status'])) {
	$wpdb->query("UPDATE rr_options set value = '" . $_REQUEST['status'] . "' WHERE name = 'chat.status'");
}

$game = $wpdb->get_row("SELECT Location, Opp, Time, tv, TIME_TO_SEC(STR_TO_DATE(Time, '%h:%i %p')) - TIME_TO_SEC(now())  as diff  from rr_games WHERE DATE(adddate(now(), INTERVAL 0  HOUR)) = Date");
if ($game != null){
	$wpdb->query("UPDATE rr_options set value = '" . $game->Opp. "' WHERE name = 'chat.team'");
	$wpdb->query("UPDATE rr_options set value = '" . $game->Time . "' WHERE name = 'chat.time'");
	$wpdb->query("UPDATE rr_options set value = '" . $game->tv . "' WHERE name = 'chat.tv'");
	$opponent = $game->Opp;
	$gameTime = $game->Time;
	if ($game->diff >  0) {
		$status = "notstarted";
	} else if ($game->diff < 1 && $game->diff > ((3600 * 2.5 * -1) - 1200)) {
		$status = "active";

	} else {
		$status = "ended";
	}
	$location = $game->Location == '@' ? '@' : 'vs';
} else {
	$opponent = $wpdb->get_var("SELECT value FROM rr_options WHERE name = 'chat.team'");
	$gameTime = $wpdb->get_var("SELECT value FROM rr_options WHERE name = 'chat.time'");
	$gameTV = $wpdb->get_var("SELECT value FROM rr_options WHERE name = 'chat.tv'");
	$status = $wpdb->get_var("SELECT value FROM rr_options WHERE name = 'chat.status'");
	$location = 'v';

}
?>

TOR <?echo $location?> 

<?echo $opponent?> - <?echo $gameTime?> <?echo $gameTV?></h3>
<? if ($status == "notstarted" && !isset($_REQUEST['arse'])) {?>
Live chat has not yet started.
<?} else if ($status == "ended" && !isset($_REQUEST['arse'])) {?>
Live chat has ended.
<?} else if ($status == "active" || isset($_REQUEST['arse'])) {?>

Use #raptors at <a href="http://chat.efnet.org:9090/">http://chat.efnet.org:9090/</a>

<h3>Use the <span style="color:orange">#raptors</span> channel</h3>

<!--
<iframe src="http://chat.efnet.org/?channels=#raptors&uio=d4" width="100%" height="500"></iframe>-->


<iframe src="http://kiwiirc.com/client/chat.efnet.org:+9090/raptors/" style="border:0; width:100%; height:500px;"></iframe> 
<!--
<iframe src="http://kiwiirc.com/client/irc.SHOUTcast.com:+8000/raptors/" style="border:0; width:100%; height:500px;"></iframe>-->


<?}?>

