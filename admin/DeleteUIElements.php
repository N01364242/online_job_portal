<?php
require_once 'Database.php';
require_once 'UIelementsProcess.php';
$s= new UIelementsProcess();
if($_POST['id']!=null || $_POST['uielement']!=null ) {

    $id = $_POST['id'];
    $uielement = $_POST['uielement'];
    $count = $s->deleteUIElements(Database::getDb(), $id,$uielement);
    ;
    if ($count != 0) {
        echo("Record updated successfully");
    } else {
        echo ("Some problem occured. Please try again!");
    }
}else{

    echo("Something went wrong... Please check after sometime");
}
?>

