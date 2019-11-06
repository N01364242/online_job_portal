<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/adminHeader.css" rel="stylesheet">
    <link href="css/adminMainContent.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">

</head>
<body>
<?php
include "adminHeader.php";
include "sidebar.php";
?>
<section id="main-content">
    <section class="wrapper">
        <h3> User Interface Elements</h3>
        <hr>
        <div class="row mt">
            <!--Dropdown primary-->
            <div class="dropdown">

                <!--Trigger-->
                <a class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Elements</a>


                <!--Menu-->
                <div class="dropdown-menu dropdown-primary">
                    <a class="dropdown-item" href="#">Businesss Stream</a>
                    <a class="dropdown-item" href="#">SkillSet</a>
                    <a class="dropdown-item" href="#">Skill level</a>
                    <a class="dropdown-item" href="#">FAQ</a>
                </div>
            </div>
            <!--/Dropdown primary-->
            <div class="col-lg-12">

                <div class="content-panel">

            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Business Stream ID</th>
                        <th>Business Stream Name</th>

                    <tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>201</td>
                        <td>Service Business</td>

                    </tr>
                    <tr>
                        <td>202</td>
                        <td>Merchandising Business</td>


                    </tr>
                    <tr>
                        <td>203</td>
                        <td>Manufacturing Business</td>


                    </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </section>
</section>
<?php
include "adminFooter.php";
?>
</body>
</html>
