<?php

//Capturing the results from the form
$dptcity = $_POST['from'] ;
$arvcity = $_POST['to'] ;
$date = $_POST['datePicked'];

date_default_timezone_set('America/Chicago');
if ($_POST['time']) {
	//Sets the time and converts it to 24hr
	$time = $_POST['time'];
	$time = DATE("H:i", STRTOTIME($time));
	//Sets departure or arrival
	$depart = $_POST['depart'];
	//Open for future possibility of setting how broad your search is, currently within 6 hours
	$within = 6;
}
else {
	$time = -1;
	$depart = -1;
	$within = -1;
}




//Reformatting of the date
$dateFormatted = $date[8] . $date[9] . '-' . $date[0] . $date[1] . '-' . $date[3] . $date[4];

$data = $dptcity . " " . $arvcity . " " . $dateFormatted . " " . $time . " " . $depart . " " . $within;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
   "http://www.w3.org/TR/html4/loose.dtd">
   
<head>

<link rel="stylesheet" type="text/css" href="stylesheets/foundation.css">
<link rel="stylesheet" type="text/css" href="stylesheets/app.css">
<link rel="stylesheet" type="text/css" href="stylesheets/routrr.css">
<link type="text/css" href="stylesheets/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="stylesheets/reveal.css">

<script type="text/javascript" src="javascripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="javascripts/app.js"></script>
<script type="text/javascript" src="javascripts/foundation.js"></script>
<script type="text/javascript" src="javascripts/modernizr.foundation.js"></script>
<script type="text/javascript" src="javascripts/jquery-ui-1.8.19.custom.min.js"></script>
<script type="text/javascript" src="javascripts/jquery.tablesorter.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOO0lt0Z8JXPEB1ErB8GmOfrm7MGmz3Pk&sensor=false&libraries=geometry"></script>


<title>Search Results - routrr.com</title>

<link rel="icon" type="image/png" href="images/favicon.png">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<script type="text/javascript">

//Geocoding and displaying the Bus Stop locator map
var coordinates;
function stopFinder() {
	var geocoder = new google.maps.Geocoder();
	var address = document.getElementById('address').value;
	
	geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        //Pass the coordinates to the mapping function
        geocodeMap(results[0].geometry.location);
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
}		

var target_lat;
var target_lon;
var stops_array = [
					[41.977983, -87.904228, "OHare Intl. Airport"], 
					[41.977285, -87.904996, "OHare Bus/Shuttle Center"], 
					[41.977285, -87.904996, "OHare Intl. Airport - Terminal 2"], 
					[41.974786, -87.889361, "OHare Intl. Airport - Terminal 5"], 
					[41.722068, -87.624858, "Greyhound Bus Stop"],
					[41.874848, -87.64352, "Greyhound Bus Terminal"], 
					[41.788742, -87.741072, "Midway Airport"], 
					[41.877447, -87.639447, "Union Station"], 
					[41.719181, -87.782019, "Chicago Ridge Mall"], 
					[41.574779, -88.166484, "Joliet"], 
					[41.505102, -87.734582, "Matteson Town Center"], 
					[42.150381, -87.814158, "Northbrook"], 
					[41.850742, -87.95695, "Oakbrook Mall"], 
					[42.061311, -87.752061, "Old Orchard Mall"], 
					[41.556728, -87.791061, "Tinley Park"], 
					[42.043890, -88.032017, "Woodfield"], 
					[41.753542, -88.031464, "Woodridge"], 
					[40.483703, -88.914033, "Bloomington Airport"], 
					[40.511286, -88.993433, "Bone Student Center"], 
					[40.483637, -89.023215, "Bloomington McDonalds"], 
					[40.508236, -88.983614, "Bloomington Amtrak"], 
					[40.507911, -88.987939, "Watterson Towers"], 
					[40.493058, -88.990139, "Wesleyan Shirk Center"], 
					[40.105339, -88.232792, "Armory"], 
					[40.109144, -88.228334, "Altgeld Hall"], 
					[40.100047, -88.220265, "PAR"], 
					[40.099480, -88.220477, "FAR/PAR"], 
					[40.115398, -88.241501, "Illinois Terminal"], 
					[40.109000, -88.221147, "ISR"], 
					[40.114425, -88.318069, "LEX Hub Champaign"], 
					[40.104143, -88.219322, "Lincoln Avenue Residence"], 
					[40.104008, -88.234972, "Six Pack"], 
					[40.110525, -88.228944, "U of I Folletts"],
					[40.698672, -89.61486, "Bradley University"], 
					[40.689078, -89.594138, "City Link - Peoria"], 
					[40.679022, -89.564987, "Par-A-Dice Casino - E Peoria"], 
					[40.666588, -89.690179, "Peoria Intl. Airport"], 
					[37.724285, -89.216078, "Carbondale Amtrak"], 
					[37.712565, -89.21818, "SIU Student Center"], 
					[37.712161, -89.22377, "SIU Thompson Point"], 
					[37.715742, -89.211624, "SIU Tri Tower"] 
				  ];

var item;
var closest_stop = 1000000000;
var closest_stop_name;
var distance = 0;
function geocodeMap(coordinates) {
		coordinates = String(coordinates);
		coordinates = coordinates.substring(1, coordinates.length-1);
		coordinates = coordinates.split(",");
		target_lat = coordinates[0];
		target_lon = coordinates[1];
		
		
		//Finds the coordinates of the closest bus stop
		var target = new google.maps.LatLng(target_lat, target_lon);
		
		for (i=0; i < stops_array.length; i++) {
			item = new google.maps.LatLng(stops_array[i][0], stops_array[i][1]);
			distance = google.maps.geometry.spherical.computeDistanceBetween(target, item);
			if (distance < closest_stop) {
				closest_stop = distance;
				closest_stop_name = stops_array[i][2];
			}

		}
	
		$.get("findastop.php",
			{map: coordinates,
			 stop: closest_stop_name},
			function(data) {
				$("#address_map").html(data);
		});
		closest_stop = 1000000000;
		distance = 0;
}



function departureInsert() {
	$('#from_new').val(closest_stop_name);
	$('#findastopModal').trigger('reveal:close');
}

function arrivalInsert() {
	$('#to_new').val(closest_stop_name);
	$('#findastopModal').trigger('reveal:close');
}



//calls the php for individual companies
function submitForm(itrip) {
	trip=itrip;
	document.location.href = 'confirmation.php?trip=' + trip;
}

//handles the map modal
function mapBox(tripData) {
	
	$.get("map.php",
		{mapInfo: tripData},
		function(data) {
			$("#mapData").html(data);
	});	
}


$(document).ready(function() {
  		var trip = "<?PHP echo $data ?>";
		$.get("formatting.php",
		{tripData: trip},
		function(data) {
			$("#results").html(data);
			//tablesort code
			$("#results_table").tablesorter({
				//Sort by departing time
				sortList: [[3,0]],
				headers:{
				0: {sorter: false},
				3: {sorter: "time"},
				4: {sorter: "time"}
				}
			});
		});	
		
		
		$("#tripform").submit(function() {
    		
    		$("#results").fadeOut(function(){
    		
				// Getting each of the values from the form
				var dpt_city = $("#from_new").val();
				var arv_city = $("#to_new").val();
				var date = $("#date_new").val();
	
				//Inserting new values into placeholders
				$('#from_new').attr('placeholder', dpt_city);
				$('#from_new').val('');
				$('#to_new').attr('placeholder', arv_city);
				$('#to_new').val('');
				$('#date_new').attr('placeholder', date);
				$('#date_new').val('');
				
				//Rearranging date
				date = date[8] + date[9] + "-" + date[0] + date[1] + "-" + date[3] + date[4];			
				
				//Morphing the values into the correct format for PHP
				var new_data = dpt_city + " " + arv_city + " " + date + " " + "-1" + " " + "-1" + " " + "-1";
				
				//Calling formatting.php to get the new results
				$.get("formatting.php",
				{tripData: new_data},
				function(data) {
					$("#results").html(data);
					$("#results").fadeIn();
					//tablesort code
					$("#results_table").tablesorter({
						sortList: [[6,0]],
						headers:{
						0: {sorter: false},
						3: {sorter: "time"},
						4: {sorter: "time"}
						}
					});
				});
			});
			return false;
		});
		
		$("#address").keyup(function(event){
    		if(event.keyCode == 13){
        		$("#findstop").click();
    		}
		});
});



</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28635105-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>

	<!--All-Encompassing Container Start-->
		<div class="container">
			
			<!--Header Row Start-->
			<div class="row">
				<div class="twelve columns">
				<img alt="routrr" src="images/routrrtitle.png" style="display:block;margin-left:auto;margin-right:auto;">
					<div class="subtitle">
						An easier way to find your way
					</div>
				</div>
			</div>
			<!--Header Row End-->
			
<br>
			
			<!--Main Row Start-->
			<div class="row">
				<!--Sidebar Form Start-->
				<div class="three columns">
					<div class="row">
						<div class="twelve columns">
						<h4 style="text-decoration:underline;">Modify your search:</h4>
						</div>
					</div>
					
					<br>
					
					<form id="tripform" class="nice custom">
					<div class="row">
						<div class="twelve columns">
						From:
						<input name="from_new" type="text" class="input-text" id="from_new" placeholder="<?php echo $dptcity;?>" />
						</div>
					</div>
					
					<div class="row">
						<div class="twelve columns">
						To:
						<input name="to_new" type="text" class="input-text" id="to_new" placeholder="<?php echo $arvcity;?>" />
						</div>
					</div>
					
					<div class="row">
						<div class="twelve columns">
						On:
						<input name="date_new" type="text" class="input-text" id="date_new" placeholder="<?php echo $date;?>" />
						</div>
					</div>
					
					<div class="row">
						<div class="twelve columns" ">
						<input type="submit" class="large white radius button" value="Find a Bus!"/>
						</div>
					</div>
					</form>
				</div>
				<!--Sidebar Form End-->
		
				<!--Results Start-->
				<div class="nine columns" id="results">
				</div>
				<!--Results End-->
			
			</div>
			<!--Main Row End-->
			
			</div>
			<!--All Encompassing Container End-->
			<div id="mapModal" class="reveal-modal center" style="width:auto;">
				 <h2>This is where you're going.</h2>
				 <div id="mapData">This is where the maps are actually inserted.</div>
				 <a class="close-reveal-modal">&#215;</a>
			</div>
			
			
	<div id="findastopModal" class="reveal-modal center">
		 <div class="container">
			<div class="row">
				<h2>Bus Stop Locator</h2>
				<h6>Enter your address below to find out.</h6>
			</div>
			<br>
			<br>
			<div class="row">
				<form id="stopfinder" class="custom nice" method="POST" action="">
					<div class="eight columns">
						<input id="address" name="address" type="text" class="expand input-text" id="address" placeholder="e.g. 123 Main Street, Anytown, IL, 12345" />
					</div>
					<div class="four columns">
						<a id="findstop" class="nice medium radius white button" onclick="stopFinder();">Submit</a>
					</div>
				</form>
			</div>
			
			<div class="row">
				<div id="address_map">
					<iframe 
						width='425' 
						height='350' 
						frameborder='0' 
						scrolling='no' 
						marginheight='0' 
						marginwidth='0' 
						src='http://maps.google.com/maps?f=q&amp;
						source=s_q&amp;
						hl=en&amp;
						geocode=&amp;
						aq=&amp;
						sll=37.0625,-95.677068&amp;
						sspn=40.86791,73.300781&amp;
						vpsrc=0&amp;
						ie=UTF8&amp;
						t=h&amp;
						z=$zoom&amp;
						ll=$lat,$lon&amp;
						iwloc=near&amp;
						output=embed'>
					</iframe>
				</div>
			</div>
			
		 </div>
		 <a class="close-reveal-modal">&#215;</a>
	</div>
			
</body>
</html>