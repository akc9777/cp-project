<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/19/2017
 * Time: 12:42 PM
 */
?>
<html>
<head>
    <title>
        Make Group
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
    <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>

<a class="btn-danger btn" href="<?php echo base_url(); ?>corporate/dashboard">Back to dashboard</a>
<div align="center">

    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

        <form class="form" method="post" action="">

            <div class="header headerprimary text-center">
                <h5>Make Group</h5>
            </div>
            <!--            Validation error messages-->
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <?php if (isset($_SESSION['group_success']) && isset($_SESSION['email'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['group_success']; ?></div>
            <?php } elseif (isset($_SESSION['group_fail'])) { ?>
                <div class="alert alert-danger"><?php echo $_SESSION['group_fail']; ?></div>
            <?php } ?>


            <div class="form-group">
                <input class="form-control" type="text" value="<?php echo set_value('group_name'); ?>" name="group_name" placeholder="Group Name"><br>
            </div>

            <div class="form-group">
                <!--                driver-->
                <select name="driver" class="form-control">
                    <option selected disabled value="0">-Driver-</option>
                    <?php foreach ($drivers as $driver): ?>
                        <option value="<?php echo $driver->user_id; ?>"><?php echo $driver->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <!--                worker-->
                <select name="worker1" class="form-control">
                    <option selected disabled value="0">-Worker1-</option>
                    <?php foreach ($workers as $worker): ?>
                        <option value="<?php echo $worker->user_id; ?>"><?php echo $worker->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <!--                worker-->
                <select name="worker2" class="form-control">
                    <option  selected disabled value="0">-Worker2-</option>
                    <?php foreach ($workers as $worker): ?>
                        <option value="<?php echo $worker->user_id; ?>"><?php echo $worker->name ?></option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="form-group">
                <!--                vehicle-->
                <select name="vehicle" class="form-control">
                    <option selected disabled value="0">-Vehicle-</option>
                    <?php foreach ($vehicles as $vehicle): ?>
                        <option value="<?php echo $vehicle->vehicle_id; ?>"><?php echo $vehicle->registration_number ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="footer text-center">
                <button name="save" class="btn btn-primary">Create Group</button>
            </div>

            <form>
    </div>
</div>

</body>

</html>
