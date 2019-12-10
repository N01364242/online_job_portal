<?php
include_once 'Database.php';
include_once 'JobSeekerProfile.php';

$db = Database::getDb();

$j = new JobSeekerProfile();

session_start();
$user_id = $_SESSION['user_id'];


$user = $j->jobseekerDetailsById($db, $user_id);
/*
$sql = "SELECT * FROM user_details join login on user_details.user_id=login.useraccid WHERE user_id = :user_id";
$pdostm = $db->prepare($sql);
$pdostm->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$pdostm->execute();
$user = $pdostm->fetch(PDO::FETCH_OBJ);*/


if($user){
    $user_fname = $user->user_firstname;
    $user_lname = $user->user_lastname;
    $user_phone = $user->phone;
    $user_email = $user->email;
    $user_password = $user->password;
    $user_address = $user->address;
}



$firstNameError = "";
$lastNameError = "";
$emailError = "";
$passwordError = "";

$firstname = "";
$lastname = "";
$phone = "";
$email = "";
$address = "";
$password = "";

if(isset($_POST['personal_details'])){

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];


            if($firstname == "" || $lastname == "" || $phone == "" || $email == "" || $address == "" || $password == "") {
                if($firstname == "") {
                    $firstNameError = "Please fill the First Name field.";
                }

                if($lastname == "") {
                    $lastNameError = "Please fill the Last Name field.";
                }

                if($email == "") {
                    $emailError = "Please fill the Email field.";
                }

                if($password == "") {
                    $passwordError = "Please fill the Password field.";
                }
            }else {

                /*$sql = "UPDATE user_details
                        SET user_firstname = :firstname,
                        user_lastname = :lastname ,
                        phone =:phone,
                        email = :email,
                        address = :address
                        /*user_image = :user_image,*/
                       /* WHERE user_id = :id";
                $pst = $db->prepare($sql);
                $pst->bindParam(':firstname', $firstname);
                $pst->bindParam(':lastname', $lastname);
                $pst->bindParam(':phone', $phone);
                $pst->bindParam(':email', $email);
                $pst->bindParam(':address', $address);
                /*$pst->bindParam(':user_image', $data);*/
                /*$pst->bindParam(':id', $user_id);
                $count = $pst->execute();*/

                $count = $j->updateJobseekerDetails($db, $user_id, $firstname, $lastname, $phone, $email, $address);
                $count1 = $j->updateLogin($db, $user_id, $email, $password);

                if ($count && $count1) {
                    $user_fname = $firstname;
                    $user_lname = $lastname;
                    $user_phone = $phone;
                    $user_email = $email;
                    $user_password = $password;
                    $user_address = $address;

                    echo "Student details added sucessfully";
                } else {
                    echo "Problem adding a student details";
                }
            }
}


?>

<html>
<head>
    <title>JobStock</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script>
        $(function () {
            $("#header").load("jobSeekerHeader.php");
        });
        $(function () {
            $("#footer").load("footer.php");
        });
    </script>
</head>
<body>
<div id="header"></div>


<div class="container">

    <div class="row justify-content-center p-5 m-5">
        <div class="col-sm-12 p-3"><h1>User name</h1></div>
        <!--<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>-->
        <div class="col-sm-3"><!--left col-->


            <div class="text-center">
                <div>
                    <img src="" class="avatar img-circle img-fluid"
                         alt="avatar" width="200px" height="200px" style="object-fit: cover">
                </div>

                <h6>Upload a different photo...</h6>
                <input type="file" name="image" id="image" class="text-center center-block file-upload">
            </div>
            <br>


           <!-- <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="#">abc.com</a></div>
            </div>


            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i
                            class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                            class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>-->

        </div><!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#personal">Personal Details</a></li>
                <li><a data-toggle="tab" href="#education">Education</a></li>
                <li><a data-toggle="tab" href="#experience">Experience</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="personal">

                    <form class="form" action="" method="post" id="personalDetailsForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>First name</h4></label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                       placeholder="first name" title="enter your first name if any." value="<?php echo $user_fname;?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Last name</h4></label>
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                       placeholder="last name" title="enter your last name if any." value="<?php echo $user_lname;?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       placeholder="enter phone" title="enter your phone number if any." value="<?php echo $user_phone;?>">
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile"><h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="mobile" id="mobile"
                                       placeholder="enter mobile number" title="enter your mobile number if any.">
                            </div>
                        </div>-->
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="you@email.com" title="enter your email." value="<?php echo $user_email;?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="address"><h4>Address</h4></label>
                                <input type="text" class="form-control"  name="address" id="location" placeholder="somewhere"
                                       title="enter a location" value="<?php echo $user_address;?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password"><h4>Password</h4></label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="password" title="enter your password." value="<?php echo $user_password;?>">
                            </div>
                        </div>
                       <!-- <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2"><h4>Verify</h4></label>
                                <input type="password" class="form-control" name="password2" id="password2"
                                       placeholder="password2" title="enter your password2.">
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" name="personal_details" type="submit"><i
                                            class="glyphicon glyphicon-ok-sign"></i> Save
                                </button>
                                <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset
                                </button>-->
                            </div>
                        </div>
                    </form>

                    <hr>

                </div><!--/tab-pane-->

                <div class="tab-pane" id="education">

                    <h2></h2>

                    <form class="form" action="" method="post" id="educationForm">
                        <div id="field">
                            <div id="field0">
                                <div class="form-group">

                                    <div class="col-xs-12">
                                        <label for="university"><h4>University/College Name</h4></label>
                                        <input type="text" class="form-control" name="university" id="university"
                                               placeholder="university" title="enter your first name if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="degree"><h4>Degree</h4></label>
                                        <input type="text" class="form-control" name="degree" id="degree"
                                               placeholder="degree" title="enter your first name if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="start_year"><h4>Start Year</h4></label>
                                        <input type="text" class="form-control" name="start_year" id="start_year"
                                               placeholder="start_year" title="enter your first name if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="end_year"><h4>End Year</h4></label>
                                        <input type="text" class="form-control" name="end_year" id="end_year"
                                               placeholder="end_year" title="enter your first name if any.">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 p-3">
                                <button id="add-more" name="add-more" class="btn btn-primary">Add More</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i
                                            class="glyphicon glyphicon-ok-sign"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>

                </div><!--/tab-pane-->

                <div class="tab-pane" id="experience">

                    <form class="form" action="" method="post" id="experienceForm">
                        <div id="exp">
                            <div id="exp0">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="job_title"><h4>Title</h4></label>
                                        <input type="text" class="form-control" name="job_title" id="job_title"
                                               placeholder="job_title" title="enter your first name if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="company"><h4>Company</h4></label>
                                        <input type="text" class="form-control" name="company" id="company"
                                               placeholder="company" title="enter your first name if any.">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="job_start_date"><h4>Start Date</h4></label>
                                        <input type="text" class="form-control" name="job_start_date" id="job_start_date"
                                               placeholder="job_start_date" title="enter your first name if any.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="job_end_date"><h4>End Date</h4></label>
                                        <input type="text" class="form-control" name="job_end_date" id="job_end_date"
                                               placeholder="job_end_date" title="enter your first name if any.">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 p-3">
                                <button id="add-more-exp" name="add-more-exp" class="btn btn-primary">Add More</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i
                                            class="glyphicon glyphicon-ok-sign"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!--/tab-pane-->
        </div><!--/tab-content-->

    </div><!--/col-9-->
</div><!--/row-->

<div id="footer"></div>


<script>
    $(document).ready(function () {


        var readURL = function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function () {
            readURL(this);
        });
    });
</script>


<script>
    $(document).ready(function () {
        //@naresh action dynamic childs
        var next = 0;
        $("#add-more-exp").click(function(e){
            e.preventDefault();
            var addto = "#exp" + next;
            var addRemove = "#exp" + (next);
            next = next + 1;
            var newIn =   '<div id="exp'+ next +'" name="exp'+ next +'">'+
                                '<div class="form-group">'+
                                    '<div class="col-xs-12">'+
                                        '<label for="job_title"><h4>Title</h4></label>'+
                                            '<input type="text" class="form-control" name="job_title" id="job_title"'+
                                            'placeholder="job_title" title="enter your first name if any.">'+
                                    '</div>'+
                                '</div>'+

                                '<div class="form-group">'+
                                    '<div class="col-xs-12">'+
                                        '<label for="company"><h4>Company</h4></label>'+
                                            '<input type="text" class="form-control" name="company" id="company"'+
                                            'placeholder="company" title="enter your first name if any.">'+
                                    '</div>'+
                                '</div>'+


                                '<div class="form-group">'+
                                    '<div class="col-xs-6">'+
                                        '<label for="job_start_date"><h4>Start Date</h4></label>'+
                                            '<input type="text" class="form-control" name="job_start_date" id="job_start_date"'+
                                            'placeholder="job_start_date" title="enter your first name if any.">'+
                                    '</div>'+
                                '</div>'+

                                '<div class="form-group">'+
                                    '<div class="col-xs-6">'+
                                        '<label for="job_end_date"><h4>End Date</h4></label>'+
                                            '<input type="text" class="form-control" name="job_end_date" id="job_end_date"'+
                                            'placeholder="job_end_date" title="enter your first name if any.">'+
                                    '</div>'+
                                '</div>';


            var newInput = $(newIn);
            var removeBtn = '<div class="form-group">' +
                                '<div class="col-md-4 p-3">' +
                                    '<button id="remove_exp' + (next - 1) + '" class="btn btn-danger remove_exp" >Remove</button>' +
                                '</div>' +
                            '</div></div>'
                            '</div><div id="exp">';
            var removeButton = $(removeBtn);
            $(addto).after(newInput);
            $(addRemove).after(removeButton);
            $("#exp" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);

            $('.remove_exp').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#exp" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
        });

    });
</script>




<script>
    $(document).ready(function () {
        //@naresh action dynamic childs
        var next = 0;
        $("#add-more").click(function(e){
            e.preventDefault();
            var addto = "#field" + next;
            var addRemove = "#field" + (next);
            next = next + 1;
            var newIn =   '<div id="field'+ next +'" name="field'+ next +'">'+
                    '<div class="form-group">'+
                        '<div class="col-xs-12">'+
                            '<label for="university"><h4>University/College Name</h4></label>'+
                            '<input type="text" class="form-control" name="university" id="university" placeholder="university" title="enter your first name if any.">'+
                        '</div>'+
                    '</div>'+

                    '<div class="form-group">'+
                        '<div class="col-xs-12">'+
                            '<label for="degree"><h4>Degree</h4></label>'+
                            '<input type="text" class="form-control" name="degree" id="degree"'+
                            'placeholder="degree" title="enter your first name if any.">'+
                        '</div>'+
                    '</div>'+

                    '<div class="form-group">'+
                        '<div class="col-xs-6">'+
                            '<label for="start_year"><h4>Start Year</h4></label>'+
                                '<input type="text" class="form-control" name="start_year" id="start_year"'+
                                'placeholder="start_year" title="enter your first name if any.">'+
                        '</div>'+
                    '</div>'+

                    '<div class="form-group">'+
                        '<div class="col-xs-6">'+
                            '<label for="end_year"><h4>End Year</h4></label>'+
                                '<input type="text" class="form-control" name="end_year" id="end_year"'+
                                'placeholder="end_year" title="enter your first name if any.">'+
                        '</div>'+
                    '</div>';


            var newInput = $(newIn);
            var removeBtn = '<div class="form-group">' +
                                '<div class="col-md-4 p-3">' +
                                    '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '</div><div id="field">';
            var removeButton = $(removeBtn);
            $(addto).after(newInput);
            $(addRemove).after(removeButton);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);

            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
        });

    });
</script>



</body>
</html>