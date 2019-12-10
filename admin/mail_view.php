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
    <link href="../css/adminHeader.css" rel="stylesheet">
    <link href="../css/adminMainContent.css" rel="stylesheet">
</head>
<body>
<?php
include "adminHeader.php";
include "sidebar.php";
?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-9">
                <section class="content-panel">
                    <header class="panel-heading wht-bg">
                        <h4 class="gen-case">
                            View Message
                        </h4>
                    </header>
                    <div class="panel-body">
                        <div class="mail-header row">
                            <div class="col-md-8">
                                <h4 class="pull-left"> Dashio, New Admin Dashboard & Front-end </h4>
                            </div>
                            <div class="col-md-4">
                                <div class="compose-btn pull-right">
                                    <a href="mail_compose.html" class="btn"><i class="fa fa-reply"></i> Reply</a>
                                   </div>
                            </div>
                        </div>
                        <div class="mail-sender">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="img/ui-zac.jpg" alt="">
                                    <strong>Zac Doe</strong>
                                    <span>[zac@youremail.com]</span> to
                                    <strong>me</strong>
                                </div>
                                <div class="col-md-4">
                                    <p class="date"> 10:15AM 02 FEB 2014</p>
                                </div>
                            </div>
                        </div>
                        <div class="view-mail">
                            <p>Could you please help me on creating a screen</p>
                        </div>
                        <div class="compose-btn pull-left">
                            <a href="mail_compose.html" class="btn"><i class="fa fa-reply"></i> Reply</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- /wrapper -->
</section>
<?php
include "adminFooter.php";
?>

</body>
</html>
