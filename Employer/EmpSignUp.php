<?php


class EmpSignUp
{
    public function listEmpDetail($db, $firstname, $password){

        $sql = "SELECT * FROM employersignup where firstname='$firstname' and password='$password'";

        $pdostm = $db->prepare($sql);

        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $user= $pdostm->execute();
        return $user;
    }
}