<?php
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
            $("#header").load("../header.php");
        });
        $(function(){
            $("#footer").load("../footer.php");
        });
    </script>
</head>
<body>
<div id="header"></div>

<div class="container">
    <div class="row justify-content-center p-5 m-5" >
        <div class="w-85  bg-light p-5">
            <h1>Senior Engineer (OOP)</h1>

                <ul id="job_summary" class="clearfix">

                    <li>
                        <h6>Date Posted: &nbsp;&nbsp;November 05, 2019</h6>
                    </li>
                    <li>
                        <h6>Salary: &nbsp;&nbsp;$85K-120K DOE</h6>
                    </li>
                    <li>
                        <h6>Category: &nbsp;&nbsp;Software</h6>
                    </li>
                    <li>
                        <h6>Location: &nbsp;&nbsp;Toronto, ON</h6>
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
                <p>&nbsp;</p>
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
                <form>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="resume">Resume</label>
                        <input type="file" id="resume" name="resume">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
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

