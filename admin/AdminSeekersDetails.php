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
    <title>JobStock - Job Seekers</title>

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
$sql = "Select * from user_details inner join login on useraccid= user_id where usertype_id=102 group by user_id";
$pst = $db->prepare($sql);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Main content for getting seeker information-->
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
                            <?php
                            foreach($data as $seeker) {
                                ?>
                                <tr>
                                  <td><?php echo $seeker->user_id ?></td>
                                    <td><?php echo $seeker->user_firstname." ".$seeker->user_lastname ?></td>
                                    <td><?php echo $seeker->phone ?></td>
                                    <td><?php echo $seeker->email ?></td>
                                    <td><button class ="btn btn-primary btn-lg" data-toggle ="modal" data-target="#myModal"
                                                id="<?php echo $seeker->user_id?>" onclick="showDetails(this);">Details</button></td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <!--Modal on Clicking Details button-->
                        <div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Seeker Details</h4>
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
                                        <h4 class="modal-title">Education Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><b>Degree Name:</b> <span id="dname"></span></p>
                                        <p><b>Major:</b><span id="major"></span> </p>
                                        <p><b>University Name :</b><span id="university_name"></span></p>
                                        <p><b>Current Student:</b><span id="current"></span></p>
                                        <p><b>Completed Date:</b><span id="comdate"></span></p>
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
        <script>
            <!-- To show the details of seekers when we click on Details button-->
            function showDetails(button){
                var seekerId = button.id;
                alert(seekerId);
                $.ajax({
                    url: "seeker.php",
                    method: "GET",
                    data: { "seekerId": seekerId},
                    success: function (response) {
                        var employer = JSON.parse(response);
                        $("#fname").text(employer[0].user_firstname);
                        $("#lname").text(employer[0].user_lastname);
                        $("#rdate").text(employer[0].registrationDate);
                        $("#phone").text(employer[0].phone);
                        $("#email").text(employer[0].email);
                        $("#address").text(employer[0].address);
                        $("#dname").text(employer[0].degree_name);
                        $("#major").text(employer[0].major);
                        $("#university").text(employer[0].university_name);
                        $("#current").text(employer[0].is_current_student);
                        $("#comdate").text(employer[0].completed_date);

                    }

                });
            }




        </script>
 <?php
 include "adminFooter.php";
?>
</body>
</html>
