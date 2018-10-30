<?php 

include "header.php";

?>

<link rel="stylesheet" href="../include/stylesheet.css" media='screen and (min-device-width: 800px)'>
<link rel="stylesheet" href="../include/stylesheetMobile.css" media='screen and (max-device-width: 800px)'>
<script type="text/javascript" src="../script/javascript.js"></script>

<?php 

include "header1.php"

?>

	<!--<form name="movie" id="movie" onsubmit="filter_movie();return false;" class="form-horizontal">
		<span><b>Imdb filter score:</b></span>
		<input type="number" id="filter_score" min="1" max="9">
		<input type="date" min="<?= date("Y-m-d")?>" max="<?= date("Y-m-d",strtotime("+4 days")) ?>" name="date" id="filter_date">
		<input type="submit" value="Refine" class="btn btn-danger">
	</form>-->
	<div id="test">
	<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4682585406266938"
     data-ad-slot="5054435005"
     data-ad-format="auto"></ins>

	<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	</div>
	<div class="container-fluid">
		<div class="card-deck" id="row"></div>
	</div>
	<div id="movie_info">
		<div id="inner_info">
			<div id="movieDetails"></div>

		</div>
	</div>

<?php 

include "footer.php";

?>