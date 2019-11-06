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
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-9">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                        <h4 class="gen-case">
                            Inbox
                            <form action="#" class="pull-right mail-src-position">
                                <div class="input-append">
                                    <input type="text" class="form-control " placeholder="Search Mail">
                                </div>
                            </form>
                        </h4>
                    </header>
                            <div class="chk-all">
                                <div class="pull-left mail-checkbox">
                                    <input type="checkbox" class="">
                                </div>
                                <div class="btn-group">
                                    <a data-toggle="dropdown" href="#" class="btn mini all">

                            <div class="btn-group">
                                <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                    <i class=" fa fa-refresh"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-inbox-wrap ">
                            <table class="table table-inbox table-hover">
                                <tbody>
                                <tr class="unread">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message  dont-show"><a href="mail_view.php">ajith@nnc.com</a></td>
                                    <td class="view-message "><a href="mail_view.php">Your new account is ready.</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">March 15</td>
                                    <td class="view-message  text-right">08:10 AM</td>
                                </tr>
                                <tr class="unread">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message dont-show"><a href="mail_view.php">mark@gg.com</a></td>
                                    <td class="view-message"><a href="mail_view.php">Last project updates</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">March 15</td>
                                    <td class="view-message  text-right">08:10 AM</td>
                                </tr>
                                <tr class="unread">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message dont-show"><a href="mail_view.php">jacoz@kkk.com</a></td>
                                    <td class="view-message"><a href="mail_view.php">Thanks for your registration</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">March 15</td>
                                    <td class="view-message  text-right">08:10 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message dont-show"><a href="mail_view.php">henry@jjj.com</a></td>
                                    <td class="view-message"><a href="mail_view.php">New Friendship Request</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">March 13</td>
                                    <td class="view-message  text-right">09:10 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message dont-show"><a href="mail_view.php">vrindz@jjj.com</a></td>
                                    <td class="view-message"><a href="mail_view.html">The server is down</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">March 09</td>
                                    <td class="view-message  text-right">10:10 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message dont-show"><a href="mail_view.php">renuz@jjj.com</a></td>
                                    <td class="view-message"><a href="mail_view.html">New message from Patrick S.</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">March 09</td>
                                    <td class="view-message  text-right">10:10 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message dont-show"><a href="mail_view.php">Pay@jjj.com</a></td>
                                    <td class="view-message"><a href="mail_view.php">New payment received</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">March 09</td>
                                    <td class="view-message  text-right">10:10 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">


                                    <td class="view-message view-message"><a href="mail_view.php">georgez@kkk.com</a></td>
                                    <td class="view-message"><a href="mail_view.php">New payment received</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">March 09</td>
                                    <td class="view-message  text-right">10:10 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">
                                    <td class="view-message dont-show"><a href="mail_view.php">DavidG@jjj.com</a></td>
                                    <td class="view-message view-message"><a href="mail_view.php">Soccer tickets</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">February 22</td>
                                    <td class="view-message  text-right">10:10 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message view-message"><a href="mail_view.php">Surzz@jjj.com</a></td>
                                    <td class="view-message view-message"><a href="mail_view.php">Soccer tickets</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">February 19</td>
                                    <td class="view-message  text-right">11:10 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">
                                    <td class="view-message dont-show"><a href="mail_view.php">Martin@hhh.com</a></td>
                                    <td class="view-message view-message"><a href="mail_view.php">Thanks for reply</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">February 17</td>
                                    <td class="view-message  text-right">10:34 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="dont-show"><a href="mail_view.php">Face@hhh.com</a></td>
                                    <td class="view-message"><a href="mail_view.php">Paul published on your wall</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">February 19</td>
                                    <td class="view-message  text-right">10:34 AM</td>
                                </tr>
                                <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message dont-show"><a href="mail_view.php">Steve@jko.com</a></td>
                                    <td class="view-message"><a href="mail_view.php">Update developed</a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">February 11</td>
                                    <td class="view-message  text-right">11:34 AM</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- /wrapper -->
</section>
</body>
</html>