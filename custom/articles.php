<!--
Show posts by: <a href="">All</a> |
<a href="?an=AltRaps">AltRaps</a> |
<a href="?an=Arsenalist">Arsenalist</a> |
<a href="?an=Dinosty">Dinosty</a> |
<a href="?an=RapsFan">RapsFan</a>
-->

<?
$queryString = 'showposts=200&posts_per_page=-1';
$author_name = '';
if (isset($_REQUEST['an'])) {
	$author_name = $_REQUEST['an'];
	$queryString .= '&author_name=' . $author_name;
}
?>


<?php query_posts($queryString); ?>
<table>
 <?php if ( have_posts() ) : ?>
 <table width="85%">
 <tr>
 	<th>Date</th>
 	<th>Title</th>
 	<th>Author</th>
 </tr>


 <?php while ( have_posts() ) : the_post(); ?>


 <tr>
 	<td style="white-space:nowrap"><span class="post_updated updated date"><?php the_time('M j, y'); ?></span></td>
 	<td><a class="entry-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
 	<td><span class="vcard author"><span class="fn"><?php the_author(); ?></span></td>
 </tr>
 <?php endwhile; ?>

 </table>

 <?php else: ?>
 <p style="margin-top: 15px;">Sorry, no posts matched your criteria.</p>

 <?php endif; ?>
</table>

<?php $wp_query->is_home = false;?>

