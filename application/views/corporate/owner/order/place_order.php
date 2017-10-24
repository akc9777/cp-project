<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/17/2017
 * Time: 8:37 PM
 */
?>
<html>
<head>
    <title>Place Order</title>
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

    <script type="text/javascript">

        function validate() {
            var r = confirm("Do you want to place this order?")
            if (r == true)
                return true;
            else
                return false;
        }

        $(document).ready(function (e) {
            //variables
            var html = '<div class="form-group"><select class="form-group" name="item[]"><option selected disabled>Select Item</option><?php foreach ($details as $d):echo "<option value=\'" . $d->item_id . "\' >" . $d->name . "</option>";endforeach; ?></select><input class="form-group" type="number" name="quantity[]" placeholder="Quantity(cubic ft./pc)"><a class="" id="remove"><span class="glyphicon glyphicon-minus"></span></a></div>';
            var i = 1;
            var max_rows = 2;

            //addrows
            $("#add").click(function (e) {
                if (i <= max_rows) {
                    $('#dup').append(html);
                    i++;
                }
            });

            //removerows
            $('#dup').on('click', '#remove', function (e) {
                $(this).parent('div').remove();
                i--;
            });
        });
    </script>
</head>
<body>
<a class="btn-danger btn" href="<?php echo base_url(); ?>corporate/dashboard">Back to dashboard</a>
<div align="center">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <h3>Place Order</h3>

        <?php if (isset($_SESSION['ordered'])) { ?>
            <div class="alert alert-success"><?php echo $_SESSION['ordered'] ?></div>
        <?php } elseif (isset($_SESSION['not_ordered'])) { ?>
            <div class="alert alert-danger"><?php echo $_SESSION['ordered'] ?></div>

        <?php } ?>


        <form method="post" class="form" onsubmit="return(validate());">

            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Purchaser's Name"><br>
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="shipping_address" placeholder="Shipping Address"><br>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="billing_address" placeholder="Billing Address"><br>
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="phone" placeholder="Phone Number"><br>
            </div>
            <div id="dup">
                <div class="form-group">
                    <select class="form-group" name="item[]">
                        <option selected disabled>Select Item</option>
                        <?php
                        foreach ($details as $d):
                            echo "<option value='" . $d->item_id . "' >" . $d->name . "</option>";

                        endforeach;
                        ?>
                    </select>
                    <input class="form-group" type="number" name="quantity[]" placeholder="Quantity(cubic ft./pc)">

                    <a class=" " id="add"><span class="glyphicon glyphicon-plus"></span></a>
                </div>
            </div>
            <div class="footer text-centered">
                <!--                <input align="center" type="submit" name="submit" value="Register" class="btn btn-primary">-->
                <button name="submit" class="btn btn-primary">Place Order</button>

            </div>
        </form>
    </div>
</body>
</html>





