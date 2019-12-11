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
    <title>JobStock</title>

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
    <script type="text/javascript" src="../js/userdetails.js"></script>


</head>
<body>
<?php
include "adminHeader.php";
include "sidebar.php";
$db = Database::getDb();
$sql = "Select * from user_details inner join login on useraccid= user_id  inner join company on user_id = employerId where usertype_id=101";
$pst = $db->prepare($sql);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);
?>
<section id="main-content">
    <section class="wrapper">
        <h3> Employer Details</h3>
        <hr>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Employer ID</th>
                                <th>Employer Name</th>
                                <th>Company Name</th>
                                <tr>
                            </thead>
                            <tbody>
                            <?php
                            //loop to get the employer details
                            foreach ($data as $employer) {
                            ?>
                            <tr>
                                <td><?php echo $employer->user_id?></td>
                                <td><?php echo $employer->user_firstname." ".$employer->user_lastname?></td>
                                <td><?php echo $employer->company_name?></td>
                                <td><button class ="btn btn-primary btn-lg" data-toggle ="modal" data-target="#myModal"
                                 id="<?php echo $employer->user_id?>" onclick="showEmployerDetails(this);">Details</button></td>

                            </tr>
<?php } ?>

                            </tbody>
                        </table>
                        <!--Modal to display the details of employer -->
                        <div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Employer Details</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <p><b>First Name:</b> <span id="fname"></span></p>
                                        <p><b>Last Name:</b><span id="lname"></span> </p>
                                        <p><b>Registration Date:</b><span id="rdate"></span></p>
                                        <p><b>Phone:</b><span id="phone"></span></p>
                                        <p><b>Email:</b><span id="email"></span></p>
                                        <p><b>Address:</b><span id="address"></span></p>
                                    </div>

                                    <div class="modal-header">
                                        <h4 class="modal-title">Company Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><b>Company Name:</b> <span id="cname"></span></p>
                                        <p><b>Company Desc:</b><span id="cdesc"></span> </p>
                                        <p><b>Business Stream :</b><span id="business"></span></p>
                                        <p><b>Establishment Date:</b><span id="edate"></span></p>
                                        <p><b>Company URL:</b><span id="curl"></span></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </section>
                </div>
                <!-- /content-panel -->
            </div>
            <!-- /col-lg-4 -->
        </div>


 <?php
 include "adminFooter.php";
?>
</body>
</html>
