<?php
include_once 'Database.php';
include_once 'JobSeekerJobApplication.php';

$db = Database::getDb();


$id = $_GET['id'];

$j = new JobSeekerJobApplication();
$job = $j->jobDetailsById($db, $id);


$_SESSION['job_title'] = $job->job_title;

if(isset($_POST['apply'])){


    session_start();
    if($_SESSION['user_id']) {


        $employee_id = $_SESSION['user_id'];
        $name = $_FILES['resume']['name'];
        $type = $_FILES['resume']['type'];
        $data = file_get_contents($_FILES['resume']['tmp_name']);

        $application_status = "active";
        $apply_date = date("Y/m/d");

        $count = $j->ApplyJob($db, $id, $employee_id, $application_status, $apply_date, $data);

        if ($count) {
            //echo " Added sucessfully";
            header("Location: jobseekermail.php");
        } else {
            echo "Problem adding a student details";
        }
    }else{
        echo "<script>
                alert('Please Login first to apply for this job.');
                window.location.href='login.php';
                </script>";
    }
}

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

    <script>
        $(function(){
            $("#header").load("header.php");
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
            <h1><?php echo $job->job_title?></h1>

                <ul id="job_summary" class="clearfix">

                    <li>
                        <h6>Date Posted: &nbsp;&nbsp;<?php echo $job->created_date?></h6>
                    </li>
                    <li>
                        <h6>Salary: &nbsp;&nbsp;<?php echo $job->salary?></h6>
                    </li>
                    <li>
                        <h6>Type: &nbsp;&nbsp;<?php echo $job->job_type?></h6>
                    </li>
                    <li>
                        <h6>Location: &nbsp;&nbsp;<?php echo $job->CITY?></h6>
                    </li>
                </ul>

            <div id="desc">
                <p>
                    A small company that is working to solve issues revolving around geriatrics is looking to hire a Senior Engineer.
                    This next person that they add to the team will work across technologies.
                    You will be involved in software development, Machine Learning/AI work and more across an IoT platform.<br/>
                </p>

                <p>
                    They have a very flexible culture and are looking for people that want to help build out their company.
                </p>

                <h2>Required Skills &amp; Experience</h2>
                <ul>
                    <li>3+ years of professional experience in Software Development, Machine Learning, Data Engineering environment</li>
                    <li>Ability to excel in a dynamic environment</li>
                    <li>Experience with modern JavaScript frameworks and OOP languages</li>
                    <li>Self-starter attitude that also works well with others</li>
                    <li>Excellent communication, verbal and written, skills</li>
                </ul>

                <h2>Desired Skills &amp; Experience</h2>
                <ul>
                    <li>Ability to integrate cloud technologies</li>
                </ul>
                <p>&nbsp;</p>
                <p>
                    Applicants must be currently authorized to work in the Canada on a full-time basis now and in the future.
                </p>
                <!--<p>&nbsp;<?php /*echo $job->job_desc*/?></p>-->
                <h2>Apply for this Job</h2>
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Apply Now</button>
            </div>

        </div>
    </div>

</div>



<!-- line modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title">Apply Now</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    </div>

                    <div class="form-group">
                        <label for="resume">Resume</label>
                        <input type="file" id="resume" name="resume">
                    </div>
                    <button type="submit" class="btn btn-outline-primary" name="apply">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<div id="footer"></div>

</body>
</html>

