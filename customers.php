<?php
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/Customer.php');

    // Instantiate a customer
    $customer = new Customer();

    // Get Customer
    $customers = $customer->getCustomers();

    //print_r($customers);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <title>View Customers</title>
    </head>
    <body>
        <div class="container mt-4">
        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="customers.php">Customers</a>
            <a class="btn btn-secondary" href="transactions.php">Transactions</a>
        </div>
        <hr>
            <h2>Customers:</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Customer id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($customers as $cus) : ?>
                        <tr>
                            <td><?php echo $cus->id; ?></td>
                            <td><?php echo $cus->firstname; ?> <?php echo $cus->lastname; ?></td>
                            <td><?php echo $cus->email; ?></td>
                            <td><?php echo $cus->date; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <p><a href="index.php">Home</a></p>
        </div>
    </body>