
$(function($) {
    "use strict";
// ============================================================== 
// Create New Profile Page Ajax
// ============================================================== 
                     
$('#authsubmit').on('click', function(e) { //For Submitting data
   e.preventDefault(); 

    var arnpfsub =  $("#authsubmit").val();
    var arnpfname =  $("#authname").val();
    var arnpfuser = $("#authusername").val();
    var arnpfemail = $("#authemail").val();
    var arnpfcomp =  $("#authcompany").val();
    var arnpfimg = $("#authavtar").val();
    var arnpfpass = $("#authpass").val();
    var arnpfpco = $("#authcmpass").val();
    var arnpfrole = $("#authrole").val();
    
    if (!arValidateUser(arnpfuser)) {

        $("#authusername").addClass("is-invalid");
        arSubmitResponse('alert', 'Not valid username!');
        return false;
    }
    if (!arValidateEmail(arnpfemail)) {

        $("#authemail").addClass("is-invalid");
        arSubmitResponse('alert', 'Not valid email!');
        return false;
    }
    if (arnpfpass != arnpfpco) {
        arSubmitResponse('alert', 'Conform password not matched!');
        return false;
    }
    
    if (arnpfname == "" || arnpfuser == "" || arnpfemail == "" || arnpfpass == "" || arnpfrole == null) {
        arSubmitResponse('alert', 'Some fields are empty!');
        
    } else {
        $("#authsubmit").attr("disabled", "disabled");
        $("#ar-loader").addClass("loadershow");
        $.ajax({
            type: "POST",
            url: 'inc/ajax-handler.php',
            data: {
                "arnpfsub": arnpfsub,
                "arnpfname": arnpfname,
                "arnpfuser": arnpfuser,
                "arnpfemail": arnpfemail,
                "arnpfcomp": arnpfcomp,
                "arnpfimg": arnpfimg,
                "arnpfpass": arnpfpass,
                "arnpfrole": arnpfrole
                
            },
            success: function(response) {
                $("#ar-loader").removeClass("loadershow");
                var result = JSON.parse(response);
                arSubmitResponse(result[0], result[1]);
                $("#authsubmit").removeAttr("disabled");
                $('#authform')[0].reset();
            },
            cache: false,
        });
        return false;
        
    }
});



});