$(function($) {
    "use strict";

// ============================================================== 
    // Login Page Handler
// ============================================================== 
$('#arlogsub').on('click', function(e) {
    e.preventDefault();
    $("#arlogsub").attr("disabled", "disabled");
    var arusername =  $("#aruser").val();
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

            success: function(response) {
                $(".load-wrapp").hide();
                if (response === "true"){
                    window.location.href = "admin/home.php";
                }
                else {
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
    $(".toggle-password").click(function() {

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
    $('#to-recover').on("click", function() {
        $("#arloginform").hide();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#arloginform").fadeIn();
    });

    // End of login page
    
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();

});
