<?php
require_once 'Database.php';
session_start();
$db = Database::getDb();
$username = $password = "";
$username_err = $password_err = "";


// Check if username is empty

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
}
// Check if password is empty
if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
} else{
    $password = trim($_POST["password"]);
}

// Validate credentials
if(empty($username_err) && empty($password_err)){
    // Prepare a select statement
    $sql = "SELECT useraccid, username, password FROM login WHERE username = :name and password=:password";

    $pst = $db->prepare($sql);
    $pst->bindParam(':name', $username);
    $pst->bindParam(':password', $password);
    $pst->execute();
    $data = $pst->fetch(PDO::FETCH_OBJ);
    if($data){

        // Store data in session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $data->useraccid;
        $_SESSION['username'] = $username;

        header("location: dashboard_admin.php");
    }else{
        // Display an error message if password is not valid
        $_SESSION['Error'] = "The username or password you entered was not valid!";
        header("location: adminlogin.php");
    }
}else{
    $_SESSION['Error'] = "You left one or more of the required fields!";
    header("location: adminlogin.php");
}

?>