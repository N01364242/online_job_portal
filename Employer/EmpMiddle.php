<?php
require_once 'Database.php';
require_once 'EmpSignUp.php';

$db= Database::getDb();
$s= new EmpSignUp();

if ( ! empty( $_POST ) ) {
    if (isset($_POST['firstname']) && isset($_POST['password'])) {
        session_start();
        $username = $_POST['firstname'];
        $password = $_POST['password'];
        $user = $s->listEmpDetail(Database::getDb(), $username, $password);


        if ($user) {
            $_SESSION['fname'] = $_POST['firstname'];
            $_SESSION['lname'] = $_POST['lastname'];
            $_SESSION['pass'] = $_POST['password'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['cname'] = $_POST['companyname'];

            header("Location: EmployerProfile.php");

        } else {
            header("Location: EmployerLogin.php");
            alert('Incorrect username or password');
        }

    }
}
?>