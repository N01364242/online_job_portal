<?php
session_start();
$email=$_SESSION['user'];
?>
<header>
    <div class="fixed-top">
        <div class="top">
            <div class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><img src="images/logo4.png" id="loc" width="150" height="50"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item"><a href="Home.php">Home</a></li>
                        <li> </li>
                        <li class="nav-item"><a href="EmployerProfile.php">My Profile</a></li>
                        <li> </li>
                        <li class="nav-item"><a href="jobpost.php">Post Job</a></li>
                        <li> </li>
                        <li class="nav-item"><a href="Home.php">Notification</a></li>
                        <li>  </li>
                        <li class="nav-item dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php  echo $email?></a>
                            <div class="dropdown-menu">
                                <a href="EmployerLogOut.php" class="dropdown-item">Logout</a>
                            </div></li>
                </div>
                </ul>
            </div>

</header>
