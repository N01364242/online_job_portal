
function showMessage(button){
    var queryId = button.id;
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


