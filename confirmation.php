<?php

//Capturing the results from the form
$trip = $_GET['trip'] ;

	//Splitting the trip back into component parts
	$trip = explode(" ", $trip);
	
	$date = $trip[2];
	//Reformatting of the date
	$date = $date[3] . $date[4] . '/' . $date[6] . $date[7] . '/20' . $date[0] . $date[1];
	
	$dpttime = $trip[3];
	$arvtime = $trip[4];
	$company = $trip[5];
	$price = $trip[6];
	$dptlocation = $trip[7];
	$arvlocation = $trip[8];
	
	//Replacing underscores with spaces
	$company = str_replace("_"," ",$company);
	$dptlocation = str_replace("_"," ",$dptlocation);
	$arvlocation = str_replace("_"," ",$arvlocation);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
   "http://www.w3.org/TR/html4/loose.dtd">
   
<head>

<link rel="stylesheet" type="text/css" href="stylesheets/foundation.css">
<link rel="stylesheet" type="text/css" href="stylesheets/routrr.css">

<script type="text/javascript" src="javascripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="javascripts/app.js"></script>
<script type="text/javascript" src="javascripts/foundation.js"></script>
<script type="text/javascript" src="javascripts/modernizr.foundation.js"></script>

<title>Trip Confirmation - routrr.com</title>

<link rel="icon" type="image/png" href="images/favicon.png">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

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
			
				<!--Confirmation Start-->
				<div class="twelve columns panel" id="confirmation">
					<h3 class="center">You're almost there!</h3>
					<br>
					<br>
					<h5 class="center">On this page you can confirm the trip you selected.  
					<br>
					Clicking the link
					below will take you to our partner's site in order for you to complete your
					transaction.</h5>
					
					<br>
					<br>
					
					<!--Trip Row Start-->
					<div class="row">
						<div class="ten columns offset-by-two">
						<h4>Your Trip</h4>
						<br>
						<h6>
						Departs:   <?php echo $dptlocation; ?>  at <?php echo $dpttime ?><br>
						Arrives:   <?php echo $arvlocation;?>   at <?php echo $arvtime ?><br>
						For:   <?php echo $price;?>
						</h6>
						</div>
						
						<br>
						<br>
					</div>
					<!--Trip Row End-->
					<br>
					<br>
					<h5 class="center">If this looks correct, click "Continue" below to be taken to the
					<?php echo $company;?> website to complete your transaction. <br> 
					Thank you for using routrr!</h5>
					<br>
					<br>
					
				</div>
				<!--Confirmation End-->
			
			</div>
			<!--Main Row End-->
			
			</div>
			<!--Container End-->

</body>
</html>