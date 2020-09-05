// ============================================================== 
// All Helper Functions for Submissions
// ============================================================== 
function arSubmitResponse(resstatus, resinfo) { //Response Function

    if (resstatus === "success") {
        $("#arModal .modal-title").css("color", "#155f3f");
        $("#arModal .modal-title").text("Success!");
    } else if (resstatus === "alert") {
        $("#arModal .modal-title").css("color", "#ba7307");
        $("#arModal .modal-title").text("Alert!");
    } else if (resstatus === "error") {
        $("#arModal .modal-title").css("color", "#d30909");
        $("#arModal .modal-title").text("Error!");
    }
    $("#arModal .modal-body").html(resinfo);
    $('#arModal').modal('toggle');

}

function arValidateEmail(emailin) { //Mail validation
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(emailin);
    return emailReg;
}

function arValidateUser(useridin) { //User validation
    var isValidUser = /^(?![0-9]+$)(?=[a-zA-Z0-9-]{5,25}$)[a-zA-Z0-9]+(-[a-zA-Z0-9]+)*$/.test(useridin);
    return isValidUser;
}

function arPostResponse() { //Post submit Response
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    $("#post_form")[0].reset();
}

function arUpdateDiv() { // For auto Reloading Page
    setTimeout(function () {
        location.reload(true);
    }, 1000);
}

//===============================================================