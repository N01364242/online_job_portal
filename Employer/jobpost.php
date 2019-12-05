<?php
require_once 'JobType.php';

session_start();
$email=$_SESSION['user'];

require_once 'Database.php';
$db = Database::getDb();

$s = new JobType();
$jtype = $s->listjobtype(Database::getDb());

        $sql1 = "Select * from user_details inner join login on useraccid = user_id where login.username = '$email'";
        $pstd = $db->prepare($sql1);
        $pstd->execute();
        $data = $pstd->fetchAll(PDO::FETCH_OBJ);
        foreach ($data as $r){
            $empid = $r->user_id;
        }

$sql2 = "Select * from business_stream inner join company on id = business_stream_id where company.employerId = '$empid'";
$pst2 = $db->prepare($sql2);
$pst2->execute();
$data2 = $pst2->fetchAll(PDO::FETCH_OBJ);

foreach ($data2 as $b){
    $bsi = $b->business_stream_name;
}

$sql = "Select * from company inner join user_details on employerId = user_id where company.employerId = '$empid'";
$pst = $db->prepare($sql);
$pst->execute();
$data1 = $pst->fetchAll(PDO::FETCH_OBJ);

foreach($data1 as $d){
    $cn = $d->company_name;
    $dsp = $d->company_desc;
   // $bsi = $d->business_stream_id;
    $dt = $d->establishment_date;
    $ul = $d->company_url;
}


?>

<html>
<head>
    <title>JobStock Hire Talent</title>
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/employerLogin.css">
    <link rel="stylesheet" href="../css/EmployerForm.css">
    <link rel="stylesheet" href="../css/EmployerPage.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script>
        $(function(){
            $("#header").load("../header2.php");
        });
        $(function(){
            $("#footer").load("../footer.php");
        });
    </script>
</head>
<body>
<div id="header"></div>

<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1>Company Photo</h1></div>
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->


            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Upload Company photo...</h6>
                <input type="file" class="text-center center-block file-upload">
            </div></hr><br>


        </div><!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Company Detail</a></li>
                <li><a data-toggle="tab" href="#messages">Post Job</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>Company Name</h4></label>
                                <input type="text" class="form-control" name="cname" value="<?php echo $cn;?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Company Description</h4></label>
                                <input type="text" class="form-control" name="desc" value="<?php echo $dsp;?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="inputlg"><h4>Business Stream</h4></label>
                                <input type="text" class="form-control" name="desc" value="<?php echo $bsi;?>"">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile"><h4>Establishment date</h4></label>
                                <input type="text" class="form-control" name="estdate" value="<?php echo $dt;?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Company URL</h4></label>
                                <input type="email" class="form-control" name="curl" value="<?php echo $ul;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                        </div>
                    </form>

                    <hr>

                </div><!--/tab-pane-->
                <div class="tab-pane" id="messages">

                    <h2></h2>

                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>Job Title </h4></label>
                                <input type="text" class="form-control" name="title" id="first_name">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Job Description</h4></label>
                                <input type="text" class="form-control" name="jobdesc" id="last_name">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone"><h4>Job Location</h4></label>
                                <input type="text" class="form-control" name="loc" id="phone">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="phone"><h4>Job Type</h4></label>
                            <select id="inputState" class="form-control" name="business">
                                <?php foreach ($jtype as $p){?>
                                <option value="<?php echo $p->id;?>"> <?php echo $p->job_type;}?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function(){
            readURL(this);
        });
    });	</script>
<div id="footer"></div>
</body>
</html>
