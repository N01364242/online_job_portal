<?php
include_once "Database.php";
$queryId = $_POST['queryId'];
$db = Database::getDb();
$sql = "Select * from contact_us where query_id=:queryId";
$pdostm = $db->prepare($sql);
$pdostm->bindValue(':queryId', $queryId, PDO::PARAM_INT);
$pdostm->execute();
$data = $pdostm->fetchAll(PDO::FETCH_OBJ);
echo json_encode($data);
?>