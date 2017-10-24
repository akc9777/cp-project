<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/20/2017
 * Time: 6:34 PM
 */
?>
<html>

<head>
    <title>
        Add Items
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
    <script type="text/javascript">
        function validate() {
            var r = confirm("Do you want to add this item?")
            if (r == true)
                return true;
            else
                return false;
        }
    </script>
</head>
<body>
<div align="center">
    <div class="col-md-6 col-md-offset-6">
        <div>
            <form class="form-horizontal" method="post">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Add Product</legend>
<!--                    ERRORMSGS-->
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
                    <?php } elseif (isset($_SESSION['ac_create_fail'])) { ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['ac_create_fail']; ?></div>
                    <?php } ?>
                    <?php echo validation_errors('<div class="alert alert-danger col-md-6">', '</div>'); ?>
                    <!-- Text input-->
                    <div class="form-group">
                        <div class="col-md-6">
                            <input id="" name="item_name" type="text" placeholder="Item Name"
                                   class="form-control input-md">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-6 control-label"></label>
                        <div class="col-md-6">
                            <input id="" name="rate" type="text" placeholder="Rate in NRs."
                                   class="form-control input-md">

                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-6 control-label"></label>
                        <div class="col-md-6">
                            <button onclick="validate()" name="add" class="btn btn-primary">Add Item</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
