<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Registration</title>
    <script>
        $(function(){
            $("#footer").load("footer.php");
        });
        $(function(){
            $("#header").load("header.php");
        });
    </script>
</head>
<body>
<div id="header"></div>
<div class="container">
    <div class="row justify-content-center">

        <!-- Default form register -->
        <form class="text-center border border-light p-5" action="#">

            <p class="h4 mb-4">Sign up</p>


            <!-- First name -->
            <input type="text" id="firstname" class="form-control mb-4" placeholder="First name">

            <!-- Last name -->
            <input type="text" id="lastname" class="form-control mb-4" placeholder="Last name">

            <!-- E-mail -->
            <input type="email" id="email" class="form-control mb-4" placeholder="E-mail">

            <!-- Password -->
            <input type="password" id="password" class="form-control mb-4" placeholder="Password" aria-describedby="PasswordHelpBlock">
            <!--<small id="PasswordHelpBlock" class="form-text text-muted mb-4">
                At least 8 characters and 1 digit
            </small>-->

            <!-- Terms and condition -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="termsAndCondition">
                <label class="custom-control-label" for="termsAndCondition">I accept the Terms of Use & Privacy Policy</label>
            </div>

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Sign Up</button>

            <!-- Terms of service -->
            <p>Already have an account?
                <a href="login.html">Sign In</a>

        </form>
        <!-- Default form register -->
    </div>
</div>
<div id="footer"></div>
</body>


</html>