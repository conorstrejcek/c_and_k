<html>

<head>

<link rel="stylesheet" type="text/css" href="foundation/stylesheets/foundation.css">
<link rel="stylesheet" type="text/css" href="foundation/stylesheets/general.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="foundation/javascripts/foundation.min.js"></script>
<script type="text/javascript" src="foundation/javascripts/app.js"></script>

</head>

<body>

<div class="page_title">Thank You!</div>

<?php
    require_once(dirname(__FILE__) . '/config.php');

    $token  = $_POST['stripeToken'];
    $amount  = $_POST['amount'];
    
    $dollars = (float) $amount;
    $cents = $dollars*100;
    
    $charge = Stripe_Charge::create(array(
        'card'     => $token,
        'amount'   => $cents,
        'currency' => 'usd'
    ));

    echo '<div class="center">Your download should begin shortly...</div>';
?>

<?php
//$filename = 'Test.pdf'; // of course find the exact filename....        
//header('Pragma: public');
//header('Expires: 0');
//header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//header('Cache-Control: private', false); // required for certain browsers 
//header('Content-Type: application/x-rar-compressed');

//header('Content-Disposition: attachment; filename="'. basename($filename) . '";');
//header('Content-Transfer-Encoding: binary');
//header('Content-Length: ' . filesize($filename));

//readfile($filename);
//exit;
?>

</body>
</html>