<?php
require_once 'Database.php';

$firstNameError = "";
$lastNameError = "";
$emailError = "";
$passwordError = "";
$phoneError = "";
$companyError = "";

$firstname = "";
$lastname = "";
$email = "";
$password = "";
$usertype = "";
$phone = "";
$comapny = "";

if(isset($_POST['add'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $comapny = $_POST['company'];
    $usertype = $_POST['usertype'];
    $db = Database::getDb();

    if($firstname == "" || $lastname == "" || $email == "" || $password == "" || $phone =="" || $comapny =="") {
        if($firstname == "") {
            $firstNameError = "Please fill the First Name field.";
        }

        if($lastname == "") {
            $lastNameError = "Please fill the Last Name field.";
        }

        if($email == "") {
            $emailError = "Please fill the Email field.";
        }

        if($password == "") {
            $passwordError = "Please fill the Password field.";
        }

        if($phone == "") {
            $emailError = "Please fill the Phone field.";
        }

        if($comapny == "") {
            $passwordError = "Please fill the Comapany field.";
        }
    }else {

        $sql = "INSERT INTO user_details (user_firstname, user_lastname, password, email, phone, companyname) 
                  VALUES (:first_name, :last_name, :password, :email, :phone, :companyname) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':first_name', $firstname);
        $pst->bindParam(':last_name', $lastname);
        $pst->bindParam(':password', $password);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':companyname', $comapny);
        $count = $pst->execute();
        if ($count) {
            echo "Employer details added sucessfully";
        } else {
            echo "Problem adding a Employer details";
        }


        $sqlLogin = "INSERT INTO login (useraccid, username, password, usertype_id) 
                  VALUES (LAST_INSERT_ID(), :email, :password, :usertype) ";
        $pstm = $db->prepare($sqlLogin);
        $pstm->bindParam(':email', $email);
        $pstm->bindParam(':password', $password);
        $pstm->bindParam(':usertype', $usertype);
        $count1 = $pstm->execute();
        if ($count1) {
            echo "Employer details added sucessfully";
        } else {
            echo "Problem adding a Employer details";
        }
    }
    header("Location:EmployerLogin.php");
}



?>


<html>
<head>
    <title>JobStock Hire Talent</title>
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/employerLogin.css">
    <link rel="stylesheet" href="../css/EmployerForm.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
<div id="initial">
<p class='text-center'>Love your <span class='text-primary'>Hire</span></p>
</div>
<h3 class="txt">Build a world-class team faster than ever.</h3>
   <h3><span class="txt1">JobStock connects you directly with highly qualified tech, sales & finance candidates</span></h3>
<br />
<br />
<br />
<div id="btnn">
        <div class="text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Hire Top Talent
            </button>
        </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sign Up</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
           <!-- <div class="modal-header">
                <img src="../images/loginUser.png" alt="avatar" class="rounded-circle img-responsive">
            </div> -->

            <form action="" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group">
                      <!--  <span class="input-group-addon"><i class="fa fa-user"></i></span> -->
                        <input type="hidden" name="usertype" value="102">
                        <input type="text" class="form-control" name="firstname" value="<?php echo $firstname?>" placeholder="Firstname" required="required"><?php echo $firstNameError?>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $lastname?>" placeholder="Lastname" required="required"><?php echo $lastNameError?>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" value="<?php echo $password?>" placeholder="Password" required="required"><?php echo $passwordError?>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" value="<?php echo $email?>" placeholder="Email Address" required="required"><?php echo $emailError?>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone?>" placeholder="Phone Number" required="required"><?php echo $phoneError?>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" name="company" value="<?php echo $comapny?>" placeholder="Company Name" required="required"><?php echo $companyError?>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" name="add">Sign Up</button>
                </div>
            </div>
            </form>
            <div class="modal-footer">Already have an account?<a data-dismiss="modal" data-toggle="modal" href="#myModal1">Sign In</a></div>
        </div>
    </div>
</div>

<?php include "EmployerLoginProcess.php"?>
<div id="myModal1" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="EmployerLoginProcess.php" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group">
                        <!--  <span class="input-group-addon"><i class="fa fa-user"></i></span> -->
                        <?php echo $usernameError?>
                        <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                </div>
                <br />
                <br />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign">Sign In</button>
                </div>
                <p class="hint-text"><a href="#">Forgot Password?</a></p>
            </div>
            </form>
            <div class="modal-footer">Don't have an account?<a data-dismiss="modal" data-toggle="modal" href="#myModal">Create one</a></div>
        </div>
    </div>
</div>

<div id="footer"></div>
</body>
</html>
