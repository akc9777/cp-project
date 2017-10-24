<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/20/2017
 * Time: 8:30 PM
 */
?>
<html>
<head>
    <title>Deliver Orders</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<a class="btn-danger btn" href="<?php echo base_url(); ?>corporate/dashboard">Back to dashboard</a>
<div align="center">
    <?php if (isset($_SESSION['updated'])) { ?>
        <div class="alert alert-success"><?php echo $this->session->updated; ?></div>
    <?php } elseif ((isset($_SESSION['failed']))) { ?>
        <div class="alert alert-success"><?php echo $this->session->failed; ?></div>
    <?php } ?>

    <table class="table">

        <th>S.N.</th>
        <th>Item</th>
        <th>Rate</th>
        <th>Quantity(in cu.ft/pc)</th>
        <th colspan="2">Operations</th>

        <?php
        $i = 1;
        foreach ($result as $item): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $item->name ?></td>
                <td><?php echo $item->rate ?></td>

                <td><?php echo $item->quantity ?></td>

                <td><a class="btn btn-primary" href="<?php echo base_url();?>inventory/add_stock/<?php echo $item->item_id?>">Add Stock</a></td>
                <td><a class="btn btn-primary" href="<?php echo base_url();?>inventory/update_rate/<?php echo $item->item_id?>">Update Price</a></td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
