
var channel;
// List of all the channels 
var channels = ["&-pictures","asianet-movies","b4u-movies","cinema-tv","enterr-10","filmy","gemini-movies","hbo","hbo-defined","hbo-hits","india-talkies","jalsha-movies","jaya-movie","kiran-tv","ktv","ktv-hd","maa-movies","mgm","movies-now","movies-now-plus","movies-ok","raj-digital-plus","romedy-now","sony-max","sony-max-2","sony-pix","star-gold","star-gold-hd","star-movies","star-movies-action","star-movies-hd","udaya-movies","utv-action","utv-movies","wb","world-movies","zee-action","zee-cinema","zee-cinema-hd","zee-classic","zee-premier","zee-studio","zee-studio-hd","zee-talkies"];
// User channel preferences
var prefer = "10111111111111111111111111111111111";

var timer = null;

var use_time = true;

// Get user preferences for channel list .
$(function()
{
	$.get("http://moviefilter-amritsandhu.c9users.io/movieFilter/php/userConfig.php",null,function(data){
		prefer = data;
		if(prefer == "")
		{
			prefer = "10111111111110111111111111111111111";
		}
		$(function() {
			$.getJSON("http://moviefilter-amritsandhu.c9users.io/movieFilter/include/output.php",success);
		});
	});
});




function displayTable(data,info)
{
	console.log(data);
	var html = "<table id=\"movieTable\" class=\"table-responsive\">";
	html += "<tr><th>" + "Actors" +"</th><td>"+ data.Actors+"</td></tr>";
	html += "<tr><th>" + "Awards"+"</th><td>"+ data.Awards+"</td></tr>";
	html += "<tr><th>" + "Director"+"</th><td>"+ data.Director +"</td></tr>";
	html += "<tr><th>" + "Genre"+"</th><td>"+ data.Genre+"</td></tr>";
	html += "<tr><th>" + "Language" +"</th><td>"+ data.Language +"</td></tr>";
	html += "<tr><th>" + "Produced by" +"</th><td>"+ data.Production+"</td></tr>";
	html += "<tr><th>" + "Rated" +"</th><td>"+ data.Rated +"</td></tr>";
	html += "<tr><th>Ratings:</th><td>";
	var temp  = [ "Imdb" , "Rotten Tomatoes" , "Metacritic"];
	for(var i = 0; i < data["Ratings"].length;i++)
	{
		html+= temp[i] + ":" + data["Ratings"][i]["Value"] + "<br>" ;
	}
	html+= "</td></tr>";
	//html += "<tr><th>" + "Ratings" +"</th><td>"+ "Imdb:" + data["Ratings"][0]["Value"] + "<br>Rotten Tomatoes:" + data["Ratings"][1]["Value"] +"<br>Metacritic:"+ data["Ratings"][2]["Value"]+"</td></tr>";
	html += "<tr><th>" + "Plot:"+"</th><td>"+ data.Plot+"</td></tr>";
	html += "<tr><th>" + "Released on" +"</th><td>"+ data.Released+"</td></tr>";
	html += "<tr><th>" + "Channel" +"</th><td>"+ info.channel+"</td></tr>";
	html += "<tr><th>" + "Time" +"</th><td>"+ info.showTime +"</td></tr>";
	
	html+= "</table>";
	document.getElementById("movieDetails").insertAdjacentHTML("beforeend",html);
										
}

function showData(div,info)
{
	var screen = document.getElementById("movie_info");
	var inner_info = document.getElementById("inner_info");
	var details = document.getElementById("movieDetails");
	// Initialise back button

	// To go back after viewing movie info
	$(inner_info).click(function(e){

		/*if(e.target != this)
		{
			return;
		}*/
		$(details).html("");
		screen.style.display = "none";
		iframe.style.display = "hide";
	});
	var temp = info["showTitle"].replace(/\s+/g, "-");
	var videoId;
	var frame = document.createElement("iframe");
	$.get("https://www.googleapis.com/youtube/v3/search?part=id&key=AIzaSyAduNvju8hFZWWLKP-tUrEcCEayCKsTsk0&q=" + temp + "-trailer",function(data){
		videoId = data["items"][0]["id"]["videoId"];
		
		frame.setAttribute("src","https://www.youtube.com/embed/" + videoId);


	});
	
	$.get("https://www.omdbapi.com/?t=" + temp + "&apikey=2b57625e",function(data){
		if(data["Response"] == "False")
		{
			details.insertAdjacentHTML("afterbegin","<h1 id=\"movieTitle\">" + info["showTitle"] + "</h1><span id=\"movieTime\">Channel:" + info["channel"] + " &nbsp&nbsp&nbspTime:" + info["showTime"] + "</span>");

			frame.setAttribute("id","playerBig");
			frame.setAttribute("allowfullscreen","allowfullscreen");
			inner_info.appendChild(frame);
		}
		else
		{
			details.insertAdjacentHTML("afterbegin","<h1 id=\"movieTitle\">" + data["Title"] + "</h1>");
			if("Poster" in data && $(document).width() > 799)
			{
				var img = document.createElement("img");
				img.setAttribute("id","poster");
				img.src = data["Poster"];
				details.appendChild(img);
			}
			displayTable(data,info);
			frame.setAttribute("allowfullscreen","allowfullscreen");
			frame.setAttribute("id","playerSmall");
			details.appendChild(frame);
		}
		
	});
	// Display this screen
	screen.style.display = "block";
	

}

function success(data)
{
	channel = data;
	
	filter_movie();
}
	
function enlarge(div,info)
{

	if($(window).width() > 799)
	{
		div.style.width = "220px";
	}
	div.style.marginRight = "0px";
	div.style.marginLeft = "0px";

	
	div.lastChild.insertAdjacentHTML("beforeend","ShowTime :" + info["showTime"] + "<br>Channel: " + info["channel"] );
}

function shorten(div,info)
{
	if($(window).width() > 799)
	{
		div.style.width = "180px";
	}



	div.style.marginRight = "20px";
	div.style.marginLeft = "20px";

	div.lastChild.innerHTML = "<h4>" + info["showTitle"] + "</h4>";
	if(info["showDescription"].length > 100)
	{
		div.lastChild.insertAdjacentHTML("beforeend","<p>" + info["showDescription"].substring(0,100)+ "..." + "</p>Imdb Rating:" + info["imdbRating"] + "<br>");
	}
	else
	{
		div.lastChild.insertAdjacentHTML("beforeend","<p>" + info["showDescription"] + "</p>Imdb Rating:" + info["imdbRating"] + "<br>") ;
	}

}

function add_card(info)
{


	var container = document.createElement("div");
	container.setAttribute("id","container");
	var div = document.createElement("div");
	div.className = "card";
	

	var img = document.createElement("img");
	img.className = "card-img-top";

	img.src = info["showThumb"];
	
	var block = document.createElement("div");
	block.className += "card-block";
	block.innerHTML = "<h4>" + info["showTitle"] + "</h4>";
	if(info["showDescription"].length > 100)
	{
		block.insertAdjacentHTML("beforeend","<p>" + info["showDescription"].substring(0,100)+ "..." + "</p>Imdb Rating:" + info["imdbRating"] + "<br>");
	}
	else
	{
		block.insertAdjacentHTML("beforeend","<p>" + info["showDescription"] + "</p>Imdb Rating:" + info["imdbRating"] + "<br>") ;
	}

	document.getElementById("row").appendChild(container);
	container.appendChild(div);
	div.appendChild(img);
	div.appendChild(block);
	if($(window).width() > 799)
	{
		div.style.width = "180px";
	}
	//
	img.style.width = "100%";
	div.style.marginRight = "20px";
	div.style.marginLeft = "20px";
	$(div).hover(function(e){
		if(!timer)
		{
			timer = window.setTimeout(function(){
				timer = null;
			
				enlarge(div,info);
			},600);
		}
		//enlarge(this,info);
	},
	function(e){
		if(timer)
		{
			window.clearTimeout(timer);
			timer = null;
		}
		else
		{
		
			shorten(this,info);
		}
	});
		
		
	$(div).click(function(e){
		showData(div,info);
	});
	

}

function show_poster(show_info)
{
	$.get("https://www.omdbapi.com/?t=" + show_info["showTitle"] + "&apikey=2b57625e",function(data){
		if(data["Response"] == false)
		{
			add_card(show_info);
			return;
		}
		else if("Poster" in data)
		{
			show_info["showThumb"]  = data["Poster"];
			add_card(show_info);
			
		}
	});
}

function filter_movie()
{

	$("#row").html("");
	var current_date = new Date();

	for(var i = 0;i < channel.length ; i++)
	{
		// if prefer[i] is 1 for this particular channel or is undefined

		if(prefer != "")
		{

			if(prefer[channels.indexOf(channel[i]["channel"])] != '1')
			{

				continue;
			}
		}
		for(var show  = 0; show <  channel[i]["shows"].length ; show++)
		{

			var show_info = channel[i]["shows"][show];
			if(use_time)
			{
				var old = show_info["showTime"].substr(0,show_info["showTime"].indexOf(":"));
				if(old < current_date.getHours())
				{
					
					continue;
				}
			}
			
			if(show_info["imdbRating"] >= document.getElementById("filter_score").value)
			{
				show_info["channel"] = channel[i]["channel"];
				show_poster(show_info);
			}
			
		}

	}


}

function update_date()
{
	if(document.getElementById("filter_score").value)
	{
		filter_movie();	
	}
	var date = document.getElementById("filter_date").value;
	
	if(date)
	{
		
		$(function() {
			$.getJSON("https://moviefilter-amritsandhu.c9users.io/movieFilter/include/output.php?date=" + date,function(data){
				channel = data;
				use_time = false;
				filter_movie();
			});
		});
	}
}
