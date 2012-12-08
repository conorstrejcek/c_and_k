<?php
    require_once(dirname(__FILE__) . '/config.php');

    $token  = $_POST['stripeToken'];
    $amount  = $_POST['amount'];
    $charge = Stripe_Charge::create(array(
        'card'     => $token,
        'amount'   => $amount,
        'currency' => 'usd'
    ));

    echo '<h1>Successfully charged $50.00!</h1>';
?>