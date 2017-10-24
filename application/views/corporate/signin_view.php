<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/7/2017
 * Time: 9:35 AM
 */
?>
<html>
<head>
    <title>Login</title>

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
    <a class="btn btn-success" href="<?php echo base_url();?>help/account_help">Help</a>
</div>
<div align="center">

    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

        <form class="form" method="post" action="">

            <div class="header headerprimary text-center">
                <h5>Login</h5>
            </div>

            <?php if (isset($_SESSION['loginsuccess'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['loginsuccess']; ?></div>
            <?php } elseif (isset($_SESSION['loginfail'])) { ?>
                <div class="alert alert-danger"><?php echo $_SESSION['loginfail']; ?></div>
            <?php } ?>

            <?php echo validation_errors("<div class='alert alert-danger'>", "</div>") ?>

            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email"><br>
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password"><br>
            </div>

            <div class="footer text-center">
                <button name="login" class="btn btn-primary">Login</button>
            </div>

            <form>
    </div>
</div>
<div align="center">
    Not a member? <a href="<?php echo base_url() ?>corporate/register">Register</a> your account now.<br>
</div>
</body>
</html>
