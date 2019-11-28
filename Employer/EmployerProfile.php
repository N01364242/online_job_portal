<?php
session_start();
$fname=$_SESSION['fname'];
$lname = $_SESSION['lname'];
$pass=$_SESSION['pass'];
$email = $_SESSION['email'];
$phone=$_SESSION['phone'];
$cname = $_SESSION['cname'];
?>
<html>
<head>
    <title>JobStock Hire Talent</title>
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/employerLogin.css">
    <link rel="stylesheet" href="../css/EmployerForm.css">
    <link rel="stylesheet" href="../css/EmployerPage.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/EmployerProfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $("#header").load("../header2.php");
        });
        $(function(){
            $("#footer").load("../footer.php");
        });
    </script>
</head>
<body>
<div id="header"></div>
<h1 id="hding">Edit Profile </h1>
<div class="detail">
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">FirstName</label>
                <input type="text" class="form-control" id="inputEmail4" value="<?php  echo $fname?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Lastname</label>
                <input type="text" class="form-control" id="inputPassword4" value="<?php echo $lname?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Password</label>
            <input type="text" class="form-control" id="inputAddress" value="<?php echo $pass?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Email Address</label>
            <input type="text" class="form-control" id="inputAddress2" value="<?php echo $email?>">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Phone</label>
                <input type="text" class="form-control" id="inputCity" value="<?php echo $phone?>">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">City</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Toronto</option>
                    <option>Brampton</option>
                    <option>Mississauga</option>
                    <option>London</option>
                    <option>North York</option>
                </select>
            </div>
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

</div>
<div id="footer"></div>
</body>
</html>
