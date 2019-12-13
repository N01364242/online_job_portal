<?php
require_once 'Database.php';
require_once 'BusinessStream.php';
//require_once 'CompanyDetail.php';

session_start();
$ename=$_SESSION['user'];
//$epass=$_SESSION['userpass'];
$db = Database::getDb();

$s = new BusinessStream();
$bsns = $s->listBusiness(Database::getDb());



$sql = "Select * from user_details inner join login on useraccid = user_id where login.username = '$ename'";
$pst = $db->prepare($sql);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);

foreach ($data as $s){
    $empid = $s->user_id;
    $efname = $s->user_firstname;
    $elname = $s->user_lastname;
    $epswd = $s->password;
    $eeml =  $s->email;
    $ephn = $s->phone;
}

if ( isset($_POST['update'] ) ) {
    $ufirstname = $_POST['fn'];
    $ulastname = $_POST['ln'];
    $uphone = $_POST['pn'];

    $query = "UPDATE user_details inner join login on useraccid = user_id SET user_firstname='$ufirstname', user_lastname='$ulastname', 
              phone='$uphone' WHERE login.username = '$ename'";
    $statment = $db->prepare($query);
    $upcount = $statment->execute();
    if($upcount){
        $efname = $ufirstname;
        $elname = $ulastname;
        $ephn = $uphone;
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
    <link rel="stylesheet" href="css/EmployerProfile.css">
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
<h1 id="hding">Edit Profile </h1>
<div class="detail">
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">FirstName</label>
                <?php
                foreach ($data as $employer) {
                ?>
                <input type="text" class="form-control" id="inputEmail4" name="fn" value="<?php  echo $efname?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">LastName</label>
                <input type="text" class="form-control" id="inputPassword4" name="ln" value="<?php echo $elname?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Password</label>
            <input type="text" class="form-control" id="inputAddress" name="psn" value="<?php echo $epswd?>">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Email Address</label>
            <input type="text" class="form-control" id="inputAddress2" name="en" value="<?php echo $eeml?>">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Phone</label>
                <input type="text" class="form-control" id="inputCity" name="pn" value="<?php echo $ephn?>">
                <?php } ?>
            </div>
        </div>
        <br />
        <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
    </form>
</div>

<button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" id="cmp">Add Company Detail</button>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title">Add Company</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="CompanyDetail.php" method="post">
                    <div class="form-group">
                        <label for="first_name"><h4>Company Name</h4></label>
                        <input type="text" class="form-control" name="cname" id="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name"><h4>Company Description</h4></label>
                        <textarea class="form-control" name="desc" id="last_name"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputlg"><h4>Business Stream</h4></label>
                        <select id="inputState" class="form-control" name="business">
                            <?php foreach ($bsns as $p){?>
                            <option value="<?php echo $p->id;?>"> <?php echo $p->business_stream_name;}?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mobile"><h4>Establishment Date</h4></label>
                        <input type="text" class="form-control" name="estdate" id="mobile">
                    </div>
                    <div class="form-group">
                        <label for="email"><h4>Company URL</h4></label>
                        <input type="text" class="form-control" name="curl" id="email">
                    </div>
                    <button class="btn btn-lg btn-success" type="submit" name="save">Save</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<div id="footer"></div>
</body>
</html>
