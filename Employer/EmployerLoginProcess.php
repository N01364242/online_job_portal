<?php


class EmployerLoginProcess
{
    public function loginEmp($db, $username, $password){
        $sql = "SELECT * FROM empoyerlogin where username='$username' and password='$password'";

        $pdostm = $db->prepare($sql);

        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $user= $pdostm->execute();
        return $user;
    }
}