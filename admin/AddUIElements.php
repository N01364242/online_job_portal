<?php
require_once 'Database.php';
require_once 'UIelementsProcess.php';
$s= new UIelementsProcess();
if($_POST['name']!=null || $_POST['ui_element']!=null){
$name = $_POST['name'];
$ui= $_POST['uielement'];
$count = $s->addUIElements(Database::getDb(), $name,$ui);
if($count!=0){
    echo ("Record added successfully");
}else{
    echo("Some problem occured. Please try again!");
}
}else{
    echo("Please input Name");
}


?>