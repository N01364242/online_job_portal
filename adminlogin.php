<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>

<body>

<div class="limiter">
    <div class="header">
        <img src="images/logo3.png" width="200" height="60">
    </div>
    <div class="container-login100" style="background-image: url('images/x.jpg');">

        <div class="wrap-login100">

            <form class="validate-form">
                <div class="adminlogo">
                    <img src="images/adminlogo.jpg" alt="LOGO">
                </div>


                <div class="inputs" data-validate = "Username is required">
                    <input class="input100" type="text" name="username" placeholder="Username"><br/>
                    <span class="focus"></span>
                    <span class="symbol">
							<i class="fa fa-user"></i>
						</span>
                </div>

                <div class="inputs" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password"><br/>
                    <span class="focus"></span>
                    <span class="symbol">
							<i class="fa fa-lock"></i>
						</span>
                </div>

                <div class="form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="forgot">
                    <a href="#" class="txt1">
                        Forgot Username / Password?
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>





<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
