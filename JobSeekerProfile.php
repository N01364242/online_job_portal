<?php


class JobSeekerProfile
{

    public function loginCredintials($db, $username, $password){
        $sql = "SELECT * FROM login WHERE username = :username and password = :password";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':username', $username, PDO::PARAM_STR);
        $pdostm->bindValue(':password', $password, PDO::PARAM_STR);
        $pdostm->execute();
        $user = $pdostm->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    public function jobseekerDetailsById($db, $user_id){
        $sql = "SELECT * FROM user_details join login on user_details.user_id=login.useraccid WHERE user_id = :user_id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $pdostm->execute();
        $user = $pdostm->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    public function updateJobseekerDetails($db, $user_id, $firstname, $lastname, $phone, $email, $address){
        $sql = "UPDATE user_details 
                        SET user_firstname = :firstname,
                        user_lastname = :lastname ,
                        phone =:phone,
                        email = :email,
                        address = :address
                        /*user_image = :user_image,*/
                        WHERE user_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':firstname', $firstname);
        $pst->bindParam(':lastname', $lastname);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':address', $address);
        /*$pst->bindParam(':user_image', $data);*/
        $pst->bindParam(':id', $user_id);
        $count = $pst->execute();
        return $count;
    }


    public function updateLogin($db, $user_id, $username, $password){
        $sql = "UPDATE login 
                        SET username = :username,
                        password = :password 
                        WHERE useraccid = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':username', $username);
        $pst->bindParam(':password', $password);
        $pst->bindParam(':id', $user_id);
        $count = $pst->execute();
        return $count;
    }


    public function RegistrationDetails($db, $firstname, $lastname, $email){
        $sql = "INSERT INTO user_details (user_firstname, user_lastname, email) 
                  VALUES (:first_name, :last_name, :email) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':first_name', $firstname);
        $pst->bindParam(':last_name', $lastname);
        $pst->bindParam(':email', $email);
        $count = $pst->execute();
        return $count;
    }

    public function InsertLoginDetails($db, $email, $password, $usertype){
        $sql = "INSERT INTO login (useraccid, username, password, usertype_id) 
                  VALUES (LAST_INSERT_ID(), :email, :password, :usertype) ";
        $pstm = $db->prepare($sql);
        $pstm->bindParam(':email', $email);
        $pstm->bindParam(':password', $password);
        $pstm->bindParam(':usertype', $usertype);
        $count = $pstm->execute();
        return $count;
    }



}