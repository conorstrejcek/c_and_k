<?php
require_once('./lib/Stripe.php');

$stripe = array(
    'secret_key'      => 'sk_test_IbvQIXfxgzKoLuygHSS76Nsj'),
    'publishable_key' => 'pk_test_pHml3AiM7SxyCrvGRcy8j68v'
);

Stripe::setApiKey($stripe['secret_key']);
?>