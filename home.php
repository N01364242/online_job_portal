<html>
<head>
    <title>JobStock</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/mainpagejob.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $("#header").load("header.php");
        });
        $(function(){
            $("#footer").load("footer.php");
        });
        $(function(){
            $("#mainpage").load("mainPageJob.php");
        });
    </script>
</head>
<body>
<div id="header"></div>
<div class="bkimg"></div>
<h1 id="mdl">The Easiest Way to get Your New Job </h1>
<p id="mdd">Find Jobs,Employement & Career Opportunities </p>
<div class="srch">
    <form class="form-inline" action="">
        <input class="form-control mr-sm-2" type="text" placeholder="Search Job">
        <input class="form-control mr-sm-2" type="text" placeholder="Any Category">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
</div>
<div id="mainpage"></div>
<div id="footer"></div>
</body>
</html>