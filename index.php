<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Pay Page</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="./index.php">Stripe Payment API</a>
        <div class="container-inline ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li>
                    <a class="nav-link" href="./customers.php">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./transactions.php">Transactions</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
    <h2 class="my-4 text-center">Intro to React Course [$50]</h2>
        <form action="./charge.php" method="post" id="payment-form">
        <div class="form-row">
        <input class="form-control mb-3 StripeElement StripeElement--empty" type="text" name="firstname" placeholder="First Name">
        <input class="form-control mb-3 StripeElement StripeElement--empty" type="text" name="lastname" placeholder="Last Name">
        <input class="form-control mb-3 StripeElement StripeElement--empty" type="email" name="email" placeholder="Email Address">
            <!-- <label for="card-element">Credit or debit card</label> -->
            <div id="card-element" class="form-control">
            <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>

        <button>Submit Payment</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./js/charge.js"></script>
</body>
</html>