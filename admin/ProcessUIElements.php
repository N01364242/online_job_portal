<?php
require_once 'Database.php';
require_once 'UIelementsProcess.php';
$s= new UIelementsProcess();

    $id = $_POST['id'];
    echo $id;
    $count = $s->deleteBusinessStreams(Database::getDb(), $id);
echo $count;
?>

