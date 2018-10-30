


function searchMovies()
{/*
  /*if(window.location.href != "https://moviefilter-amritsandhu.c9users.io/movieFilter/html/home.php")
  {
    var alertdiv = document.createElement("div");
    alertdiv.setAttribute("class" , "alert alert-danger");
    alertdiv.setAttribute("id" , "alert");
    alertdiv.innerHTML = "Please go to the home page to use the search box.";
    document.getElementById("body").appendChild(alertdiv);
    return false;
    
  }*/
  /*var key = Object.keys(channel);

  var fuse = new Fuse(channel, options); // "list" is the item array

  var result = fuse.search(document.getElementById("searchField").value);
  
  $("#row").html("");

  var options = {
  id:"shows" ,
  shouldSort: true,
  threshold: 0.6,
  location: 0,
  distance: 100,
  maxPatternLength: 10,
  minMatchCharLength: 1,
  keys:['showTitle'
  ,"channel",
  "date",
  "shows.channel",
  "shows.alsoKnownAs",
  "shows.showTitle",
  "shows.showTime",
  "shows.imdbRating"
  ,"shows.genre"
  ,"shows.director"
  ,"shows.language"
  ,"shows.nominatedFor"
  ,"shows.producer"
  ,"shows.releaseDate"
  ,"shows.showDescription"
  ,"shows.showType"
  ,"shows.voicesOf"
  ,"shows.writer",
  "shows.trivia",
  "shows.actor"]

  };

  console.log(JSON.stringify(result));*/

  for(var i = 0;i < channel.length ; i++)
	{
		// if prefer[i] is 1 for this particular channel or is undefined

		for(var show  = 0; show <  channel[i]["shows"].length ; show++)
		{
			var show_info = channel[i]["shows"][show];
			
			//show_info["channel"] = channel[i]["channel"];
			
			  var options = {

  shouldSort: true,
  tokenize:true,
  maxPatternLength: 100,
  minMatchCharLength: 1,
  keys: ["showTitle"]
};
			var fuse = new Fuse(show_info, options);
			
			 var result = fuse.search(document.getElementById("searchField").value);
      if(result.length != 0)
      {
        console.log(result);
      }

		}

	}

 // "list" is the item array


		
  return false;
}