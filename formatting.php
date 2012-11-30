<?php

$info = $_GET['tripData'];

//Pass the trip to Python for searching
exec("/usr/local/bin/python" . " " . "cgi-bin/search.py" . " " . $info, $results);

date_default_timezone_set('America/Chicago');

function tblcreate($trips) { 
	echo "<br>";
	echo "<div class=\"container\">";
		
		echo "<div class=\"row\">";
		echo "<div class=\"subtitle\">We found $trips[0] results.</div>
			<h6 style=\"text-align:center\">Click on the table headings to sort the results.</h6>
			<br>
			<h6 style=\"text-align:center;\"><a class=\"black\" id=\"stopfinder\" data-reveal-id=\"findastopModal\">Where is my closest stop?</a></h6>";
		echo "</div>";
		
		//Start of Results Table
		echo "<div class=\"row\">";
			echo "<div id=\"resultsTable\" class=\"twelve columns text\">";
			echo "<br>";
			
			//Create the table header
			echo "<table id=\"results_table\"class='tablesorter' cellspacing=0>
					<thead>
						<tr>
							<th>Carrier</th>
							<th>Departing from</th>
							<th>Arriving at</th>
							<th>Departing</th>
							<th>Arriving</th>
							<th>Price</th>
							<th></th>
						</tr>
					</thead>
				<tbody>";
				
			
			//For loop splits each line into data to be displayed and displays a row.
			for($i=1; $i<count($trips)-1;$i++){
			
				//Extract data to display from each result
				$line = $trips[$i];
				$line_split = explode( " ", $line);
				
				$dpt_city = str_replace("_", " ", $line_split[7]);
				$arv_city = str_replace("_", " ", $line_split[8]);
				$dpt_time = $line_split[3];
				$arv_time = $line_split[4];
				$company = $line_split[5];
				$price = $line_split[6];
				
				$dpt_time = DATE("g:i a", STRTOTIME($dpt_time));
				$arv_time = DATE("g:i a", STRTOTIME($arv_time));
				
				
				//Start row of results
				echo "<tr>
						<td onclick=\"submitForm('$line');\"><img class=\"bus_logo\"src=\"images/bus_logos/$company.png\" alt=\"$company\"  /></td>
						<td onclick=\"submitForm('$line');\">$dpt_city</td>
						<td onclick=\"submitForm('$line');\">$arv_city</td>
						<td onclick=\"submitForm('$line');\">$dpt_time</td>
						<td onclick=\"submitForm('$line');\">$arv_time</td>
						<td onclick=\"submitForm('$line');\">$price</td>
					  ";
					
					echo "<td style=\"text-decoration:underline;\" onclick=\"mapBox('$line');\">Map</td>";
					echo "</tr>";
				//End row of results
				
			}
			
			echo "</tbody>
				</table>";
			
			
			echo "</div>";
		echo "</div>";
		
		
	echo "</div>";
}


tblcreate($results);



?>