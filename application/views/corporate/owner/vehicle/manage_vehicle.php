<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/19/2017
 * Time: 1:21 PM
 */
?>
<html>
<head>
    <title>
        Manage Vehicle
    </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        function confirm() {
            var r = confirm("Do you want to remove this vehicle?")
            if (r == true)
                return true;
            else
                return false;
        }
    </script>

</head>
<body>

<a class="btn-danger btn" href="<?php echo base_url(); ?>corporate/dashboard">Back to dashboard</a>
<div align="center">

    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">

        <form class="form" method="post" action="">

            <div class="header headerprimary text-center">
                <h5>Add Vehicle</h5>
            </div>

            <?php if (isset($_SESSION['added']) && isset($_SESSION['email'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['added']; ?></div>
            <?php } elseif (isset($_SESSION['not_added'])) { ?>
                <div class="alert alert-danger"><?php echo $_SESSION['not_added']; ?></div>
            <?php } ?>

            <?php echo validation_errors("<div class='alert alert-danger'>", "</div>") ?>

            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('make'); ?>" type="text" name="make"
                       placeholder="Vehicle Make"><br>
            </div>
            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('model'); ?>" type="text" name="model"
                       placeholder="Vehicle Model"><br>
            </div>
            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('engine_no'); ?>" type="text" name="engine_no"
                       placeholder="Vehicle Engine Number"><br>
            </div>
            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('chasis_no'); ?>" type="text" name="chasis_no"
                       placeholder="Vehicle Chasis Number"><br>
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="number_plate"
                       value="<?php echo set_value('registration'); ?>"
                       placeholder="Vehicle Registration Number (eg. Ba 3 Kha 7823)"><br>
            </div>


            <div class="footer text-center">
                <button name="login" class="btn btn-primary">Add Vehicle</button>
            </div>

            <form>
    </div>
</div>
<table class="table tablet-responsive"  align="center">
    <tr>
        <th>S.N.</th>
        <th>Make</th>
        <th>Model</th>
        <th>Engine number</th>
        <th>Chasis number</th>
        <th>Registration number</th>
        <th>Action</th>
    </tr>
    <?php
    $i = 1;
    foreach ($details as $detail):
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        $i++;
        echo "<td>" . $detail->make . "</td>";
        echo "<td>" . $detail->model . "</td>";
        echo "<td>" . $detail->engine_no . "</td>";
        echo "<td>" . $detail->chasis_no . "</td>";
        echo "<td>" . $detail->registration_number . "</td>";
        echo "<td><a class='btn btn-danger' href='remove_vehicle/" . $detail->vehicle_id . "'>Remove</a> </td>";
        echo "</tr>";
    endforeach;
    ?>
</table>


<div>

</div>
</body>

</html>
