<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/20/2017
 * Time: 9:46 AM
 */

?>
<html>
<head>
    <title>View Staff</title>
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
<a class="btn-danger btn" href="<?php echo base_url(); ?>corporate/dashboard">Back to dashboard</a>
<div align="center">
<table class="table-responsive table" >
    <th>ID</th>
    <th>Name</th>
    <th>Driver</th>
    <th colspan="2">Workers</th>
    <th>Vehicle</th>

    <?php foreach ($details as $item):?>
    <tr>
        <td><?php echo $item->group_id?></td>
        <td><?php echo $item->group_name?></td>
        <td><?php echo $item->driver_id?></td>
        <td><?php echo $item->worker1_id?></td>
        <td><?php echo $item->worker2_id?></td>
        <td><?php echo $item->vehicle_id?></td>

    </tr>
<?php endforeach;?>
</table></div>
</body>
</html>


