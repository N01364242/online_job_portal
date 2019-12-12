<?php

require_once "Database.php";
require_once "JobSeekerJobApplication.php";

$db = Database::getDb();

session_start();
$employee_id = $_SESSION['user_id'];

/*$sql = "SELECT * FROM job_application_request join job_post on job_application_request.job_id = job_post.job_id
        join job_type on job_post.job_type_id = job_type.id 
        join location on job_post.joblocation_id = location.loc_id 
        where employee_id= :employee_id";


$pdostm = $db->prepare($sql);
$pdostm->bindValue(':employee_id', $employee_id, PDO::PARAM_STR);
$pdostm->execute();
$jobs = $pdostm->fetchAll(PDO::FETCH_OBJ);*/

$j = new JobSeekerJobApplication();

$jobs = $j->AppliedJobs($db, $employee_id);



?>

<html>
<head>
    <title>JobStock</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/jobdescription.css">
    <link rel="stylesheet" href="css/footer.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script>
        $(function(){
            $("#header").load("jobSeekerHeader.php");
        });
        $(function(){
            $("#footer").load("footer.php");
        });
    </script>
</head>
<body>
<div id="header"></div>

<div class="container">
    <div class="row justify-content-center p-5 m-5" >
        <div class="w-85  bg-light p-5">
            <div id="center_column" class="clearfix equal_height">
                <div id="listings_module" class="table-responsive" style="padding: 20px;">
                    <center><h2>Applied jobs</h2></center><br/>
                    <table class="table table-hover" id="dtBasicExample" style="width:90%; margin: auto;">
                        <thead>
                        <tr>
                            <th class="listings_title">Job Title</th>
                            <th class="listings_type">Type</th>
                            <th class="listings_pay">Pay</th>
                            <th class="listings_area">City</th>
                            <th class="listing_status">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($jobs as $job){?>

                            <tr>
                                <td><?php echo $job->job_title; ?></td>
                                <td><?php echo $job->job_type; ?></td>
                                <td><?php echo $job->salary; ?></td>
                                <td><?php echo $job->CITY; ?></td>
                                <td><?php if($job->application_status == 'active') {?>
                                        Applied
                                    <?php }else{ echo $job->application_status;} ?>
                                </td>
                            </tr>


                        <?php }  ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



<div id="footer"></div>


<script>

    // Basic example
    $(document).ready(function () {
        $('#dtBasicExample').DataTable( {
            "pagingType": "full_numbers"
        } );
        $('.dataTables_length').addClass('bs-select');
    });

</script>


</body>
</html>


