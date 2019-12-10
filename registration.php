<?php

require_once 'Database.php';
require_once  'JobSeekerProfile.php';

$db = Database::getDb();
$j = new JobSeekerProfile();

$firstNameError = "";
$lastNameError = "";
$emailError = "";
$passwordError = "";

$firstname = "";
$lastname = "";
$email = "";
$password = "";
$usertype = "";

if(isset($_POST['registration'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    if($firstname == "" || $lastname == "" || $email == "" || $password == "") {
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
    }else {

        /*$sql = "INSERT INTO user_details (user_firstname, user_lastname, email)
                  VALUES (:first_name, :last_name, :email) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':first_name', $firstname);
        $pst->bindParam(':last_name', $lastname);
        $pst->bindParam(':email', $email);
        $count = $pst->execute();*/

        $count = $j->RegistrationDetails($db, $firstname, $lastname, $email);

        if ($count) {
            echo "Student details added sucessfully";
        } else {
            echo "Problem adding a student details";
        }


        /*$sqlLogin = "INSERT INTO login (useraccid, username, password, usertype_id)
                  VALUES (LAST_INSERT_ID(), :email, :password, :usertype) ";
        $pstm = $db->prepare($sqlLogin);
        $pstm->bindParam(':email', $email);
        $pstm->bindParam(':password', $password);
        $pstm->bindParam(':usertype', $usertype);
        $count1 = $pstm->execute();*/

        $count1 = $j->InsertLoginDetails($db, $email, $password, $usertype);

        if ($count1) {
            echo "Student details added sucessfully";
        } else {
            echo "Problem adding a student details";
        }


        /*$select = "SELECT useraccid FROM user_details ORDER BY id DESC LIMIT 1;";
        $pstm = $db->prepare($select);
        $pstm->setFetchMode(PDO::FETCH_OBJ);
        $print = $pstm->execute();*/

    }
    header("Location:home.php");
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Registration</title>
    <script>
        $(function(){
            $("#footer").load("footer.php");
        });
        $(function(){
            $("#header").load("header.php");
        });
    </script>
</head>
<body>
<div id="header"></div>
<div class="container">
    <div class="row justify-content-center">

        <!-- Default form register -->
        <form class="text-center border border-light p-5" method="post">

            <p class="h4 mb-4">Sign up</p>

            <input type="hidden" name="usertype" value="102">
            <!-- First name -->
            <span><font color='red'><?php echo $firstNameError?></font></span>
            <input type="text" id="firstname" name="firstname" value="<?php echo $firstname?>" class="form-control mb-4" placeholder="First name">


            <!-- Last name -->
            <span><font color='red'><?php echo $lastNameError?></font></span>
            <input type="text" id="lastname" name="lastname" value="<?php echo $lastname?>" class="form-control mb-4" placeholder="Last name">


            <!-- E-mail -->
            <span><font color='red'><?php echo $emailError?></font></span>
            <input type="email" id="email" name="email" value="<?php echo $email?>" class="form-control mb-4" placeholder="E-mail">


            <!-- Password -->
            <span><font color='red'><?php echo $passwordError?></font></span>
            <input type="password" id="password" name="password" value="<?php echo $password?>" class="form-control mb-4" placeholder="Password" aria-describedby="PasswordHelpBlock">

            <!--<small id="PasswordHelpBlock" class="form-text text-muted mb-4">
                At least 8 characters and 1 digit
            </small>-->

            <!-- Terms and condition -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="termsAndCondition">
                <label class="custom-control-label" for="termsAndCondition">I accept the Terms of Use & Privacy Policy</label>
            </div>

            <!-- Sign up button -->
            <input class="btn btn-info my-4 btn-block" type="submit" name="registration" value="Sign Up">

            <!-- Terms of service -->
            <p>Already have an account?
                <a href="login.php">Sign In</a>

        </form>
        <!-- Default form register -->
    </div>
</div>
<div id="footer"></div>
</body>


</html>