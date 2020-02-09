<?php
    require_once('vendor/autoload.php');
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/Customer.php');
    require_once('models/Transaction.php');

    \Stripe\Stripe::setApiKey('sk_test_PJ6oNTtgBhjUqCW8G3As3kGK00LI188XDM');

    // Sanitize POST Array
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $firstname = $POST["firstname"];
    $lastname = $POST["lastname"];
    $email = $POST["email"];
    $stripe_token = $POST["stripeToken"];

    // Create customer in stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $stripe_token
    ));

    // Charge the customer
    $charge = \Stripe\Charge::create(array(
        "amount" => 5000,
        "currency" => "usd",
        "description" => "Intro To React Course",
        "customer" => $customer->id
    ));

    //print_r($charge);

    // Customer data
    $customerData = [
        'id' => $charge->customer,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email
    ];

    // Transaction data
    $transactionData = [
        'id' => $charge->id,
        'customerId' => $charge->customer,
        'product' => $charge->description,
        'amount' => $charge->amount,
        'currency' => $charge->currency,
        'status' => $charge->status
    ];

    // Instantiate Customer
    $customer = new Customer();
    $customer->addCustomer($customerData);

    // Instantiate Transaction
    $transaction = new Transaction();
    $transaction->addTransaction($transactionData);

    // Redirect to success
    header("Location: success.php?tid=".$charge->id."&product=".$charge->description);
?>