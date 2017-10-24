<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/7/2017
 * Time: 6:38 PM
 */

?>
<head>
    <title>Update Profile</title>

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
<div align="center">
    <!--    <h1>Siddheshwor Suppliers</h1>-->
</div>
<div align="center">

    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

        <form class="form" method="post" action="">

            <div class="header headerprimary text-center">
                <h1>Update Profile</h1>
            </div>

            <?php if (isset($_SESSION['success']) && isset($_SESSION['email'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
            <?php } elseif (isset($_SESSION['fail'])) { ?>
                <div class="alert alert-danger"><?php echo $_SESSION['fail']; ?></div>
            <?php } ?>

            <?php echo validation_errors("<div class='alert alert-danger'>", "</div>");
            foreach ($result

            as $r)
            ?>

            <div class="form-group">
                <input value="<?php echo $r->fname ?>" class="form-control" type="text" name="fname"
                       placeholder="First Name" disabled><br>
            </div>
            <div class="form-group">
                <input value="<?php echo $r->lname ?>" class="form-control" type="text" name="lname"
                       placeholder="Last Name" disabled> <br>
            </div>
            <div class="form-group">
                <input value="<?php echo $r->email ?>" class="form-control" type="text" name="email"
                       placeholder="Email"><br>
            </div>
            <div class="form-group">
                <input value="<?php echo $r->address ?>" class="form-control" type="text" name="address"
                       placeholder="Address"><br>
            </div>
            <div class="form-group">
                <input value="<?php echo $r->citizenship_document_no ?>" class="form-control" type="text"
                       name="citizenship" disabled placeholder="Citizenship Number"><br>
            </div>
            <div class="form-group">
                <input value="<?php echo $r->phone ?>" class="form-control" type="text" name="phone"
                       placeholder="Phone Number"><br>
            </div>

            <div class="footer text-center">
                <button name="change_password" class="btn btn-primary">Update Profile</button>
                <a class="btn btn-primary" href="<?php echo base_url() ?>corporate/view_profile">Cancel</a>
            </div>

            <form>
    </div>
</div>
<div align="center">

</div>
</body>
</html>