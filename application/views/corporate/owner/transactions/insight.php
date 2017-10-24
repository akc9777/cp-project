<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/21/2017
 * Time: 8:30 PM
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
        <table class="table col-sm-2 col-sm-offset-2">
            <?php
            echo "<tr><td><b>Daily Gross Income : </b></td><td> NRs. " . $insight['income_d'] . "</td></tr>";
            echo "<tr><td><b>Weekly Gross Income :</b> </td><td> NRs. " . $insight['income_w'] . "</td></tr>";
            echo "<tr><td><b>Monthly Gross Income : </b> </td><td>NRs. " . $insight['income_m'] . "</td></tr>";
            echo "<tr><td><b>Daily Gross Expense : </b></td><td> NRs. " . $insight['expense_d'] . "</td></tr>";
            echo "<tr><td><b>Weekly Gross Expense : </b> </td><td>NRs. " . $insight['expense_w'] . "</td></tr>";
            echo "<tr><td><b>Monthly Gross Expense : </b></td><td> NRs. " . $insight['expense_m'] . "</td></tr>";
            ?></table>

        <a href="#" class="btn btn-primary">View All Transaction</a>
        <a href="#" class="btn btn-primary">View Sales Transaction</a>
        <a href="#" class="btn btn-primary">View Purchase Transaction</a>
    </div>
</div>
</body>
</html>

