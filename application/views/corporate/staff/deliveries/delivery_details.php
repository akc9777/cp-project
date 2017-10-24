<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/20/2017
 * Time: 12:49 PM
 */
?>
<html>
<head>
    <title>Orders Details</title>
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

    <script type="text/javascript">

        function validate() {
            var r = confirm("Do you want to deliver this order?")
            if (r == true)
                return true;
            else
                return false;
        }

    </script>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"-->
    <!--          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->
</head>
<body>
<a class="btn-danger btn" href="<?php echo base_url(); ?>order/deliver_order">Back to Delivery Order</a>
<div align="center">


    <div>
        <b>Vendee: </b> <?php echo $bill[0]->orderer; ?><br>
        <b>Phone: </b> <?php echo $bill[0]->phone; ?><br>
        <b>Shipping Address: </b> <?php echo $bill[0]->shipping_address; ?><br>
        <b>Billing Address: </b> <?php echo $bill[0]->billing_address; ?><br>
    </div>
    <table class="table col-md-7 " align="center">

        <th>S.N.</th>
        <th>Particulars</th>
        <th>Quantity</th>
        <th>Rate</th>

        <th>Amount</th>

        <?php
        $i = 1;
        foreach ($bill as $item): ?>
            <tr>
                <td><?php echo $i;
                    $i++; ?></td>
                <td><?php echo $item->name ?></td>
                <td><?php echo $item->quantity ?></td>
                <td><?php echo $item->rate ?></td>
                <td><?php echo $item->quantity * $item->rate; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>


</div>
<div class="text-center">
    <a class="btn btn-success" href="<?php echo  base_url();?>order/confirm_delivery/<?php echo $item->bill_no?>"
       onclick="validate()">Take Delivery Task</a>

</div>

</body>
</html>

