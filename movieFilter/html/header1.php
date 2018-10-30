
<?php
 session_start();
?>

<head> 
	<title>Slick flick</title>
</head>

<body id="body">


	<nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="navbar">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="../html/home.php">SlickFlick</a>
	
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="../html/home.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="../html/preferences.php">Preferences</a>
	      </li>

	      <li class="nav-item">
	      	<?php
	      		if(isset($_SESSION["id"]))
	      		{
	      			echo '<a class="nav-link disabled" href="../html/signup.php">Sign Up</a>';
	      		}
	      		else
	      		{
	      			echo '<a class="nav-link " href="../html/signup.php">Sign Up</a>';
	      		}
	      	?>
	        
	      </li>
	      <li class="nav-item">
	      	<?php
	      		if(isset($_SESSION["id"]))
	      		{
	      			echo '<a class="nav-link " href="../php/logout.php">LogOut</a>';
	      		}
	      		else
	      		{
	      			echo '<a class="nav-link " href="../html/login.php">Login</a>';
	      		}
	      	?>
	        
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="../html/about.php">About us</a>
	      </li>
	      
	    </ul>
	    <!--<form class="form-inline my-2 my-lg-0" id="search" onsubmit="return searchMovies();">
	      <input class="form-control mr-sm-2" type="text" placeholder="Search (Actors,Movies...)" id="searchField">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	      
	      id="filter_score"
	      id="filter_date"
	    </form>-->
	    <form name="movie" id="movie" onsubmit="update_date();return false;" class="form-inline my-2 my-lg-0">
		<span class="nav-link">Filter score: &nbsp</span><input type="number" id="filter_score" min="0" max="9" placeholder="Imdb Ratings" class="form-control mr-sm-2">
		<span class="nav-link">Date:</span>
		<!-- min=" <?= date("Y-m-d")?>" max="<?= date("Y-m-d",strtotime("+4 days")) ?>" -->
		<input type="date" id="filter_date"  name="date"   class="form-control mr-sm-2">
		<input type="submit" value="Refine" class="btn btn-outline-success my-2 my-sm-0">
		</form>
	    	<?php
	      		if(isset($_SESSION["name"]))
	      		{
	      			print "<div class=\"nav-link active\" id=\"welcometag\">Welcome {$_SESSION['name']}</div>";
	      		}

	      	?>
	  </div>
	</nav>
	<?php

		if(isset($_GET["message"]))
		{
			print '<div class="alert alert-success">' . $_GET["message"].'</div>';
		}

	?>
	
	<div class="container-fluid" id="heading">
		<div class="jumbotron" align="center" id="jumbotron">
		<h1 align="center" id="title">Slick Flick</h1>
		<span style="color:rgb(200,200,200)">The best of television</span>
		</div>

		<button class="btn btn-danger" id="english">English channels</button>
		<button class="btn btn-danger" id="hindi">Hindi channels</button>
		<button class="btn btn-info" id="regional">Regional channels</button>
		<button class="btn btn-success hidden-sm-down" id="howToUse">How to use </button>
		<button class="btn btn-warning" id="timeFilter">Include movies that have finished airing</button>
		<script>

			$("#english").click(function(){

				if(document.location.pathname == "/movieFilter/html/home.php")
				{
					prefer = "00000001110000000010001001001110001100001110";
					filter_movie();
				}
			});
			$("#hindi").click(function(){

				if(document.location.pathname == "/movieFilter/html/home.php")
				{
					prefer = "10111100001010000100010110110000110011110000";
					filter_movie();
				}
			});			
			$("#regional").click(function(){

				if(document.location.pathname == "/movieFilter/html/home.php")
				{
					prefer = "01000010000101111000000000000001000000000001";
					filter_movie();
				}
			});
			$("#howToUse").click(function(){
				if(document.location.pathname == "/movieFilter/html/home.php")
				{
					$("#tutorial").show();
					$('#tutorial').click(function(){
						$('#tutorial').hide();
					});
				}
			});
			$("#timeFilter").click(function(){

				if(document.location.pathname == "/movieFilter/html/home.php")
				{
					use_time = !use_time;
					filter_movie();
				}
			});			
		</script>
	<div id="tutorial">
		<span id="navbar-usage">Use the navigation bar to login / logout and set your channel preferences</span>
		<span id="imdb-filter">Filter the movies below on the basis of imdb score<br>
		Set the date using the date box above.</span>
		<span id="about">SlickFlick informs you about the best movies airing on tv.<br></span>
		<span id="card-description">Hover over the movie icons below to view their channel and show time.<br>
		Click on the movies to watch their trailers and get detailed desciptions.</span>
		<button class="btn btn-info" id="back">Back</button>
		
	</div>

	</div>

