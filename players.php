<?php
date_default_timezone_set('UTC');
  include 'FootballData.php';
  include 'header.php';
?>
<div class="container" style="margin-bottom:30px;">
	<?php
		$api = new FootballData();
		$response = $api->getTeams();
		//echo "<pre>";
		//print_r($response); exit;
		$searchQuery = $api->searchTeam(urlencode("Manchester United FC"));
		$team = $api->getTeamById($searchQuery->teams[0]->id);
		if($_POST['submit'])
		{
		$team_name = $_POST['selectTeam'];
			$searchQuery = $api->searchTeam(urlencode($team_name));
			$team = $api->getTeamById($searchQuery->teams[0]->id);
		}
		//print_r($team); exit;
    ?>
	<form method="post" action="players.php">
	 	<div style="width:20%; display:inline-block;">
			<h3>Select Your Team :  </h3>
		</div>
		<div style="width:21%; display:inline-block;">
		<?php 
			$arr = array();
			foreach ($response->teams as $team1) {
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
    <div><h3>Players of <?php echo $team->_payload->name; ?></h3></div>
	<div class="table-responsive" style="border:1px solid #ccc;">
	  <table class="table table-striped" style="margin-bottom:0;">
		<thead>
		 <tr class="success">
		  <th>Name</th>
		  <th>Position</th>
		  <th>Jersey Number</th>
		  <th>Date of birth</th>
		  </tr>
		</thead>
		<tbody>
		<?php foreach ($team->getPlayers() as $player) { ?>
		<tr>
		<td><?php echo $player->name; ?></td>
		<td><?php echo $player->position; ?></td>
		<td><?php echo $player->jerseyNumber; ?></td>
		<td><?php echo $player->dateOfBirth; ?></td>
		</tr>
		<?php } ?>
		</tbody>
	  </table>
	</div>
</div>
<?php
  include 'footer.php';
?>
