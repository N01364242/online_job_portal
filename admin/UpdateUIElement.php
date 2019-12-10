<?php
require_once 'Database.php';
require_once 'UIelementsProcess.php';
$s= new UIelementsProcess();
if($_POST['id']!=null || $_POST['name']!=null || $_POST['uielement']!=null ) {
    $id = $_POST['id'];
    $ui = $_POST['uielement'];
    $name = $_POST['name'];
    $count = $s->updateUIElements(Database::getDb(), $name, $id, $ui);
    if ($count != 0) {
        echo("Record updated successfully");
    } else {
        echo("Some problem occured. Please try again!");
    }
}else{
    echo("Please input name . It can't be blank!");
}
?>
