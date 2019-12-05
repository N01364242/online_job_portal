<?php
require_once 'Database.php';
require_once 'UIelementsProcess.php';
$s= new UIelementsProcess();

$id = $_POST['id'];
$name = $_POST['name'];
echo $id;
$count = $s->updateBusinessStreams(Database::getDb(),$name,$id);
echo $count;
?>
