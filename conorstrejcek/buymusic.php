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

<?php require_once('./config.php'); ?>

<form action="charge.php" method="post">
    <div class="row">
        <div class="two columns centered">
            <label>Amount</label>
            <input type="text" class="amount"/>
        </div>
    </div>
    <div class="row">
        <div class="two columns centered">
            <script src="https://button.stripe.com/v1/button.js" class="stripe-button"
                data-key="<?php echo $stripe['publishable_key']; ?>"
                data-amount="Custom" data-description="Pay What You Want">
            </script>
        </div>
    </div>
</form>

</body>
</html>