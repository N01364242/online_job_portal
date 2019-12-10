<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>JobStock - UI Elements</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="../css/adminHeader.css" rel="stylesheet">
    <link href="../css/adminMainContent.css" rel="stylesheet">

</head>
<body>
<?php
include "adminHeader.php";
include "sidebar.php";
?>
<section id="main-content">
    <section class="wrapper">
        <h3> User Interface Elements</h3>
        <hr>
        <div class="row mt">
            <!--Dropdown primary-->
            <div class="dropdown">

                <!--Trigger-->
                <a class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Elements</a>


                <!--Menu-->
                <div class="dropdown-menu dropdown-primary" >
                    <a class="dropdown-item" id="Business Stream" href="#" onclick="showDetails(this);">Businesss Stream</a>
                    <a class="dropdown-item" id="SkillSet" href="#" onclick="showDetails(this);">SkillSet</a>
                    <a class="dropdown-item"  id="SkillLevel"href="#" onclick="showDetails(this);">Skill level</a>

                </div>
            </div>
            <!--/Dropdown primary-->
            <div class="col-lg-12">

                <div class="content-panel">

            <section id="unseen">
                <!--<form action='ProcessUIElements.php' method='post'>-->
                <table class="table table-bordered table-striped table-condensed" >
                    <thead id="uihead">
                   <!--THis will display the heading of the UI elements -->
                    </thead>
                    <tbody id="uicontents">
                   <!-- THis will display the UI values-->

                    </tbody>
                </table>
               <!--</form>-->
                <!--Modal on Clicking Details button-->
                <div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="title"></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <p><b>Id: </b> <input type="text" id="id" readonly></span></p>
                                <p><b>Name: </b><input type="text" id="name"></input> </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateContent(this)">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </section>
</section>
<?php
include "adminFooter.php";
?>
<script>
    function showDetails(button) {
        var dropdownId = button.id;

               $.ajax({
            url: "loadUIElements.php",
            method: "POST",
             dataType: 'JSON',
             data: {"ui_id": dropdownId},
             success: function (response) {
                 var trHTML = '';
                 var len = response.length;
                 var head1 = dropdownId + " "+"Id";
                 var head2 = dropdownId + " "+"Name";
                 $("#uihead").empty();
                 var tr_str = "<tr>" +
                     "<th align='center'>" + head1 + "</th>" +
                     "<th align='center'>" + head2 + "</th>" +
                     "</tr>";

                 $("#uihead").append(tr_str);
                 $("#uicontents").empty();
                 var id ='';
                 var streamName='';
                 for (var i = 0; i < len; i++) {
                     if(dropdownId=='Business Stream'){
                     id = response[i].id;
                     streamName = response[i].business_stream_name;
                     }else if(dropdownId=='SkillSet'){
                      id = response[i].skill_id;
                       streamName = response[i].skill_name
                     }else{
                      id = response[i].skill_level_id;
                       streamName = response[i].level_name;
                     }

                     tr_str = "<tr id='"+ dropdownId+id+"'>" +
                         "<td align='center'>" + id + "</td>" +
                         "<td align='center'>" + streamName + "</td>" +
                         "<td align='center'><button class ='btn btn-primary btn-lg' data-toggle ='modal' data-target='#myModal'"+
                         " id='"+dropdownId +"_"+ id + "_"+streamName+"' onclick='updateDetails(this);'>Update</button></td>"+
                         "<td align='center' id='"+dropdownId +"_" + id + "'><button class='btn btn-danger btn-sm' onclick='remove(this);'>Delete</button></td>"+
                         "</tr>";

                     $("#uicontents").append(tr_str);

                 }
             var tr_str = "<tr><td align='center'><input type='text' name='id' disabled/></td>"+
                 "<td align='center'><input type='text' class='name' name='name' required/></td>" +
                 "<td align='center'><button class='btn btn-danger btn-sm' id='"+dropdownId+"' onclick='addUI(this);'>Add</button></td></tr>"
                 $("#uicontents").append(tr_str);
             }
        });
    }
    function remove(button) {

        var id = button.parentElement.getAttribute("id");
        var k = button.closest("tr");
        var res = id.split("_");
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
                url: "DeleteUIElements.php",
                method: "POST",
                data: {id: res[1], uielement: res[0]},
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    alert(data);
                    k.remove();

                }
            });
        }
    };
    function updateDetails(button){
        var details = button.id;
        var res = details.split("_");
        $("#title").text(res[0]);
        $("#id").val(res[1]);
        $("#name").val(res[2]);
    }

    function addUI(button){
        var ui = button.id;
        var name = $(button).closest("tr").find("input.name").val();
        $.ajax({
            url: "AddUIElements.php",
            method: "POST",
            data: {name: name,uielement:ui},
            error: function() {
                alert('Something is wrong');
            },
            success: function(data) {
                alert(data);
                showDetails(button);
            }
        });
    }

    function updateContent(button) {
        var title= $('#title').text();
        var id= $('#id').val();
        var name = $('#name').val();
        $.ajax({
            url: "UpdateUIElement.php",
            method: "POST",
            data: {id: id, name: name, uielement: title},
            error: function() {
                alert('Something is wrong');
            },
            success: function(data) {

                button.id =title;
                alert(data);
                showDetails(button);
            }
        });
    }
</script>
</body>
</html>
