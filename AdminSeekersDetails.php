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
        <h3> JobSeeker Details</h3>
        <hr>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>JobSeeker ID</th>
                                <th>JobSeeker Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            <tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>101</td>
                                <td>Austin</td>
                                <td>675-987-6650</td>
                                <td>austin@ggg.com</td>

                            </tr>
                            <tr>
                                <td>102</td>
                                <td>John</td>
                                <td>987-098-6543</td>
                                <td>john@yyy.com</td>
                            </tr>
                            <tr>
                                <td>103</td>
                                <td>Maria</td>
                                <td>876-098-5634</td>
                                <td>maria@ggg.com</td>

                            </tr>
                            <tr>
                                <td>104</td>
                                <td>John</td>
                                <td>987-098-6543</td>
                                <td>john@yyy.com</td>

                            </tr>
                            <tr>
                                <td>105</td>
                                <td>Christina</td>
                                <td>876-098-5634</td>
                                <td>christina@ggg.com</td>


                            </tr>

                            </tbody>
                        </table>
                    </section>
                </div>
                <!-- /content-panel -->
            </div>
            <!-- /col-lg-4 -->
        </div>
</body>
</html>
