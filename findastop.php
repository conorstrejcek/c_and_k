<?php
$mapdata = $_GET['map'];
$stop = $_GET['stop'];

$lat = $mapdata[0];
$lon = $mapdata[1];
$lon = substr($lon, 1);


echo "	<h5>Is this location right?</h5>
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
			q=loc:+$lat+$lon&amp;
			aq=&amp;
			sll=37.0625,-95.677068&amp;
			sspn=40.86791,73.300781&amp;
			vpsrc=0&amp;
			ie=UTF8&amp;
			t=h&amp;
			z=15&amp;
			ll=$lat,$lon&amp;
			iwloc=near&amp;
			output=embed'>
		</iframe>
		<h5 id=\"found_stop\">Your closest stop is: $stop</h5>";
		
		
?>