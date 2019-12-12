<?php
require_once 'Database.php';
$db = Database::getDb();

if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sql7 = "SELECT * FROM job_post where job_id = '$id'";
    $pdostm7 = $db->prepare($sql7);
    $pdostm7->bindValue(':job_id', $id, PDO::PARAM_INT);
    $pdostm7->execute();
    $jl = $pdostm7->fetchAll(PDO::FETCH_OBJ);
}

if(isset($_POST['upt'])){
    $id = $_POST['sid'];
    $jttl = $_POST['jtitle'];
    $jds = $_POST['jdesc'];
    $jsl = $_POST['jsalary'];
    $jexp = $_POST['jexp'];
    $jrole = $_POST['jroles'];

    $query8 = "UPDATE job_post SET job_title='$jttl', job_desc='$jds' , salary='$jsl' , job_roles='$jrole' , experience='$jexp'
                 WHERE job_id = '$id'";
    $statment8 = $db->prepare($query8);
    $upcount1 = $statment8->execute();
    if($upcount1){
        header("Location: EmployerJobs.php");
    }
    else{
        echo "error";
    }
}

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

<h1 id="updation">Update Job Detail Here</h1>
<br />
<div class="space">
<form action="EditJob.php" method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
    <?php foreach ($jl as $jjl){?>
    <input type="hidden" name="sid" value="<?php echo $jjl->job_id; ?>" />
    Job Title:
        <div class="md-form">
            <input type="text" id="form101" class="form-control"  name="jtitle"  value="<?php echo $jjl->job_title; ?>"/>
            <br />
        </div>
    Job Description:
            <div class="md-form">
            <textarea id="form101" class="form-control" name="jdesc"><?php echo $jjl->job_desc; ?></textarea>
        <br />
        </div>
        Salary:
        <div class="md-form">
            <input type="text" id="form101" class="form-control" name="jsalary" value="<?php echo $jjl->salary; ?>" />
            <br />
        </div>
        Required Experience:
        <div class="md-form">
            <input type="text" id="form101" class="form-control" name="jexp" value="<?php echo $jjl->experience; ?>" />
            <br />
        </div>
        Job Roles and Responsibilities:
        <div class="md-form">
            <textarea id="form101" class="form-control" name="jroles"><?php echo $jjl->job_roles; ?></textarea>
            <br />
        </div>
    <?php }?>
    <input type="submit" name="upt" value="Save Changes">
        </div>
    </div>
</form>
</div>
<div id="footer"></div>
</body>
</html>