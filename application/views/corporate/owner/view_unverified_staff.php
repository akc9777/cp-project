<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/16/2017
 * Time: 11:03 AM
 */
?>
<html>
<head>
    <title>View New Staff</title>
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
</head>
<body>
<a class="btn-danger btn" href="<?php echo base_url(); ?>corporate/dashboard">Back to dashboard</a>
<div align="center">

    <table class="table table-responsive">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Post</th>
        <th>Verify?</th>
        <th>Delete?</th>

        <?php

        foreach ($details as $item): ?>
            <tr>
                <td><?php echo $item->user_id ?></td>
                <td><?php echo $item->name ?></td>
                <td><?php echo $item->email ?></td>
                <td><?php echo $item->phone ?></td>
                <td><?php echo $item->address ?></td>
                <td><?php echo $item->user_type ?></td>
                <td><a class="btn btn-success" href="verify_confirmation/<?php echo $item->user_id ?>">Verify</a></td>
                <td><a class="btn btn-danger" href="delete_unverified_staff/<?php echo $item->user_id ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
