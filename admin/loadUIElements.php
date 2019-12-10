<?php
include_once "Database.php";
$uiElements = $_POST['ui_id'];
$db = Database::getDb();
if($uiElements == 'Business Stream'){
$sql = "Select * from business_stream";
}else if($uiElements == 'SkillSet'){
    $sql = "Select * from skill_set";
}else if($uiElements == 'SkillLevel'){
    $sql = "Select * from skill_level";
}
$pst = $db->prepare($sql);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);
echo json_encode($data);
?>
