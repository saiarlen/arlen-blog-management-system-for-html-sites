
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
                if(result[0] !== "alert"){
                    $('#authavtar').removeAttr('value');
                    $('#authform')[0].reset();   
                }
            },
            cache: false,
        });
        return false;
        
    }
});


// ============================================================== 
// Update Profile Page Ajax
// ============================================================== 

$('#authorupdate').on('click', function(e) { //For Submitting data
    e.preventDefault(); 
 
     var arupfsub =  $("#authorupdate").val();
     var arupfid =  $("#authid").val();
     var arupfname =  $("#authname").val();
     var arupfemail = $("#authemail").val();
     var arupfcomp =  $("#authcompany").val();
     var arupfimg = $("#authavtar").val();
  
     if (!arValidateEmail(arupfemail)) {
 
         $("#authemail").addClass("is-invalid");
         arSubmitResponse('alert', 'Not valid email!');
         return false;
     }
    
     if (arupfname == "" || arupfemail == "") {
         arSubmitResponse('alert', 'Some fields are empty!');
         
     } else {
         $("#authorupdate").attr("disabled", "disabled");
         $(".chngwrapper #chngpass").addClass("disabled");
         $("#ar-loader").addClass("loadershow");
         $.ajax({
             type: "POST",
             url: 'inc/ajax-handler.php',
             data: {
                 "arupfsub": arupfsub,
                 "arupfid": arupfid,
                 "arupfname": arupfname,
                 "arupfemail": arupfemail,
                 "arupfcomp": arupfcomp,
                 "arupfimg": arupfimg,
             
             },
             success: function(response) {
                 $("#ar-loader").removeClass("loadershow");
                 var result = JSON.parse(response);
                 $("#imgaload").load(" #proimg");
                 $(".page-title").load(" .page-title span");
                 arSubmitResponse(result[0], result[1]);
                 $("#authorupdate").removeAttr("disabled");
                 $(".chngwrapper #chngpass").removeClass("disabled");
                 
             },
             cache: false,
         });
         return false;
         
     }
 });

 //Change password Section
 $('#passupdate').on('click', function(e) { //For Submitting data
    e.preventDefault(); 
 
     var aruppsub =  $("#passupdate").val();
     var aruppid =  $("#authid").val();
     var aruppcnt =  $("#authcurnpass").val();
     var aruppnew = $("#authpass").val();
     var aruppcnf =  $("#authcmpass").val();

     if (aruppnew != aruppcnf) {
        arSubmitResponse('alert', 'Conform password not matched!');
        return false;
    }

     if (aruppcnt == "" || aruppnew == "") {
         arSubmitResponse('alert', 'Some fields are empty!');
         
     } else {
         $("#passupdate").attr("disabled", "disabled");
         $(".chngwrapper #chngprof").addClass("disabled");
         $("#ar-loader").addClass("loadershow");
         $.ajax({
             type: "POST",
             url: 'inc/ajax-handler.php',
             data: {
                 "aruppsub": aruppsub,
                 "aruppid": aruppid,
                 "aruppcnt": aruppcnt,
                 "aruppnew": aruppnew
             
             },
             success: function(response) {
                 $("#ar-loader").removeClass("loadershow");
                 var result = JSON.parse(response);
                 arSubmitResponse(result[0], result[1]);
                 $("#passupdate").removeAttr("disabled");
                 $(".chngwrapper #chngprof").removeClass("disabled");
                 $("#changepsfm").find('input:password').val('')
                 
             },
             cache: false,
         });
         return false;
         
     }
 });




















});