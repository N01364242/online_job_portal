<?php
require_once 'Database.php';

$db = Database::getDb();

if(isset($_POST['disable'])) {
    $id = $_POST['id'];
    $n = 'n';

        $sql10 = "Update job_post SET is_active = '$n' WHERE job_id = $id";
        $pst10 = $db->prepare($sql10);
        $count3 = $pst10->execute();

        header("Location: EmployerJobs.php");
    } else {
        echo "Problem Disabling";

}



