<?php
require_once 'Database.php';
session_start();
$email=$_SESSION['user'];

$db = Database::getDb();

$sql1 = "Select * from user_details inner join login on useraccid = user_id where login.username = '$email'";
$pstd = $db->prepare($sql1);
$pstd->execute();
$data = $pstd->fetchAll(PDO::FETCH_OBJ);
foreach ($data as $r){
    $empid = $r->user_id;
}
        $sql5 = "SELECT * FROM job_post where postedby_id = '$empid'";
        $pdostm5 = $db->prepare($sql5);
        $pdostm5->setFetchMode(PDO::FETCH_OBJ);
        $pdostm5->execute();
        $joblist = $pdostm5->fetchAll(PDO::FETCH_OBJ);

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
<h2 id="postjob">Your Jobs</h2><br />

<div id="center_column" class="clearfix equal_height">
    <div id="listings_module">
        <table class="table table-hover" style="width:60%; margin: auto;">
            <thead>
            <tr>
                <th class="listings_title">Job Title</th>
                <th>Job Description</th>
                <th id="space">Status</th>
                <th></th>
                <th>Actions</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($joblist as $lj){?>
            <tr>
                <td><?php echo $lj->job_title; ?></td>
                <td><?php echo  $lj->job_desc; ?></td>
                <td><?php echo  $lj->is_active; ?></td>

                <td><form action="ViewJobApplication.php" method="post">
                        <input type="hidden" name="id"
                               value="<?php echo $lj->job_id; ?>">
                        <button type="submit" class="btn btn-primary" name="viewemp">
                            <i class="fa fa-eye"></i></button></form>
                </td>
                <td>
                    <form action="EditJob.php" method="post">
                        <input type="hidden" name="id"
                               value="<?php echo $lj->job_id; ?>">
                        <button type="submit" class="btn btn-success" name="edit">
                            <i class="fa fa-edit"></i></button></form>
                </td>
                <td>
                    <form action="DeleteJob.php" method="post">
                        <input type="hidden" name="id"
                               value="<?php echo $lj->job_id; ?>">
                        <button type="submit" class="btn btn-success" name="disable">
                            <i class="fa fa-times"></i></button></form>
                </td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>


<div id="footer"></div>
</body>
</html>
