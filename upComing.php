<?php
date_default_timezone_set('UTC');
	include 'FootballData.php';
	include 'header.php';
	//Create instance of API class
	$api = new FootballData();
	$soccerseason = $api->getSoccerseasonFixtures(426);
	$arr = array();
	//echo "<pre>";
	//print_r($soccerseason);
?>
<div class="container" style="margin-bottom:30px;">
	<div style="margin-top:30px;">
	<form method="post" action="upComing.php">
		<div style="width:20%; display:inline-block;">
			<h3>Select Your Team :  </h3></div>
		<div style="width:21%; display:inline-block;">
		<?php 
			$arr = array();
			foreach ($soccerseason->payload->fixtures as $fixture) {
    		$arr[] = $fixture->homeTeamName;
			}
			$unique_data = array_unique($arr);
		// now use foreach loop on unique data
			
?>
			<select style="height:40px; padding:8px;" name="selectTeam" id="selectTeam" >
				<option value="">Select Team</option>
				<?php foreach ($unique_data as $val) { ?>
				<option value="<?php echo $val; ?>" <?php if($_POST['selectTeam'] == $val) echo "selected= 'selected'"; ?> ><?php echo $val; ?></option>
				<?php } ?>
			</select>
		</div>
		<div style="width:20%; display:inline-block;">
			<input type="submit" name="submit" value="Search Team" style="height:40px; padding:8px;" />
		</div>
		</form>
	</div>
	<?php
	if($_POST['submit'] == "Search Team" && $_POST['selectTeam'])
	{
	   $team_name = $_POST['selectTeam'];
	?>
		<div style="display:inline-block;"><h3>All matches of your selected home team(<?php echo $team_name; ?>) : </h3></div>
		<div class="table-responsive" style="border:1px solid #ccc;">
		  <table class="table table-striped" style="margin-bottom:0;">
			<thead>
			 <tr class="success">
			  <th>Date & Time</th>
			  <th>HomeTeam</th>
			  <th>AwayTeam</th>
			  <th>Result</th>
			  </tr>
			</thead>
			<tbody>			
		</tr><?php foreach ($soccerseason->payload->fixtures as $fixture) { 
		if(($fixture->homeTeamName == $team_name) || ($fixture->awayTeamName == $team_name))
		{
		if($fixture->status == 'TIMED' )
		{
		?>
			<tr>
			<td><?php echo $fixture->date; ?></td>
			<td><?php echo $fixture->homeTeamName; ?></td>
			<td><?php echo $fixture->awayTeamName; ?></td>
			<td><?php echo $fixture->result->goalsHomeTeam.' '.':'.' '.$fixture->result->goalsAwayTeam; ?></td>
			</tr>
			<?php } } } ?>
			</tbody>
		  </table>
		</div>
	<?php
	}
	else{
	?>
    <div style="display:inline-block;"><h3>All upcoming matches for all Teams : </h3></div>
		<div class="table-responsive" style="border:1px solid #ccc;">
		  <table class="table table-striped" style="margin-bottom:0;">
			<thead>
			 <tr class="success">
			  <th>Date & Time</th>
			  <th>HomeTeam</th>
			  <th>AwayTeam</th>
			  <th>Result</th>
			  </tr>
			</thead>
			<tbody>			
		</tr><?php foreach ($soccerseason->payload->fixtures as $fixture) { 
		if($fixture->status == 'TIMED')
		{
		?>
			<tr>
			<td><?php echo $fixture->date; ?></td>
			<td><?php echo $fixture->homeTeamName; ?></td>
			<td><?php echo $fixture->awayTeamName; ?></td>
			<td><?php echo $fixture->result->goalsHomeTeam.' '.':'.' '.$fixture->result->goalsAwayTeam; ?></td>
			</tr>
			<?php } } ?>
			</tbody>
		  </table>
		</div>
	<?php } ?>
</div>    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php
  include 'footer.php';
?>
