<?php
date_default_timezone_set('UTC');
  include 'FootballData.php';
  include 'header.php';
?>
<div class="container" style="margin-bottom:30px;">

<?php
		$api = new FootballData();
		$response1 = $api->getTeams();
		// search for desired team
		$team_name = "AFC Bournemouth";
	   $searchQuery = $api->searchTeam(urlencode($team_name));
	  // echo "<pre>";
	  // print_r($searchQuery);
	   
		// var_dump searchQuery and inspect for results
		
		if($_POST['submit'])
		{
			$team_name = $_POST['selectTeam'];
			$searchQuery = $api->searchTeam(urlencode($team_name));
			//$team = $api->getTeamById($searchQuery->teams[0]->id);
		}
		$response = $api->getTeamById($searchQuery->teams[0]->id);
		$fixtures = $response->getFixtures('home')->fixtures;
		$fixtures = array_slice($fixtures, -1);
	?>
	<form method="post" action="results.php">
	 	<div style="width:20%; display:inline-block;">
			<h3>Select Your Team :  </h3>
		</div>
		<div style="width:21%; display:inline-block;">
		<?php 
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
    <div><h3>Last match of My Home Team(<?php echo $team_name; ?>)</h3></div>
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
		<?php foreach ($fixtures as $fixture) { 
		if($fixture->result->goalsHomeTeam || $fixture->result->goalsAwayTeam)
		{
		?>
		<tr>
		<!-- <td><?php //echo $fixture->date; ?></td> -->
		<td><?php echo $fixture->homeTeamName; ?></td>
		<td><?php echo $fixture->awayTeamName; ?></td>
		<td><?php echo $fixture->result->goalsHomeTeam.' '.':'.' '.$fixture->result->goalsAwayTeam; ?></td>
		</tr>
		<?php } } ?>
		</tbody>
	  </table>
	</div>
	

    <?php
		//$api = new FootballData();
		// search for desired team
	   //$searchQuery = $api->searchTeam(urlencode("Manchester United FC"));
	  // echo "<pre>";
	  // print_r($searchQuery);
	   
		// var_dump searchQuery and inspect for results
		$response = $api->getTeamById($searchQuery->teams[0]->id);
		$fixtures = $response->getFixtures('home')->fixtures;
		$fixtures = array_slice($fixtures, -5);
		
	?>
    <div style="margin-top: 50px;"><h3>Last five matches of My Home Team(<?php echo $team_name; ?>)</h3></div>
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
		<?php foreach ($fixtures as $fixture) {
		if($fixture->result->goalsHomeTeam || $fixture->result->goalsAwayTeam)
		{ ?>
		<tr>
		<!-- <td><?php //echo $fixture->date; ?></td> -->
		<td><?php echo $fixture->homeTeamName; ?></td>
		<td><?php echo $fixture->awayTeamName; ?></td>
		<td><?php echo $fixture->result->goalsHomeTeam.' '.':'.' '.$fixture->result->goalsAwayTeam; ?></td>
		</tr>
		<?php }} ?>
		</tbody>
	  </table>
	</div>
	
	
	<?php
		//$api = new FootballData();
		
		$start_week = date("Y-m-d", strtotime('-1 day'));
		$end_week = date('Y-m-d', strtotime('-22 days'));
		
		$now = new DateTime($end_week);
		$end = new DateTime($start_week); 
		$response = $api->getSoccerseasonFixtures(426);
		//$response = $api->getFixturesForDateRange($now->format('Y-m-d'), $end->format('Y-m-d'));
		//echo "<pre>";
		//print_r($response);

	?>
    <div style="display:inline-block; margin-top: 50px;"><h3>Results for all the teams in this season </h3></div>
	<!-- <div style="display:inline-block; float:right; margin-top:20px;">
	<div style="display:inline-block; margin-right:30px;"><a href="lastResults.php"><strong>Last 5 Results of Home Team</strong></a></div>
	<div style="display:inline-block;"><a href="teamPerformance.php"><strong>Team Performance</strong></a></div> 
	</div> -->
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
		</tr><?php foreach ($response->payload->fixtures as $fixture) { 
		if($fixture->status == 'FINISHED')
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
	
</div>
<?php
  include 'footer.php';
?>
