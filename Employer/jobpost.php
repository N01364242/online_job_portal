<html>
<head>
    <title>JobStock Hire Talent</title>
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/employerLogin.css">
    <link rel="stylesheet" href="../css/EmployerForm.css">
    <link rel="stylesheet" href="../css/EmployerPage.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/jobpost.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

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
<div id="lst">
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Post Job</h3>
            <p>Hire Your Candidate Here!</p>
        </div>
        <div class="col-md-9 register-right">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Post Job Here</h3>
                    <div class="row register-form">

                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Job Title *" value="" />
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Job Type *" value="" />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Job Description *" value="" />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control"  placeholder="Salary *" value="" />
                            </div>

                            <div class="form-group col-md-4">
                                <input type="email" class="form-control" placeholder="Job Location *" value="" />

                            <input type="submit" class="btnRegister"  value="Post"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>	<script type="text/javascript">
</script>
<div id="footer"></div>
</body>
</html>
