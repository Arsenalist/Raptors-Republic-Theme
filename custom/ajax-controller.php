
<?

include_once('../../../../wp-config.php');
include_once('../../../../wp-load.php');
include_once('../../../../wp-includes/wp-db.php');


	$action = $_REQUEST['action'];
	if ($action == 'player-stats') {
		$playerId = $_REQUEST['pid'];
		$playerStats = $wpdb->get_results('SELECT * FROM rr_players p, rr_season2player sp, rr_seasons s WHERE sp.player_id = ' . $playerId . ' AND sp.player_id = p.id and s.id = sp.season_id ORDER BY sp.season_id ASC' );

	?>

		<table>
			<tr>

				<th>Season</div>
				<th>G</th>
				<th>GS</th>
				<th>Min</th>
				<th>FG%</th>
				<th>FT%</th>
				<th>3PT%</th>
				<th>O-Reb</th>
				<th>T-Reb</th>
				<th>Asst</th>
				<th>Stl</th>
				<th>Blk</th>
				<th>PPG</th>


			</tr>

		<?php
		$count = count($playerStats);

		for ($i=0; $i<$count; $i++) {
			$p = $playerStats[$i]; ?>

			<tr class="span-17<? echo $i % 2 == 0 ? "even" : "odd"?>">
				<td><?echo $p->name?></td>
				<td><?echo $p->games?></td>
				<td><?echo $p->games_started?></td>
				<td><?echo number_format($p->minutes / max($p->games, 1), 1)?></td>
				<td><?echo number_format(100*$p->fgm / max($p->fga, 1), 2)?></td>
				<td><?echo number_format(100*$p->ftm / max($p->fta, 1), 2)?></td>
				<td><?echo number_format(100*$p->tpm / max($p->tpa, 1), 2)?></td>
				<td><?echo number_format(($p->rebo)/ max($p->games, 1), 2)?></td>
				<td><?echo number_format(($p->rebo + $p->rebd)/ max($p->games, 1), 2)?></td>
				<td><?echo number_format($p->ast/ max($p->games, 1), 2)?></td>
				<td><?echo number_format($p->stl/ max($p->games, 1), 2)?></td>
				<td><?echo number_format($p->blk/ max($p->games, 1), 2)?></td>
				<td><?echo number_format($p->pts/ max($p->games, 1), 2)?></td>

			</tr>

		<?}?>
		</table>


<?	}
?>