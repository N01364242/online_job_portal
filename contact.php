<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $("#footer").load("footer.php");
        });
        $(function(){
            $("#header").load("header.php");
        });
    </script>
    <title>Registration</title>
</head>
<body>
<div id="header"></div>
<div class="container">
    <div class="row justify-content-center">

        <!-- Default form contact -->
        <form class="text-center border border-light p-5" action="#!">

            <p class="h4 mb-4">Contact us</p>

            <!-- Name -->
            <input type="text" id="name" class="form-control mb-4" placeholder="Name">

            <!-- Email -->
            <input type="email" id="email" class="form-control mb-4" placeholder="E-mail">

            <div class="form-group">
                <textarea class="form-control rounded-0" id="message" rows="3" placeholder="Message"></textarea>
            </div>


            <!-- Send button -->
            <button class="btn btn-info btn-block" type="submit">Send</button>

        </form>
        <!-- Default form contact -->
    </div>
</div>
<div id="footer"></div>
</body>


</html>