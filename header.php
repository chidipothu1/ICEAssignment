<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Football Leauge Live Data</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	 <link href="assets/css/table-css.css" rel="stylesheet">
	 <link href="assets/css/slider.css" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  </head>
  <body>
    <header class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<div class="container">
      <a class="navbar-brand" href="index.php"> <img src="assets/images/logo.png"/> </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<?php $pageName = basename($_SERVER['PHP_SELF']); 
	//print_r($pageName); exit;
	if($pageName == "fixtures.php") {?>
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="fixtures.php">Fixtures</a></li>
        <li class=""><a href="lastFixtures.php">Last Fixtures</a></li>
		<li class=""><a href="upComing.php">Up Coming Fixtures</a></li>
		<li class=""><a href="tables.php">Tables</a></li>
		<li class=""><a href="results.php">Results</a></li>
		<li class=""><a href="players.php">Players</a></li>
      </ul>
	  <?php } elseif($pageName == "lastFixtures.php"){?>
	  <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class=""><a href="fixtures.php">Fixtures</a></li>
        <li class="active"><a href="lastFixtures.php">Last Fixtures</a></li>
		<li class=""><a href="upComing.php">Up Coming Fixtures</a></li>
		<li class=""><a href="tables.php">Tables</a></li>
		<li class=""><a href="results.php">Results</a></li>
		<li class=""><a href="players.php">Players</a></li>
      </ul>
	  <?php } elseif($pageName == "upComing.php"){?>
	  <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class=""><a href="fixtures.php">Fixtures</a></li>
        <li class=""><a href="lastFixtures.php">Last Fixtures</a></li>
		<li class="active"><a href="upComing.php">Up Coming Fixtures</a></li>
		<li class=""><a href="tables.php">Tables</a></li>
		<li class=""><a href="results.php">Results</a></li>
		<li class=""><a href="players.php">Players</a></li>
      </ul>
	  <?php } elseif($pageName == "tables.php"){?>
	  <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class=""><a href="fixtures.php">Fixtures</a></li>
        <li class=""><a href="lastFixtures.php">Last Fixtures</a></li>
		<li class=""><a href="upComing.php">Up Coming Fixtures</a></li>
		<li class="active"><a href="tables.php">Tables</a></li>
		<li class=""><a href="results.php">Results</a></li>
		<li class=""><a href="players.php">Players</a></li>
      </ul>
	  <?php } elseif($pageName == "lastResults.php"){?>
	  <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="fixtures.php">Fixtures</a></li>
        <li class=""><a href="lastFixtures.php">Last Fixtures</a></li>
		<li class=""><a href="upComing.php">Up Coming Fixtures</a></li>
		<li class=""><a href="tables.php">Tables</a></li>
		<li class=""><a href="results.php">Results</a></li>
		<li class=""><a href="players.php">Players</a></li>
      </ul>
	  <?php } elseif($pageName == "teamPerformance.php"){?>
	  <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="fixtures.php">Fixtures</a></li>
        <li class=""><a href="lastFixtures.php">Last Fixtures</a></li>
		<li class=""><a href="upComing.php">Up Coming Fixtures</a></li>
		<li class=""><a href="tables.php">Tables</a></li>
		<li class=""><a href="results.php">Results</a></li>
		<li class=""><a href="players.php">Players</a></li>
      </ul>
	   <?php } elseif($pageName == "results.php"){?>
	   <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class=""><a href="fixtures.php">Fixtures</a></li>
        <li class=""><a href="lastFixtures.php">Last Fixtures</a></li>
		<li class=""><a href="upComing.php">Up Coming Fixtures</a></li>
		<li class=""><a href="tables.php">Tables</a></li>
		<li class="active"><a href="results.php">Results</a></li>
		<li class=""><a href="players.php">Players</a></li>
      </ul>
	   <?php } elseif($pageName == "players.php"){?>
	   <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class=""><a href="fixtures.php">Fixtures</a></li>
        <li class=""><a href="lastFixtures.php">Last Fixtures</a></li>
		<li class=""><a href="upComing.php">Up Coming Fixtures</a></li>
		<li class=""><a href="tables.php">Tables</a></li>
		<li class=""><a href="results.php">Results</a></li>
		<li class="active"><a href="players.php">Players</a></li>
      </ul>
	   <?php } else{?>
	   <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class=""><a href="fixtures.php">Fixtures</a></li>
        <li class=""><a href="lastFixtures.php">Last Fixtures</a></li>
		<li class=""><a href="upComing.php">Up Coming Fixtures</a></li>
		<li class=""><a href="tables.php">Tables</a></li>
		<li class=""><a href="results.php">Results</a></li>
		<li class=""><a href="players.php">Players</a></li>
      </ul>
	   <?php } ?>
    </div>
  </div>
</header>
