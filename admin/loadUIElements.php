<?php
include_once "Database.php";
$uiElements = $_POST['ui_id'];
$db = Database::getDb();
$sql = "Select * from business_stream";
$pst = $db->prepare($sql);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);
echo json_encode($data);
?>
