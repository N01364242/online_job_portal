<?php
require_once 'Database.php';
require_once 'JobSeekerProfile.php';

$db = Database::getDb();
$j = new JobSeekerProfile();

$username = "";
$password = "";

$usernameError = "";
$passwordError = "";

if ( isset($_POST['submit'] ) ) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == ""){
        $usernameError = "Please enter Username.";
    }

    if($password == ""){
        $passwordError = "Please enter Password.";
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        session_start();

        /*$sql = "SELECT * FROM login WHERE username = :username and password = :password";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':username', $username, PDO::PARAM_STR);
        $pdostm->bindValue(':password', $password, PDO::PARAM_STR);
        $pdostm->execute();
        $user = $pdostm->fetch(PDO::FETCH_OBJ);*/
        $user = $j->loginCredintials($db, $username, $password);

        /*$user_id = $user->useraccid;

        $sql = "SELECT * FROM user_details WHERE user_id = :user_id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $pdostm->execute();
        $userdetails = $pdostm->fetch(PDO::FETCH_OBJ);*/


        if ($user) {
            $_SESSION['user'] = $_POST['username'];
            $_SESSION['user_id'] = $user->useraccid;

            header("Location: home.php");

        } else {
            echo "<script>
                alert('Invalid username or password');
                window.location.href='login.php';
                </script>";

//            header("Location: login.php");

        }

    }
}
?>