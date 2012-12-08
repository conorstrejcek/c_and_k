<html>

<head>

<link rel="stylesheet" type="text/css" href="foundation/stylesheets/foundation.css">
<link rel="stylesheet" type="text/css" href="foundation/stylesheets/general.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="foundation/javascripts/foundation.min.js"></script>
<script type="text/javascript" src="foundation/javascripts/app.js"></script>

</head>

<body>

<!-- Title -->
<div class="page_title"><a href="index.html" class="page_title">Buy My Music</a></a></div>
<!-- /Title -->

<br>
<br>

<form action="" method="POST" id="payment-form">
    <div class="row">
        <div class = "five columns">
            <label>Card Number</label>
            <input type="text" maxlength="20" autocomplete="off" class="card-number"/>
        </div>
    </div>
    <div class="row">
        <div class="one columns">
            <label>CVC</label>
            <input type="text" maxlength="4" autocomplete="off" class="card-cvc"/>
        </div>
        <div class="two columns">
            <label>Expiration (MM</label>
            <input type="text" maxlength="2" class="card-expiry-month"/>
        </div>
        <div class="two columns end">
            <label>/YY)</label>
            <input type="text" maxlength="2" class="card-expiry-year"/>
        </div>
    </div>
    <div class="row">
        <div class="five columns">
            <button type="submit" class="button">Submit Payment</button>
        </div>
    </div>
</form>

<?php require_once('./config.php'); ?>

<form action="charge.php" method="post">
    <script src="https://button.stripe.com/v1/button.js" class="stripe-button"
        data-key="<?php echo $stripe['publishable_key']; ?>"
        data-amount="5000" data-description="One year's subscription"></script>
</form>

</body>
</html>