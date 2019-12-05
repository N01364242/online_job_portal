<?php
include_once "Database.php";
?>
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
$db = Database::getDb();
$sql = "Select * from contact_us order by time ";
$pst = $db->prepare($sql);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);
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
                                <?php
                                foreach ($data as $mail) {
                                     $monthNum = strtotime($mail->time);
                                    $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));
                                    $time = date('h:i a', $monthNum);
                                ?>
                                <tr class="unread">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message  dont-show"><a href="../mail_view.php"><?php echo $mail->email ?></a></td>
                                    <td class="view-message "><a href="../mail_view.php"><?php echo $mail->query ?></a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right"><?php echo $monthName." ".date('d', strtotime($mail->time)); ?></td>
                                    <td class="view-message  text-right"><?php echo $time; ?></td>
                                </tr>

<?php } ?>
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