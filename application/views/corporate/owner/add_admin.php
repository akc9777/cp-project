<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/24/2017
 * Time: 10:00 AM
 */ ?>
<html>
<head>
    <title>Add Admin</title>
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
<div>
    <a class="btn-danger btn" href="<?php echo base_url(); ?>corporate/dashboard">Back to dashboard</a>
</div>
<div align="center">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <legend>Add Admin</legend>
        <form method="post" class="form" action="">

            <div class="header headerprimary text-center">

            </div>
            <!--            Registering success message-->
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
            <?php } elseif (isset($_SESSION['ac_create_fail'])) { ?>
                <div class="alert alert-danger"><?php echo $_SESSION['ac_create_fail']; ?></div>
            <?php } ?>
            <!--            Validation error messages-->
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('fullname') ?>" type="text" name="fullname"
                       placeholder="Full Name"><br>
            </div>

            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('email') ?>" type="text" name="email"
                       placeholder="Email"><br>
            </div>
            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('password') ?>" type="password" name="password"
                       placeholder="Password"><br>
            </div>
            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('password2') ?>" type="password"
                       name="password2" placeholder="Re-enter Password"><br>
            </div>
            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('address') ?>" type="text" name="address"
                       placeholder="Address"><br>
            </div>
            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('citizenship') ?>" type="text"
                       name="citizenship" placeholder="Citizenship Number"><br>
            </div>
            <div class="form-group">
                <input class="form-control" value="<?php echo set_value('phone') ?>" type="text" name="phone"
                       placeholder="Phone Number"><br>
            </div>
            <div class="footer text-centered">
                <!--                <input align="center" type="submit" name="submit" value="Register" class="btn btn-primary">-->
                <button name="register" class="btn btn-primary">Add Admin</button>
            </div>
        </form>
    </div>


</body>
</html>

