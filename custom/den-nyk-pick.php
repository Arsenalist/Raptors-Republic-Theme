<?php
$dennyk = new DenNykPick();
$status = $dennyk->status();
?>
<div class="alert alert-danger text-center">
<h3><?php echo $dennyk->torPickMessage()?></h3>
</div>
<strong>Why is this happening?</strong>
<p>
On July 10, 2013, the Raptors traded Andrea Bargnani to the Knicks for Steve Novak, Marcus Camby, Quentin Richardson, a 2016 first-round pick, and second-round picks in 2014 and 2017. Earlier, on February 22, 2011, as part of the Carmelo Anthony deal, the Knicks traded to Denver the right to swap first-round picks in 2016.  Denver would exercise this right if they have the more favourable pick. <a href="/2015/11/02/thank-you-bargnani-a-reminder-the-raptors-have-an-extra-1st-rounder-coming-their-way/">Blake has more on this</a>.
</p>

<div class="row">
    <div class="col-xs-6 text-center">
        <img class="img-responsive col-xs-12" src="<?php echo $status['den']->team->logos->large?>"/>
        <h4>Record: <?php echo $status['den']->short_record?> (<?php echo $status['den']->winning_percentage?>)</h4>
        <h4>NBA Rank: <?php echo $status['den_rank']?></h4>
        <h4>Projected Pick: <?php echo ($status['total_teams'] - $status['den_rank'] + 1)?></h4>
    </div>
    <div class="col-xs-6 text-center">
        <img class="img-responsive col-xs-12" src="<?php echo $status['nyk']->team->logos->large?>"/>
        <h4>Record: <?php echo $status['nyk']->short_record?> (<?php echo $status['nyk']->winning_percentage?>)</h4>
        <h4>NBA Rank: <?php echo $status['nyk_rank']?></h4>
        <h4>Projected Pick: <?php echo ($status['total_teams'] - $status['nyk_rank'] + 1)?></h4>
    </div>
</div>


