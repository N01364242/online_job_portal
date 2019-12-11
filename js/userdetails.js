<!-- To show the details of seekers when we click on Details button-->
function showSeekerDetails(button){
    var seekerId = button.id;
    $.ajax({
        url: "seeker.php",
        method: "GET",
        data: { "seekerId": seekerId},
        success: function (response) {
            var employer = JSON.parse(response);
            $("#fname").text(employer[0].user_firstname);
            $("#lname").text(employer[0].user_lastname);
            $("#rdate").text(employer[0].registrationDate);
            $("#phone").text(employer[0].phone);
            $("#email").text(employer[0].email);
            $("#address").text(employer[0].address);
            $("#dname").text(employer[0].degree_name);
            $("#university").text(employer[0].university_name);
            $("#start").text(employer[0].start_date);
            $("#comdate").text(employer[0].completed_date);

        }

    });
}

function showEmployerDetails(button){
    var employerId = button.id;
    $.ajax({
        url: "employer.php",
        method: "GET",
        data: { "employerId": employerId},
        success: function (response) {
            var employer = JSON.parse(response);
            $("#fname").text(employer[0].user_firstname);
            $("#lname").text(employer[0].user_lastname);
            $("#rdate").text(employer[0].registrationDate);
            $("#phone").text(employer[0].phone);
            $("#email").text(employer[0].email);
            $("#address").text(employer[0].address);
            $("#cname").text(employer[0].company_name);
            $("#cdesc").text(employer[0].company_desc);
            $("#business").text(employer[0].business_stream_name);
            $("#edate").text(employer[0].establishment_date);
            $("#curl").text(employer[0].company_url);

        }

    });
}

