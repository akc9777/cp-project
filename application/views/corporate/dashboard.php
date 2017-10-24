<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/7/2017
 * Time: 12:25 PM
 */
?>
<html>
<head>
    <title>
        Home
    </title>
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
<div align="right">
    <a class="btn btn-danger" href="<?php echo base_url() ?>corporate/logout">Logout</a>
    <?php if ($this->session->data == 1) { ?>
        <a class="btn btn-success" href="<?php echo base_url(); ?>help/admin_help">Help</a>
        <?php
    } else { ?>
        <a class="btn btn-success" href="<?php echo base_url(); ?>help/staff_help">Help</a>
    <?php } ?>
</div>
<div align="center">
    <div class="col-md-10 col-md-offset-1">
        <div>
            <h1>Dashboard</h1>
            <?php if (isset($_SESSION['success_pwd'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['success_pwd']; ?></div>
            <?php } ?>
            <div class="card col-md-4" style="border:solid 2px black;

background-color:white; ">

                <h5>Account</h5><br><br>
                <a class="btn btn-primary"
                   href="<?php echo base_url(); ?>corporate/view_profile">Profile</a><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>corporate/change_password">Change
                    Password</a><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>corporate/add_admin">Add Admin </a><br><br>

            </div>
        </div>
        <?php if ($this->session->data == 1) { ?>
            <div class="card col-md-4" style="border:solid 2px rgba(251,194,126,0.68);
background-color:white; ">
                <h5>Staff</h5><br>

                <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/view_staff">View Staff Details</a>
                <br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/view_unverified_staff">View
                    Unverified Staff</a><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>group/add_group">Create
                    Groups</a><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>group/view_group">View
                    Groups</a><br>
                <br>

            </div>
        <?php } ?>


        <div class="card col-md-4" style="border:solid 2px black;
background-color:white; ">
            <h5>Order</h5><br><br>
            <?php if ($this->session->data == 1) { ?>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>order/place_order">Place Order</a><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>order/view_unverified_order">Unverified
                    Orders</a><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>order/payment_pending_orders">Payment Pending
                    Orders</a><br>

            <?php } else { ?>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>order/deliver_order">All Delivery Tasks</a><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>order/group_delivery">Your Deliveries </a>
            <?php } ?>
            <br>

        </div>
        <?php if ($this->session->data == 1) { ?>
            <!--            inventory-->
            <div class="card col-md-4" style="border:solid 2px rgba(251,194,126,0.68);
background-color:white; ">
                <h5>Inventory</h5><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>inventory/manage_item">Manage
                    Inventory</a><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>inventory/add_item">Add Products</a>
                <br>
                <!--                vehicle-->
            </div>
            <div class="card col-md-4" style="border: solid 2px black;background-color: white">
                <h5>Vehicles</h5><br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>vehicle/manage_vehicle">Manage Vehicle</a><br>


            </div>


        <?php } ?>
    </div>

</div>
</body>
</html>
