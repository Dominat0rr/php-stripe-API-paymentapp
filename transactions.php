<?php
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/Transaction.php');

    // Instantiate a transaction 
    $transaction = new Transaction();

    // Get Customer
    $transactions = $transaction->getTransactions();

    //print_r($transactions);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <title>View Transactions</title>
    </head>
    <body>
        <div class="container mt-4">
        <div class="btn-group" role="group">
            <a class="btn btn-secondary" href="customers.php">Customers</a>
            <a class="btn btn-primary" href="transactions.php">Transactions</a>
        </div>
        <hr>
            <h2>Transactions:</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Transaction id</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transactions as $trans) : ?>
                        <tr>
                            <td><?php echo $trans->id; ?></td>
                            <td><?php echo $trans->customerId; ?></td>
                            <td><?php echo $trans->product; ?></td>
                            <td><?php echo sprintf('%.2f', $trans->amount / 100); ?> <?php echo strtoupper($trans->currency); ?></td>
                            <td><?php echo $trans->date; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <p><a href="index.php">Home</a></p>
        </div>
    </body>