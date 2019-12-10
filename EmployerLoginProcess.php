<?php
require_once 'Database.php';

$db = Database::getDb();

$username = "";
$password = "";

$usernameError = "";
$passwordError = "";

if ( isset($_POST['sign'] ) ) {

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

        $sql = "SELECT * FROM login WHERE username = :username and password = :password";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':username', $username, PDO::PARAM_STR);
        $pdostm->bindValue(':password', $password, PDO::PARAM_STR);
        $pdostm->execute();
        $user = $pdostm->fetch(PDO::FETCH_OBJ);

        if ($user) {
            $_SESSION['user'] = $_POST['username'];
            //$_SESSION['userpass'] = $_POST['password'];

            header("Location: EmployerProfile.php");

        } else {
            echo "<script>
                alert('Invalid username or password');
                window.location.href='EmployerLogin.php';
                </script>";

//            header("Location: login.php");

        }

    }
}
?>
