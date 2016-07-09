<?php
$rotds = $wpdb->get_results("SELECT comment, author, link, ts, DATE_FORMAT(ts, '%b %D, %Y') as ts_short FROM rr_rotd ORDER BY ts DESC");
?>


<?php foreach ($rotds as $r) { ?>
<div class="row">
<div class="col-lg-12">
<div class="well">
<strong><?php echo $r->author;?></strong><br/>
<small><a href="<?php echo $r->link;?>"><?php echo $r->ts_short;?></a></small><br/>
<p><?php echo nl2br($r->comment);?></p>
</div>
</div>
</div>
<?php } ?>
