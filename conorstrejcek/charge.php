<?php
    require_once(dirname(FILE) . '/config.php');

    $token  = $_POST['stripeToken'];
    $charge = Stripe_Charge::create(array(
        'card'     => $token,
        'amount'   => 5000,
        'currency' => 'usd'
    ));

    echo '<h1>Successfully charged $50.00!</h1>';
?>