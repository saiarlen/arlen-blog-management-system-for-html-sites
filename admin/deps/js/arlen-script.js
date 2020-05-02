$(document).ready(function() {
    //Login Form Handler
    $("#login").click(function(e) {

        var username = $("#user").val();
        var password = $("#pass").val();

        //validation 
        if (username == "" || password == "") {
            e.preventDefault();
            $('#response').html("<p class='field_empty'>!All fields are required</p>").fadeIn(1000).delay(3000).fadeOut("slow");
        }
    });

});