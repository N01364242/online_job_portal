<?php
include_once "Database.php";
$employerId = $_GET['employerId'];
$db = Database::getDb();
$sql = "Select * from user_details inner join login on useraccid= user_id  inner join company on user_id = employerId 
inner join business_stream on id = business_stream_id where usertype_id=101 and user_id= :id";
$pst = $db->prepare($sql);
$pst->bindParam(':id', $employerId);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);
echo json_encode($data);
?>
