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
    
    $dollars = (float) $InvoicedUnits;
    $cents = $dollars*100;
    
    $charge = Stripe_Charge::create(array(
        'card'     => $token,
        'amount'   => $cents,
        'currency' => 'usd'
    ));

    echo 'Success!';
?>

</body>
</html>