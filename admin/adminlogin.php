<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>

<div class="limiter">
    <div class="header">
        <img src="../images/adminlogo.png" width="200" height="60">
    </div>
    <div class="container-login100" style="background-image: url('../images/background.jpg');">

        <div class="wrap-login100">

            <form class="validate-form" method="post" action="loginDB.php">
                <div class="adminlogo">
                    <img src="../images/adminlogo.jpg" alt="LOGO">
                </div>


                <div class="inputs" data-validate = "Username is required">
                    <input class="input100" type="text" name="username"><br/>


                </div>

                <div class="inputs" data-validate = "Password is required">
                    <input class="input100" type="password" name="password"  required><br/>
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
                <?php
                session_start();
                if(isset($_SESSION['Error']) )
                {?>
                    <div class="alert-light text-danger" ><p style="color: red"><?php echo $_SESSION['Error']; ?></p></div>
                    <?php
                    unset($_SESSION['Error']);

                }?>
               <!-- <div class="forgot">
                    <a href="#" class="txt1">
                        Forgot Username / Password?
                    </a>
                </div>-->

            </form>
        </div>
    </div>
</div>

</body>
</html>
