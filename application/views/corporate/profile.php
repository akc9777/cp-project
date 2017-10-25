<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/7/2017
 * Time: 8:15 PM
 */
?>
<html>
<head>
    <title>
        Profile
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
<div>
    <a class="btn-danger btn" href="<?php echo base_url(); ?>corporate/dashboard">Back to dashboard</a>

</div>
<div align="center">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

        <?php
        echo "<h1>Details</h1>" . "<br>";
        if (isset($_SESSION['update_success'])) {
            ?>
            <div class="alert alert-success"><?php echo $this->session->update_success ?></div><?php
        } elseif (isset($_SESSION['update_fail'])) {
            ?>
            <div class="alert alert-danger">Profile not updated</div> <?php
        }
        foreach ($result as $r):


            echo "<table class='table-responsive'><tr>";
            echo "<th>Name : </th><td>" . $r->name . "</td></tr><br>";
            echo "<th>Email : </th><td>" . $r->email . "</td><td><a class='btn btn-primary' href='" . base_url() . "corporate/edit_email'>Change</a> </td></tr><br>";
            echo "<th>Address : </th><td>" . $r->address . "</td><td><a class='btn btn-primary' href='" . base_url() . "corporate/edit_address'>Change</a> </td></tr><br>";
            echo "<th>Contact no. : </th><td>" . $r->phone . "</td><td><a class='btn btn-primary' href='" . base_url() . "corporate/edit_phone'>Change</a> </td></tr><br>";
//            echo "<th>Citizenship no. : </th><td>" . $r->citizenship_document_no . "</td></tr><br>";

        endforeach;
        ?>
        </table>
    </div>

</div>
</body>
</html>
