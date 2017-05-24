<?php
date_default_timezone_set('UTC');
  include 'FootballData.php';
  include 'header.php';
?>
<div class="container" style="margin-bottom:30px;">
<?php
		// Create instance of API class
		$api = new FootballData();
		// fetch and dump summary data for premier league' season 2015/16
		$soccerseason = $api->getSoccerseasonByYear(426);
		$allcompetitions = $api->getAllCompetitions();
		//echo "<pre>";
		//print_r($allcompetitions);
	?>
	<div><h3><?php echo $soccerseason->payload->leagueCaption; ?> Results/Performance</h3></div>
	<div class="table-responsive" style="border:1px solid #ccc;">
		<table class="table table-striped" style="margin-bottom:0;">
			<tr class="success">
				<th>TeamLogo</th>
				<th>TeamName</th>
				<th>PlayedGames</th>
				<th>Wins</th>
				<th>Draws</th>
				<th>Losses</th>
				<th>Points</th>
			</tr>
		<?php foreach ($soccerseason->payload->standing as $fixture) { ?>
			<tr>
				<td><img style="width:75px; height:75px" src="<?php echo $fixture->crestURI; ?>" /></td>
				<td ><?php echo $fixture->teamName; ?></td>
				<td ><?php echo $fixture->playedGames; ?></td>
				<td><?php echo $fixture->wins; ?></td>
				<td><?php echo $fixture->draws; ?></td>
				<td><?php echo $fixture->losses; ?></td>
				<td><?php echo $fixture->points; ?></td>
			</tr>
		<?php } ?>
		</table>
	</div>
	
	<!--  Last 5 games of my home team -->
	
	<?php
		//$api = new FootballData();
		// search for desired team
	  $team_name = "AFC Bournemouth";
	   $searchQuery = $api->searchTeam(urlencode($team_name));
	  if($_POST['submit'])
		{
			$team_name = $_POST['selectTeam'];
			$searchQuery = $api->searchTeam(urlencode($team_name));
		}
		$response = $api->getTeamById($searchQuery->teams[0]->id);
		$fixtures = $response->getFixtures('home')->fixtures;
		
	?>
	<form method="post" action="tables.php">
	 	<div style="width:20%; display:inline-block;">
			<h3>Select Your Team :  </h3>
		</div>
		<div style="width:21%; display:inline-block;">
		<?php 
		$response1 = $api->getTeams();
			$arr = array();
			foreach ($response1->teams as $team1) {
    		$arr[] = $team1->name;
			}
			$unique_data = array_unique($arr);
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
    <div style="margin-top:50px;"><h3>Last five matches of My Home Team(<?php echo $team_name; ?>)</h3></div>
	<div class="table-responsive" style="border:1px solid #ccc;">
	  <table class="table table-striped" style="margin-bottom:0;">
		<thead>
		 <tr class="success">
		 <!-- <th>Date & Time</th> -->
		  <th>HomeTeam</th>
		  <th>AwayTeam</th>
		  <th>Result</th>
		  </tr>
		</thead>
		<tbody>
		<?php 
		$index = 1;
		foreach ($fixtures as $fixture) { 
		if($index <= 5)
		{
		
		if($fixture->result->goalsHomeTeam || $fixture->result->goalsAwayTeam)
		{ ?>
		<tr>
		<!-- <td><?php //echo $fixture->date; ?></td> -->
		<td><?php echo $fixture->homeTeamName; ?></td>
		<td><?php echo $fixture->awayTeamName; ?></td>
		<td><?php echo $fixture->result->goalsHomeTeam.' '.':'.' '.$fixture->result->goalsAwayTeam; ?></td>
		</tr>
		<?php $index++; }
		else{break;}
		} }?>
		</tbody>
	  </table>
	</div>
	
	
	
</div>
<?php
  include 'footer.php';
?>
