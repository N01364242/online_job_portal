<?php

require_once 'Database.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
echo $message;
$db =Database::getDb();
if(isset($_POST['submit'])) {
    echo "connected";
    $name = $_POST['name'];
    $sql ="INSERT into contact_us (`query_id`, `query`,`name`,`email`,`status`,`answer`) VALUES (NULL, :query,:name,:email,'Incomplete',NULL)";
    $pdostm = $db->prepare($sql);
    echo $sql;
    $pdostm->bindValue(':query', $message, PDO::PARAM_STR);
    $pdostm->bindValue(':name', $name, PDO::PARAM_STR);
    $pdostm->bindValue(':email', $email, PDO::PARAM_STR);
    $count  = $pdostm->execute();
    if($count){
    echo "<script type='text/javascript'>alert('PLease be patient. We will get back to you shortly!');window.location.href = 'contact.php';</script>";

    }
}
?>

