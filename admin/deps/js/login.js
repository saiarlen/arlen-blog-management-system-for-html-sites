$(function ($) {
    "use strict";

    // ============================================================== 
    // Login Page Handler
    // ============================================================== 
    $('#arlogsub').on('click', function (e) {
        e.preventDefault();
        $("#arlogsub").attr("disabled", "disabled");
        var arusername = $("#aruser").val();
        var arpass = $("#arpass").val();
        var arlogsub = $("#arlogsub").val();

        if (arusername == "" || arpass == "") {
            $('#arlogresponse').html("<p class='field_empty'>!All fields are required</p>").fadeIn(500).delay(4000).fadeOut("slow");
            $("#arlogsub").removeAttr("disabled");

        } else {
            $(".load-wrapp").show();
            $.ajax({
                type: "POST",
                url: 'admin/inc/ajax-handler.php',
                data: {
                    "arlogsub": arlogsub,
                    "arusername": arusername,
                    "arpass": arpass
                },
                success: function (response) {
                    $(".load-wrapp").hide();
                    if (response === "true") {
                        window.location.href = "admin/home.php";
                    } else {
                        $('#arlogresponse').html("<p class='field_res'>" + response + "</p>").fadeIn(500).delay(5000).fadeOut("slow");
                    }
                    $("#arlogsub").removeAttr("disabled");
                    //$('#arloginform')[0].reset();
                },
                cache: false,
            });
            return false;
        }
    });

    // ============================================================== 
    // Password  visibility
    // ============================================================== 
    $(".toggle-password").click(function () {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function () {
        $("#arloginform").hide();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function () {
        $("#recoverform").hide();
        $("#arloginform").fadeIn();
    });
    // End of login page

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();

    // ============================================================== 
    // Login and Recover Password  Ajax
    // ============================================================== 
    $("#recov-email").on('focus', function () { //remove invalid class if exists
        if ($(this).hasClass('is-invalid')) {
            $(this).removeClass('is-invalid');
        }
    });

    $('#arrecsub').on('click', function (e) { //For Submitting data
        e.preventDefault();
        $("#arrecsub").attr("disabled", "disabled");
        var arrecemail = $("#recov-email").val();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(arrecemail);
        //alert("test");
        if (!emailReg) {
            $("#recov-email").addClass("is-invalid");
            $("#arrecsub").removeAttr("disabled");
            $('#arrecresponse').html("<p class='field_empty'>Not valid email!</p>").fadeIn(500).delay(4000).fadeOut("slow");
            return false;
        }
        if (arrecemail == "") {
            $("#recov-email").addClass("is-invalid");
            $("#arrecsub").removeAttr("disabled");
            $('#arrecresponse').html("<p class='field_empty'>Please enter your registered email!</p>").fadeIn(500).delay(4000).fadeOut("slow");
        } else {
            $("#arrecsub").text("Sending...");
            $.ajax({
                type: "POST",
                url: 'admin/inc/user-recover.php',
                data: {
                    "arrecemail": arrecemail
                },
                success: function (response) {

                    if (response === "YES") {

                        $("#arrecsub").html("Sent <i class='fas fa-check'></i>");
                        $("#arrecsub").removeAttr("disabled");
                        $("#recov-email").val('');
                        $('#arrecresponse').html("<p class='text-white'>Email has been sent</p>").fadeIn(500).delay(5000).fadeOut("slow");
                        setTimeout(function () {
                            $("#arrecsub").text("Recover");
                        }, 3000);
                    } else if (response === "NO") {
                        $("#arrecsub").removeAttr("disabled");
                        $('#arrecresponse').html("<p class='field_res'> Email ID is not registered </p>").fadeIn(500).delay(5000).fadeOut("slow");
                        setTimeout(function () {
                            $("#arrecsub").text("Recover");
                        }, 3000);
                    } else {
                        $("#arrecsub").html("Error");
                        $("#arrecsub").removeAttr("disabled");
                        $('#arrecresponse').html("<p class='field_res'>" + response + "</p>").fadeIn(500).delay(5000).fadeOut("slow");
                        setTimeout(function () {
                            $("#arrecsub").text("Recover");
                        }, 3000);
                    }
                },
                cache: false,
            });
            return false;
        }
    });

    $('#arpassnup').on('click', function (e) { //for new password retrive
        e.preventDefault();
        $("#arpassnup").attr("disabled", "disabled");
        var arpassnup = $("#arpassnup").val();
        var arnuser = $("#arnuser").val();
        var arrecnpass = $("#arrecnpass").val();

        if (arrecnpass == "") {
            $("#arrecnpass").addClass("is-invalid");
            $("#arpassnup").removeAttr("disabled");
            alert("Please enter your new password")
        } else {
            $("#arpassnup").text("Wait...");
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "arpassnup": arpassnup,
                    "arnuser": arnuser,
                    "arrecnpass": arrecnpass

                },
                success: function (response) {

                    if (response === "YES") {
                        $("#arpassnup").removeAttr("disabled");
                        $("#passrecform").html('<div class="text-center m-t-10"><span class="text-white ">Your password has been reset successfully</span></div><div class="col-12"><div class="form-group"><div class="p-t-20 text-center"><a class="btn btn-info" href="/blog-admin.php">Back to Login</a></div></div></div>');
                    } else if (response === "NO") {
                        $("#arpassnup").removeAttr("disabled");
                        alert("Something went wrong please try again")
                        setTimeout(function () {
                            $("#arpassnup").text("update");
                        }, 3000);
                    }else if (response === "INVALID") {
                        $("#arpassnup").removeAttr("disabled");
                        alert("User Invalid")
                        setTimeout(function () {
                            location.reload(true);
                        }, 1000);
                        
                    }
                },
                cache: false,
            });
            return false;

        }
    });


});