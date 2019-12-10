<?php
include_once "Database.php";
$seekerId = $_GET['seekerId'];
$db = Database::getDb();
$sql = "Select * from user_details inner join login on useraccid= user_id  left outer join education on user_id = seeker_id where usertype_id=102 
and user_id= :id";
$pst = $db->prepare($sql);
$pst->bindParam(':id', $seekerId);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);
echo json_encode($data);
?>