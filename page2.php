<html>
<head>
    <title>JobStock</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/page2.css">
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
    </script>
</head>
<body>
<div id="header"></div>
<div id="center_column" class="clearfix equal_height">
    <div id="listings_module">
        <table class="table table-hover" style="width:60%; margin: auto; margin-top: 150px">
            <thead>
            <tr>
                <th class="listings_title">Job Title</th>
                <th class="listings_pay">Pay/Type</th>
                <th class="listings_area">City</th>
            </tr>
            </thead>
            <tbody>
            <tr class="clickable_button">
                <td class="listings_title">
                    <h5><a href=" ">Receptionist</a></h5>
                </td>
                <td class="listings_pay">
                    <p class="compensation">$14K-20K</p>
                </td>
                <td class="listings_area">
                    <p class="city">Montreal, Quebec </p>
                </td>
                <td class="overview_arrow"><span></span></td>
            </tr>
            <tr class="clickable_button">
                <td class="listings_title">
                    <h5><a href="">QA Analyst</a></h5>
                </td>
                <td class="listings_pay">
                    <p class="compensation">$140K-180K</p>
                </td>
                <td class="listings_area">
                    <p class="city">Brampton, Ontario </p>
                </td>
            </tr>
            <tr class="clickable_button">
                <td class="listings_title">
                    <h5><a href="">Full Stack Developer</a></h5>
                </td>
                <td class="listings_pay">
                    <p class="compensation">$180K-200K</p>
                </td>
                <td class="listings_area">
                    <p class="city">Toronto, Ontario</p>
                </td>
            </tr>
            <tr class="clickable_button">
                <td class="listings_title">
                    <h5><a href="">Data Analyst</a></h5>
                </td>
                <td class="listings_pay">
                    <p class="compensation">$240K-280K</p>
                </td>
                <td class="listings_area">
                    <p class="city">Brampton, Ontario </p>
                </td>
            </tr>
            <tr class="clickable_button">
                <td class="listings_title">
                    <h5><a href="">Software Developer</a></h5>
                </td>
                <td class="listings_pay">
                    <p class="compensation">$200K-280K</p>
                </td>
                <td class="listings_area">
                    <p class="city">London, Ontario </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="search_nav">
    <ul class="pagination" style="margin-left: 500px;">
        <li class="prev_results">
        <li><a class="text_link" href="home.php">Prev</a></li>
        </li>

        <li><a class="text_link" href="home.php">1</a></li>

        <li class="inactive">2</li>


        <li><a class="text_link" href="?page=3">3</a></li>


        <li><a class="text_link" href="?page=4">4</a></li>


        <li class="inactive">...</li>


        <li><a class="text_link" href="?page=10">10</a></li>


        <li class="next_results">
            <a href="?page=2"><span class="text_link">Next</span></a>

        </li>
    </ul>
</div>
<div id="footer"></div>
</body>
</html>
