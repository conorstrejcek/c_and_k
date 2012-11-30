<?php 
$mapdata = $_GET['mapInfo'];
$locations = explode(" ", $mapdata); 

$dptlocation = $locations[7];
//Trading underscores for spaces
$dptlocation = str_replace("_"," ",$dptlocation);

$arvlocation = $locations[8];
//Trading underscores for spaces
$arvlocation = str_replace("_"," ",$arvlocation);

$zoom = 15; 

//Conditionals to detect DPT location//

if ($dptlocation == "OHare Intl. Airport") {
	$dptlat = 41.977983;
	$dptlon = -87.904228;
} 

if ($dptlocation == "OHare Bus/Shuttle Center") {
	$dptlat = 41.977285;
	$dptlon = -87.904996;
}

if ($dptlocation == "OHare Intl. Airport - Terminal 2") {
	$dptlat = 41.977285;
	$dptlon = -87.904996;
}

if ($dptlocation == "OHare Intl. Airport - Terminal 5")  {
	$dptlat = 41.974786;
	$dptlon = -87.889361;
}

if ($dptlocation == "Greyhound Bus Stop")  {
	$dptlat = 41.722068;
	$dptlon = -87.624858;
}

if ($dptlocation == "Greyhound Bus Terminal")  {
	$dptlat = 41.874848;
	$dptlon = -87.64352;
}

if ($dptlocation == "Midway Airport")  {
	$dptlat = 41.788742;
	$dptlon = -87.741072;  
}

if ($dptlocation == "Union Station")  {
	$dptlat = 41.877447;
	$dptlon = -87.639447;
}

if ($dptlocation == "Chicago Ridge Mall")  {
	$dptlat = 41.719181;
	$dptlon = -87.782019;
}

if ($dptlocation == "Joliet")  {
 	$dptlat = 41.574779; 
 	$dptlon = -88.166484;
}

if ($dptlocation == "Matteson Town Center")  {
	$dptlat = 41.505102;
	$dptlon = -87.734582;  
}

if ($dptlocation == "Northbrook")  {
	$dptlat = 42.150381;
	$dptlon = -87.814158;  
}

if ($dptlocation == "Oakbrook Mall")  {
	$dptlat = 41.850742;
	$dptlon = -87.95695; 
}

if ($dptlocation == "Old Orchard Mall")  {
	$dptlat =  42.061311; 
	$dptlon = -87.752061; 
}

if ($dptlocation == "Tinley Park")  {
	$dptlat =  41.556728; 
	$dptlon = -87.791061;
}

if ($dptlocation == "Woodfield")  {
	$dptlat =  42.043890; 
	$dptlon = -88.032017; 
}

if ($dptlocation == "Woodridge")  {
	$dptlat =  41.753542; 
	$dptlon = -88.031464; 
}

if ($dptlocation == "Bloomington Airport")  {
	$dptlat =  40.483703; 
	$dptlon = -88.914033;
}

if ($dptlocation == "Bone Student Center")  {
	$dptlat =  40.511286; 
	$dptlon = -88.993433;
}

if ($dptlocation == "Bloomington McDonalds")  {
	$dptlat = 40.483637;
	$dptlon = -89.023215;
}

if ($dptlocation == "Bloomington Amtrak")  {
        $dptlat = 40.508236;
        $dptlon = -88.983614;
}

if ($dptlocation == "Watterson Towers")  {
	$dptlat =  40.507911; 
	$dptlon = -88.987939;
}

if ($dptlocation == "Wesleyan Shirk Center")  {
	$dptlat =  40.493058; 
	$dptlon = -88.990139;
}

if ($dptlocation == "Armory")  {
	$dptlat =  40.105339; 
	$dptlon = -88.232792;
}

if ($dptlocation == "Altgeld Hall")  {
	$dptlat = 40.109144;
	$dptlon = -88.228334;
}

if ($dptlocation == "PAR")  {
	$dptlat = 40.100047;
	$dptlon = -88.220265;
}

if ($dptlocation == "FAR/PAR")  {
	$dptlat =  40.099480; 
	$dptlon = -88.220477; 
}

if ($dptlocation == "Illinois Terminal")  {
	$dptlat =  40.115398; 
	$dptlon = -88.241501; 
}

if ($dptlocation == "ISR")  {
	$dptlat =  40.109000;
	$dptlon = -88.221147; 
}

if ($dptlocation == "LEX Hub Champaign")  {
	$dptlat =  40.114425;
	$dptlon = -88.318069; 
}

if ($dptlocation == "Lincoln Avenue Residence")  {
	$dptlat =  40.104143;
	$dptlon = -88.219322; 
}

if ($dptlocation == "Six Pack")  {
	$dptlat =  40.104008; 
	$dptlon = -88.234972; 
}

if ($dptlocation == "U of I Folletts")  {
	$dptlat =  40.110525; 
	$dptlon = -88.228944; 
}

if ($dptlocation == "Bradley University")  {
	$dptlat =  40.698672; 
	$dptlon = -89.61486; 
}

if ($dptlocation == "City Link - Peoria")  {
	$dptlat =  40.689078; 
	$dptlon = -89.594138; 
}

if ($dptlocation == "Par-A-Dice Casino - E Peoria")  {
	$dptlat =  40.679022; 
	$dptlon = -89.564987; 
}

if ($dptlocation == "Peoria Intl. Airport")  {
	$dptlat =  40.666588; 
	$dptlon = -89.690179; 
}

if ($dptlocation == "Carbondale Amtrak")  {
	$dptlat =  37.724285; 
	$dptlon = -89.216078; 
}

if ($dptlocation == "SIU Student Center")  {
	$dptlat =  37.712565; 
	$dptlon = -89.21818;
}

if ($dptlocation == "SIU Thompson Point")  {
	$dptlat =  37.712161; 
	$dptlon = -89.22377;
}

if ($dptlocation == "SIU Tri Tower")  {
	$dptlat =  37.715742; 
	$dptlon = -89.211624; 
}





//Conditionals to detect ARV location//

if ($arvlocation == "OHare Intl. Airport") {
	$arvlat = 41.977983;
	$arvlon = -87.904228;
}

if ($arvlocation == "OHare Intl. Airport - Terminal 2") {
	$arvlat = 41.977285;
	$arvlon = -87.904996;
}

if ($arvlocation == "OHare Intl. Airport - Terminal 5")  {
	$arvlat = 41.974786;
	$arvlon = -87.889361;
}

if ($arvlocation == "OHare Bus/Shuttle Center") {
	$arvlat = 41.977285;
	$arvlon = -87.904996;
}

if ($arvlocation == "Greyhound Bus Stop")  {
	$arvlat = 41.722068;
	$arvlon = -87.624858;
}

if ($arvlocation == "Greyhound Bus Terminal")  {
	$arvlat = 41.874848;
	$arvlon = -87.64352;
}

if ($arvlocation == "Midway Airport")  {
	$arvlat = 41.788742;
	$arvlon = -87.741072;  
}

if ($arvlocation == "Union Station")  {
	$arvlat = 41.877447;
	$arvlon = -87.639447;
}

if ($arvlocation == "Chicago Ridge Mall")  {
	$arvlat = 41.719181;
	$arvlon = -87.782019;
}

if ($arvlocation == "Joliet")  {
 	$arvlat = 41.574779; 
 	$arvlon = -88.166484;
}

if ($arvlocation == "Matteson Town Center")  {
	$arvlat = 41.505102;
	$arvlon = -87.734582;  
}

if ($arvlocation == "Northbrook")  {
	$arvlat = 42.150381;
	$arvlon = -87.814158;  
}

if ($arvlocation == "Oakbrook Mall")  {
	$arvlat = 41.850742;
	$arvlon = -87.95695; 
}

if ($arvlocation == "Old Orchard Mall")  {
	$arvlat =  42.061311; 
	$arvlon = -87.752061; 
}

if ($arvlocation == "Tinley Park")  {
	$arvlat =  41.556728; 
	$arvlon = -87.791061;
}

if ($arvlocation == "Woodfield")  {
	$arvlat =  42.043890; 
	$arvlon = -88.032017; 
}

if ($arvlocation == "Woodridge")  {
	$arvlat =  41.753542; 
	$arvlon = -88.031464; 
}

if ($arvlocation == "Bloomington Airport")  {
	$arvlat =  40.483703; 
	$arvlon = -88.914033;
}

if ($arvlocation == "Bloomington Amtrak")  {
        $arvlat = 40.508236;
        $arvlon = -88.983614;
}

if ($arvlocation == "Bone Student Center")  {
	$arvlat =  40.511286; 
	$arvlon = -88.993433;
}

if ($arvlocation == "Bloomington McDonalds")  {
	$arvlat = 40.483637;
	$arvlon = -89.023215;
}

if ($arvlocation == "Watterson Towers")  {
	$arvlat =  40.507911; 
	$arvlon = -88.987939;
}

if ($arvlocation == "Wesleyan Shirk Center")  {
	$arvlat =  40.493058; 
	$arvlon = -88.990139;
}

if ($arvlocation == "Armory")  {
	$arvlat =  40.105339; 
	$arvlon = -88.232792;
}

if ($arvlocation == "Altgeld Hall")  {
	$arvlat = 40.109144;
	$arvlon = -88.228334;
}

if ($arvlocation == "PAR")  {
	$arvlat = 40.100047;
	$arvlon = -88.220265;
}

if ($arvlocation == "FAR/PAR")  {
	$arvlat =  40.099480; 
	$arvlon = -88.220477; 
}

if ($arvlocation == "Illinois Terminal")  {
	$arvlat =  40.115398; 
	$arvlon = -88.241501; 
}

if ($arvlocation == "ISR")  {
	$arvlat =  40.109000;
	$arvlon = -88.221147; 
}

if ($arvlocation == "LEX Hub Champaign")  {
	$arvlat =  40.114425;
	$arvlon = -88.318069; 
}

if ($arvlocation == "Lincoln Avenue Residence")  {
	$arvlat =  40.104143;
	$arvlon = -88.219322; 
}

if ($arvlocation == "Six Pack")  {
	$arvlat =  40.104008; 
	$arvlon = -88.234972; 
}

if ($arvlocation == "U of I Folletts")  {
	$arvlat =  40.110525; 
	$arvlon = -88.228944; 
}

if ($arvlocation == "Bradley University")  {
	$arvlat =  40.698672; 
	$arvlon = -89.61486; 
}

if ($arvlocation == "City Link - Peoria")  {
	$arvlat =  40.689078; 
	$arvlon = -89.594138; 
}

if ($arvlocation == "Par-A-Dice Casino - E Peoria")  {
	$arvlat =  40.679022; 
	$arvlon = -89.564987; 
}

if ($arvlocation == "Peoria Intl. Airport")  {
	$arvlat =  40.666588; 
	$arvlon = -89.690179; 
}

if ($arvlocation == "Carbondale Amtrak")  {
	$arvlat =  37.724285; 
	$arvlon = -89.216078; 
}

if ($arvlocation == "SIU Student Center")  {
	$arvlat =  37.712565; 
	$arvlon = -89.21818;
}

if ($arvlocation == "SIU Thompson Point")  {
	$arvlat =  37.712161; 
	$arvlon = -89.22377;
}

if ($arvlocation == "SIU Tri Tower")  {
	$arvlat =  37.715742; 
	$arvlon = -89.211624; 
}

echo "<div class=\"container\">
		<!--Map Row Start-->
		<div class=\"row\">";

echo "
	<div id='dptlocation' class='six columns'>
	
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
			q=loc:+$dptlat+$dptlon&amp;
			aq=&amp;
			sll=37.0625,-95.677068&amp;
			sspn=40.86791,73.300781&amp;
			vpsrc=0&amp;
			ie=UTF8&amp;
			t=h&amp;
			z=$zoom&amp;
			ll=$dptlat,$dptlon&amp;
			iwloc=near&amp;
			output=embed'>
		</iframe>
		<br>
		<h5>Departing from: $dptlocation</h5>
	</div>";
	
	echo "
	<div id='arvlocation' class='six columns'>
	
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
			q=loc:+$arvlat+$arvlon&amp;
			aq=&amp;
			sll=37.0625,-95.677068&amp;
			sspn=40.86791,73.300781&amp;
			vpsrc=0&amp;
			ie=UTF8&amp;
			t=h&amp;
			z=$zoom&amp;
			ll=$arvlat,$arvlon&amp;
			iwloc=near&amp;
			output=embed'>
		</iframe>
		<br>
		<h5>Arriving at: $arvlocation</h5>
	</div> ";
	
echo "	</div>
		<!--Map Row End-->";
		
		
	
echo "<br><br><br>
	<div class='row'>
		<div class='twelve columns'>
		<h6>All locations are approximate and meant as guidelines only.  Please check
		with the specific companies for exact drop off/pick up locations.</h6>
		</div>
	</div>
	<!--Disclaimer Row End-->
	</div>
	<!--Container End-->";





?>