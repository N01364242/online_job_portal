
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more-exp").click(function(e){
        e.preventDefault();
        var addto = "#exp" + next;
        var addRemove = "#exp" + (next);
        next = next + 1;
        var newIn =   '<div id="exp'+ next +'" name="exp'+ next +'">'+
            '<div class="form-group">'+
            '<div class="col-xs-12">'+
            '<label for="job_title"><h4>Title</h4></label>'+
            '<input type="text" class="form-control" name="job_title" id="job_title"'+
            'placeholder="job_title" title="enter your first name if any.">'+
            '</div>'+
            '</div>'+

            '<div class="form-group">'+
            '<div class="col-xs-12">'+
            '<label for="company"><h4>Company</h4></label>'+
            '<input type="text" class="form-control" name="company" id="company"'+
            'placeholder="company" title="enter your first name if any.">'+
            '</div>'+
            '</div>'+


            '<div class="form-group">'+
            '<div class="col-xs-6">'+
            '<label for="job_start_date"><h4>Start Date</h4></label>'+
            '<input type="text" class="form-control" name="job_start_date" id="job_start_date"'+
            'placeholder="job_start_date" title="enter your first name if any.">'+
            '</div>'+
            '</div>'+

            '<div class="form-group">'+
            '<div class="col-xs-6">'+
            '<label for="job_end_date"><h4>End Date</h4></label>'+
            '<input type="text" class="form-control" name="job_end_date" id="job_end_date"'+
            'placeholder="job_end_date" title="enter your first name if any.">'+
            '</div>'+
            '</div>';


        var newInput = $(newIn);
        var removeBtn = '<div class="form-group">' +
            '<div class="col-md-4 p-3">' +
            '<button id="remove_exp' + (next - 1) + '" class="btn btn-danger remove_exp" >Remove</button>' +
            '</div>' +
            '</div></div>'
        '</div><div id="exp">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#exp" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);

        $('.remove_exp').click(function(e){
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length-1);
            var fieldID = "#exp" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
        });
    });

});






$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn =   '<div id="field'+ next +'" name="field'+ next +'">'+
            '<div class="form-group">'+
            '<div class="col-xs-12">'+
            '<label for="university"><h4>University/College Name</h4></label>'+
            '<input type="text" class="form-control" name="university" id="university" placeholder="university" title="enter your first name if any.">'+
            '</div>'+
            '</div>'+

            '<div class="form-group">'+
            '<div class="col-xs-12">'+
            '<label for="degree"><h4>Degree</h4></label>'+
            '<input type="text" class="form-control" name="degree" id="degree"'+
            'placeholder="degree" title="enter your first name if any.">'+
            '</div>'+
            '</div>'+

            '<div class="form-group">'+
            '<div class="col-xs-6">'+
            '<label for="start_year"><h4>Start Year</h4></label>'+
            '<input type="text" class="form-control" name="start_year" id="start_year"'+
            'placeholder="start_year" title="enter your first name if any.">'+
            '</div>'+
            '</div>'+

            '<div class="form-group">'+
            '<div class="col-xs-6">'+
            '<label for="end_year"><h4>End Year</h4></label>'+
            '<input type="text" class="form-control" name="end_year" id="end_year"'+
            'placeholder="end_year" title="enter your first name if any.">'+
            '</div>'+
            '</div>';


        var newInput = $(newIn);
        var removeBtn = '<div class="form-group">' +
            '<div class="col-md-4 p-3">' +
            '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);

        $('.remove-me').click(function(e){
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length-1);
            var fieldID = "#field" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
        });
    });

});


