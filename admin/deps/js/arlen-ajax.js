$(function ($) {
    "use strict";
    // ============================================================== 
    // Posts Delete Ajax in all posts page
    // ============================================================== 

    $('#pos_delete').on('click', function (e) { //for Multiple del
        e.preventDefault();
        var posdelbtn = $('#pos_delete').val();
        var poscheckbx = [];

        $("#posdel:checked").each(function () {
            poscheckbx.push(this.value);
        });
        if (poscheckbx.length !== 0) {
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "posdelbtn": posdelbtn,
                    "poscheckbx": poscheckbx
                },

                success: function (response) {
                    if (response == "YES") {
                        $(".ar_ps_del").addClass("delcolor");
                        arUpdateDiv();
                    } else {
                        var result = JSON.parse(response)
                        arSubmitResponse(result[0], result[1]);
                    }

                },
                cache: false,
            });
            return false;
        } else {
            arSubmitResponse("alert", "Please select one to delete");
        }
    });

    $('#del_btn_single').on('click', function (e) { //for single del button click
        e.preventDefault();
        var singleposdel = $('#del_btn_single').val();
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "singleposdel": singleposdel,
                },
                success: function (response) {
                    if (response == "YES") {
                        setTimeout(function () {
                            location.reload(true);
                        }, 500);
                    } else {
                        var result = JSON.parse(response)
                        arSubmitResponse(result[0], result[1]);
                    }

                },
                cache: false,
            });
            return false;
        } else {
            return false;
        }
    });
    // ============================================================== 
    // End of Posts Delete Ajax in all posts page
    // ============================================================== 

    // ============================================================== 
    // Category Ajax
    // ============================================================== 

    $('#cat_submit').on('click', function (e) { //For Submitting categories data to database
        e.preventDefault();
        $("#cat_submit").attr("disabled", "disabled");
        var catname = $('#catname').val();
        var catslgname = $('#catslgname').val();
        var catinsertbtn = $('#cat_submit').val();


        if (catname != "" && catslgname != "") {
            $("#ar-loader").addClass("loadershow");
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "catinsertbtn": catinsertbtn,
                    "catname": catname,
                    "catslgname": catslgname
                },

                success: function (response) {
                    $("#ar-loader").removeClass("loadershow");
                    $("#cat_submit").removeAttr("disabled");
                    var result = JSON.parse(response);
                    arSubmitResponse(result[0], result[1]);
                    $('#cat_in_form')[0].reset();
                    if (result[2] == "true") {
                        arUpdateDiv();
                    }
                },
                cache: false,
            });
            return false;
        } else {
            arSubmitResponse('alert', 'Please Enter Category and Slug Name!');
            $("#cat_submit").removeAttr("disabled");
        }
    });

    $('#cat_delete').on('click', function (e) { // delete categories data in database
        e.preventDefault();
        var catdelbtn = $('#cat_delete').val();
        var catcheckbx = [];
        $("#catdel:checked").each(function () {
            catcheckbx.push(this.value);
        });
        if (catcheckbx.length !== 0) {
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "catdelbtn": catdelbtn,
                    "catcheckbx": catcheckbx
                },
                success: function (response) {
                    if (response == "YES") {
                        $(".ar_cs_del").addClass("delcolor");
                        arUpdateDiv();
                    } else {
                        var result = JSON.parse(response);
                        arSubmitResponse(result[0], result[1]);
                    }

                },
                cache: false,
            });
            return false;
        } else {
            arSubmitResponse('alert', 'Please select one to delete!');
        }

    });

    $('#catup_submit').on('click', function (e) { //For updating categories data to database
        e.preventDefault();
        $("#catup_submit").attr("disabled", "disabled");
        var catid = $('#catid').val();
        var catname = $('#catname').val();
        var catslgname = $('#catslgname').val();
        var cat_update = $('#catup_submit').val();

        if (catname != "" && catslgname != "") {
            $("#ar-loader").addClass("loadershow");
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "catid": catid,
                    "cat_update": cat_update,
                    "catname": catname,
                    "catslgname": catslgname
                },

                success: function (response) {
                    $("#ar-loader").removeClass("loadershow");
                    $("#catup_submit").removeAttr("disabled");
                    var result = JSON.parse(response);
                    arSubmitResponse(result[0], result[1]);
                },
                cache: false,
            });
            return false;
        } else {
            arSubmitResponse('alert', 'Please Enter Category and Slug Name!');
            $("#catup_submit").removeAttr("disabled");
        }
    });

    // ============================================================== 
    //  End of Category Ajax
    // ==============================================================

    // ============================================================== 
    // Tags Ajax
    // ============================================================== 

    $('#tag_submit').on('click', function (e) { //For Submitting tags data to database
        e.preventDefault();
        $("#tag_submit").attr("disabled", "disabled");
        var tagname = $('#tagname').val();
        var taginsertbtn = $('#tag_submit').val();

        if (tagname != "") {
            $("#ar-loader").addClass("loadershow");
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "taginsertbtn": taginsertbtn,
                    "tagname": tagname
                },

                success: function (response) {
                    $("#ar-loader").removeClass("loadershow");
                    $("#tag_submit").removeAttr("disabled");
                    var result = JSON.parse(response);
                    arSubmitResponse(result[0], result[1]);
                    $('#tag_in_form')[0].reset();
                    if (result[2] == "true") {
                        arUpdateDiv();
                    }

                },
                cache: false,
            });
            return false;
        } else {
            arSubmitResponse('alert', 'Please Enter Tag Name!');
            $("#tag_submit").removeAttr("disabled");
        }
    });

    $('#tag_delete').on('click', function (e) { // delete tags data in database
        e.preventDefault();
        var tagdelbtn = $('#tag_delete').val();
        var tagcheckbx = [];
        $("#tagdel:checked").each(function () {
            tagcheckbx.push(this.value);
        });
        if (tagcheckbx.length !== 0) {
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "tagdelbtn": tagdelbtn,
                    "tagcheckbx": tagcheckbx
                },
                success: function (response) {
                    if (response == "YES") {
                        $(".ar_cs_del").addClass("delcolor");
                        arUpdateDiv();
                    } else {
                        var result = JSON.parse(response);
                        arSubmitResponse(result[0], result[1]);
                    }
                },
                cache: false,
            });
            return false;
        } else {
            arSubmitResponse('alert', 'Please select one to delete!');
        }

    });

    $('#tagup_submit').on('click', function (e) { //For updating tags data to database
        e.preventDefault();
        $("#tagup_submit").attr("disabled", "disabled");
        var tagid = $('#tagid').val();
        var tagname = $('#tagname').val();
        var tag_update = $('#tagup_submit').val();

        if (tagname != "") {
            $("#ar-loader").addClass("loadershow");
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "tagid": tagid,
                    "tag_update": tag_update,
                    "tagname": tagname,
                },
                success: function (response) {
                    $("#ar-loader").removeClass("loadershow");
                    $("#tagup_submit").removeAttr("disabled");
                    var result = JSON.parse(response);
                    arSubmitResponse(result[0], result[1]);
                },
                cache: false,
            });
            return false;
        } else {
            arSubmitResponse('alert', 'Please Enter Tag Name!');
            $("#tagup_submit").removeAttr("disabled");
        }
    });

    // ============================================================== 
    // End of Tags Ajax
    // ============================================================== 

    // ============================================================== 
    // Create New Profile Page Ajax
    // ============================================================== 

    $('#authsubmit').on('click', function (e) { //For Submitting data
        e.preventDefault();

        var arnpfsub = $("#authsubmit").val();
        var arnpfname = $("#authname").val();
        var arnpfuser = $("#authusername").val();
        var arnpfemail = $("#authemail").val();
        var arnpfcomp = $("#authcompany").val();
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
                success: function (response) {
                    $("#ar-loader").removeClass("loadershow");
                    var result = JSON.parse(response);
                    arSubmitResponse(result[0], result[1]);
                    $("#authsubmit").removeAttr("disabled");
                    if (result[0] !== "alert") {
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
    // End of Create New Profile Page Ajax
    // ============================================================== 

    // ============================================================== 
    // Update Profile Page and Single Profile Page Ajax
    // ============================================================== 

    $('#authorupdate').on('click', function (e) { //For Submitting data
        e.preventDefault();

        var arupfsub = $("#authorupdate").val();
        var arupfid = $("#authid").val();
        var arupfname = $("#authname").val();
        var arupfemail = $("#authemail").val();
        var arupfcomp = $("#authcompany").val();
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
                success: function (response) {
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
    $('#passupdate').on('click', function (e) { //For Submitting data
        e.preventDefault();

        var aruppsub = $("#passupdate").val();
        var aruppid = $("#authid").val();
        var aruppcnt = $("#authcurnpass").val();
        var aruppnew = $("#authpass").val();
        var aruppcnf = $("#authcmpass").val();

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
                success: function (response) {
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
    // ============================================================== 
    // End of Update Profile Page and Single Profile Page Ajax
    // ============================================================== 

    // ============================================================== 
    // Manage Profiles Page Ajax
    // ============================================================== 

    $('.switch-input').change(function () {
        var arusrval = $(this).val();
        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "arusrchecked": "checked",
                    "arusrval": arusrval
                },
                success: function (response) {
                    var result = JSON.parse(response);
                    arSubmitResponse(result[0], result[1]);
                },
                cache: false,
            });
            return false;
        } else if ($(this).is(":not(:checked)")) {
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "arusruncheck": "unchecked",
                    "arusrval": arusrval
                },
                success: function (response) {
                    var result = JSON.parse(response);
                    arSubmitResponse(result[0], result[1]);
                },
                cache: false,
            });
            return false;
        }
    });

    //User Delete
    $('.user-del').on('click', function () { //For Submitting data

        var aruserdel = $(this).val();

        if (aruserdel == "") {
            arSubmitResponse('error', 'User not exist!');

        } else if (confirm("Are you sure you want to delete user")) {
            $(this).attr("disabled", "disabled");
            $(this).parent().parent().addClass("delcolor");
            console.log($(this).val());
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "aruserdel": aruserdel,
                },
                success: function (response) {
                    if (response == "yes") {
                        arUpdateDiv();
                        //$(".card").removeClass("delcolor");
                        $(".user-del").removeAttr("disabled");
                    } else {
                        arSubmitResponse("error", "Something went wrong!");
                        $(".card").removeClass("delcolor");
                        $(".user-del").removeAttr("disabled");
                    }

                },
                cache: false,
            });
            return false;
        } else {
            return false;
        }
    });
    // ============================================================== 
    // End of Manage Profiles Page Ajax
    // ============================================================== 

    // ============================================================== 
    // Start of settings Page Ajax
    // ============================================================== 

    $("#config-save").on('click', function (e) {

        var dashboard = $("#db-data").find("select, input").serializeArray().map(function (x) {
            this[x.name] = x.value;
            return this;
        }.bind({}))[0];
        var frontend = $("#fn-data").find("select, input").serializeArray().map(function (x) {
            this[x.name] = x.value;
            return this;
        }.bind({}))[0];
        var mail = $("#ml-data").find("select, input").serializeArray().map(function (x) {
            this[x.name] = x.value;
            return this;
        }.bind({}))[0];
        var configsave = $(this).val();

        e.preventDefault();
        $("#config-save").attr("disabled", "disabled");
        $("#ar-loader").addClass("loadershow");

        $.ajax({

            type: "POST",
            url: "inc/ajax-handler.php",
            //dataType: "json",
            //contentType: 'application/json;charset=utf-8',
            data: {

                'dashboard': JSON.stringify(dashboard),
                'frontend': JSON.stringify(frontend),
                'mail': JSON.stringify(mail),
                'configsave': configsave,
            },
            success: function (response) {
                $("#ar-loader").removeClass("loadershow");
                if (response == "YES") {
                    arSubmitResponse('success', 'Settings are Updated');
                } else if (response == "NO") {
                    arSubmitResponse('error', 'Something went wrong!');
                }
                //console.log(response);
                $("#config-save").removeAttr("disabled");
            },
            cache: false
        });
        return false;


    })
    // ============================================================== 
    // End of settings Page Ajax
    // ============================================================== 




});