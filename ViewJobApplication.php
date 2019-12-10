<?php
require_once 'Database.php';

$db = Database::getDb();

if(isset($_POST['viewemp'])) {
    $id = $_POST['id'];
}
/*$sql11 = "SELECT * FROM job_post where job_id = '$id'";
$pdostm11 = $db->prepare($sql11);
$pdostm11->bindValue(':job_id', $id, PDO::PARAM_INT);
$pdostm11->execute();
$jl = $pdostm11->fetchAll(PDO::FETCH_OBJ);*/

$sql12 = "SELECT * FROM job_application_request inner join user_details on employee_id = user_id where job_id = '$id'";
$pdostm12 = $db->prepare($sql12);
$pdostm12->setFetchMode(PDO::FETCH_OBJ);
$pdostm12->execute();
$candidatelist = $pdostm12->fetchAll(PDO::FETCH_OBJ);

?>

<html>
<head>
    <title>JobStock Hire Talent</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/employerLogin.css">
    <link rel="stylesheet" href="css/EmployerForm.css">
    <link rel="stylesheet" href="css/EmployerPage.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(function(){
           $("#header").load("header2.php");
        });
        $(function(){
            $("#footer").load("footer.php");
        });
    </script>
</head>
<body>
<div id="header"></div>
<h2 id="postjob">Job Applications</h2><br />


<div id="center_column" class="clearfix equal_height">
    <div id="listings_module">
        <table class="table table-hover" style="width:60%; margin: auto;">
            <thead>
            <tr>
                <th>Employee Name</th>
                <th>Employee Email</th>
                <th>Apply Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($candidatelist as $cl){?>
                <tr>
                    <td><?php echo $cl->user_firstname; ?></td>
                    <td><?php echo $cl->email; ?></td>
                    <td><?php echo  $cl->apply_date; ?></td>

                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>

<div id="footer"></div>
</body>
</html>
