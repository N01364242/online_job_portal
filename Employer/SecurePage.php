<?php
require_once 'Database.php';
require_once 'EmployerLoginProcess.php';

$db= Database::getDb();
$s= new EmployerLoginProcess();

if ( ! empty( $_POST ) ) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $s->loginEmp(Database::getDb(), $username, $password);


        if ($user) {
            $_SESSION['user'] = $_POST['username'];

            header("Location: EmployerPage.php");

        } else {
            header("Location: EmployerLogin.php");
            alert('Incorrect username or password');
        }

    }
}
?>