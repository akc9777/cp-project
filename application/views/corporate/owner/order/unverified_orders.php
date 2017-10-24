<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/18/2017
 * Time: 9:29 PM
 */?>
<html>
<head>
    <title>New Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"-->
    <!--          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->
</head>
<body>
<a class="btn-danger btn" href="<?php echo base_url(); ?>corporate/dashboard">Back to dashboard</a>
<div align="center">
    <?php if (isset($_SESSION['confirmed'])) { ?>
        <div class="alert alert-success"><?php echo $this->session->confirmed;?></div>
    <?php } elseif ((isset($_SESSION['removed']))) { ?>
        <div class="alert alert-success"><?php echo $this->session->removed;?></div>
    <?php } ?>

    <table class="table">
        <th>Bill no.</th>
        <th>Vendee</th>

        <th>Phone</th>
        <th>Shipping Address</th>
        <th>Billing Address</th>

        <th>Order Details</th>


        <?php

        foreach ($records as $item): ?>
            <tr>
                <td><?php echo $item->bill_no ?></td>
                <td><?php echo $item->orderer ?></td>

                <td><?php echo $item->phone ?></td>
                <td><?php echo $item->shipping_address ?></td>
                <td><?php echo $item->billing_address ?></td>

                <td><a class="btn btn-primary" href="order_details/<?php echo $item->bill_no; ?>">View</a></td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
