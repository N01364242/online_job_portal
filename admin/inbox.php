<?php
include_once "Database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="../css/adminHeader.css" rel="stylesheet">
    <link href="../css/adminMainContent.css" rel="stylesheet">


</head>
<body>
<?php
include "adminHeader.php";
include "sidebar.php";
$db = Database::getDb();
$sql = "Select * from contact_us order by time ";
$pst = $db->prepare($sql);
$pst->execute();
$data = $pst->fetchAll(PDO::FETCH_OBJ);
?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-9">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                        <h4 class="gen-case">
                            Inbox
                            <form action="#" class="pull-right mail-src-position">
                                <div class="input-append">
                                    <input type="search" class="form-control" placeholder="Search Mail">
                                </div>
                            </form>
                        </h4>
                    </header>
                            <div class="chk-all">

                                <div class="btn-group">
                                    <a data-toggle="dropdown" href="#" class="btn mini all">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                              <div class="btn-group">
                                <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="inbox.php" class="btn mini tooltips">
                                    <i class=" fa fa-refresh"></i>
                                </a>
                              </div>
                            </div>
                        </div>
                        <div class="table-inbox-wrap ">
                            <table class="table table-inbox table-hover" id="dtBasicExample">
                                <tbody>
                                <?php
                                foreach ($data as $mail) {
                                     $monthNum = strtotime($mail->time);
                                    $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));
                                    $time = date('h:i a', $monthNum);
                                ?>
                                <tr class="unread" id="<?php echo $mail->query_id ?>">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">

                                    <td class="view-message  dont-show"><a href="../mail_view.php"><?php echo $mail->name ?><br/><?php echo '['.$mail->email.']' ?><br/></a></td>
                                    <td class="view-message "><a href="#" data-toggle ='modal' data-target='#myModal' id="<?php echo $mail->query_id ?>" onclick="showMessage(this);"><?php echo $mail->query ?></a></td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right"><?php echo $monthName." ".date('d', strtotime($mail->time)); ?></td>
                                    <td class="view-message  text-right"><?php echo $time; ?></td>
                                    <td class="view-message  text-right"><a href="#" class="btn" data-toggle ='modal' data-target='#myModal2' id="<?php echo $mail->query_id ?>" onclick="sendReply(this);"><i class="fa fa-reply"></i> Reply</a></td>
                                </tr>

<?php } ?>
                                </tbody>
                            </table>

                            <div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <strong id="name"></strong>
                                            <p id="email"><></p>

                                            <button type="button" class="close" data-dismiss="modal">&times;</button>



                                        </div>

                                    <div class="modal-body">

                                        <p class="date" id="date" align="right"> </p>
                                        <p id="query"></p>
                                    </div>

                                </div>
                            </div>
                        </div> <div id="myModal2" class="modal fade" role="dialog" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="gen-case">
                                                Compose Mail
                                            </h4>

                                            <button type="button" class="close" data-dismiss="modal">&times;</button>



                                        </div>

                                        <div class="modal-body">

                                            <div class="panel-body">
                                                <div class="compose-mail">
                                                    <form role="form-horizontal" method="post" action="../mail.php">
                                                        <div class="form-group">
                                                            <label for="to" class="">To:</label>
                                                            <input type="text" tabindex="1" id="to" name ="to" class="form-control">
                                                            <input type="hidden"  id="name" name ="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="subject" class="">Subject:</label>
                                                            <input type="text" tabindex="1" id="subject" name="subject" class="form-control">
                                                        </div>
                                                        <div class="compose-editor">
                                                            <textarea class="wysihtml5 form-control" rows="9" id="draft" name="draft"></textarea>
                                                        </div>
                                                        <div class="compose-btn">
                                                            <button class="btn btn-theme btn-sm"><i class="fa fa-check"></i> Send</button>
                                                            <button class="btn btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>

                                                        </div>
                                                    </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- /wrapper -->


</section>
<script>
    function showMessage(button){
        var queryId = button.id;
        alert(queryId);
        $.ajax({
            url: "receivedMail.php",
            method: "POST",
            dataType: 'JSON',
            data: { "queryId": queryId},
            success: function (response) {

                $("#name").text(response[0].name);
                $("#email").text("<"+response[0].email+">");
                $("#date").text(response[0].time);
                $("#query").text(response[0].query);

            }

        });
    }

    function sendReply(button){
        var queryId = button.id;
        alert(queryId);
        $.ajax({
            url: "receivedMail.php",
            method: "POST",
            dataType: 'JSON',
            data: { "queryId": queryId},
            success: function (response) {
                $("#name").val(response[0].name);
                $("#to").val(response[0].email);
                $("#subject").val("Query #"+queryId+"Reply- Jobstock");
                $("#draft").val("-------------------"+"\n"+response[0].time+"\n"+response[0].query);


            }

        });
    }


</script>


</body>
</html>