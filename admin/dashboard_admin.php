<?php
require_once 'Database.php';
$db = Database::getDb();
$sql1 = "Select count(us.user_id) as userId, u.usertype_name as name from user_details us inner join login l on l.useraccid= us.user_id  inner join user_type u on u.usertype_id = l.usertype_id group by u.usertype_name";
$pst1 = $db->prepare($sql1);
$pst1->execute();
$data1 = $pst1->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "Select count(j.job_id) as jobId, j.postedby_id as employer, count(a.employee_id) as applicants from job_post j inner join job_application_request a  on j.job_id= a.job_id group by employer";
$pst2 = $db->prepare($sql2);
$pst2->execute();
$data2 = $pst2->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>JobStock - Dashboard</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="../css/adminHeader.css" rel="stylesheet">
    <link href="../css/adminMainContent.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawPieChart);
        google.charts.setOnLoadCallback(drawColumnChart);

        function drawPieChart() {

            var data = google.visualization.arrayToDataTable([
                ['Users', 'No. of Registerd'],
                <?php
                    foreach($data1 as $row){
                    echo "['".$row['name']."',".$row['userId']."],";
                    }
                ?>
            ]);

            var options = {
                title: 'User Details',
                is3D: true,
                backgroundColor: { fill:'transparent' },
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

        function drawColumnChart() {

            var data = google.visualization.arrayToDataTable([
                ['Employer', 'JobPosts', 'Applicants'],
                <?php
                foreach($data2 as $row){
                    echo "['".$row['employer']."',".$row['jobId'].",".$row['applicants']."],";
                }
                ?>
            ]);

            var options  ={
                backgroundColor: { fill:'transparent' },
                is3D: true,
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Number of Job posted by an employer and Applicants applied',

                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

</head>
<body>
<?php
session_start();
include "adminHeader.php";
include "sidebar.php";
include "adminFooter.php";
?>
<section id="main-content">
    <section class="wrapper">
        <table class="columns">
            <tr>
                <td><div id="piechart" style="width: 45%; height: 500px ;"></div></td>
                <td> <div id="columnchart" style="width: 45%; height: 500px; padding-left: 200px;"></div></td>
            </tr>
        </table>


    </section>
</section>
</body>
</html>
