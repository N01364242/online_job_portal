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