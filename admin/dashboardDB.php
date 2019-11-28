<?php
require_once 'Database.php';

if(isset($_POST['List'])) {
    $db = Database::getDb();
    $sql = 'SELECT * from user_details';
    $pst = $db->prepare($sql);
    $pst->execute();
    $data = $pst->fetchAll(PDO::FETCH_OBJ);
}