<?php
/*
 * New profile page
 * This page used for Adding new Profile
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "Profile"; //page-title
require_once("header.php");
if (arUserIdentifier($conn, $loginuser, 3) !== "superadmin") { //role test
    echo "<script>location.href='home.php'</script>";
    die();
}

?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb" style="margin-bottom: 15px;">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add New Author</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<!-- ============================================================== -->
<!-- Profile Section -->
<!-- ============================================================== -->

<div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="row justify-content-center">
        <div class="col-md-6 ar-common-minheight">
            <div class="card">
                <form id="authform" class="form-horizontal" method="POST">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Your Personal Info</h4>
                        <div class="form-group row">
                            <label for="authname" class="col-sm-3 text-right control-label col-form-label">Author
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="authname" placeholder="New Author Name Here" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="authusername" class="col-md-3 text-right control-label col-form-label">User Name
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="authusername" placeholder="User Name Here" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="authemail" class="col-sm-3 text-right control-label col-form-label">Email
                                Id</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="authemail" placeholder="Author Email Here" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="authcompany" class="col-sm-3 text-right control-label col-form-label">Company</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="authcompany" placeholder="Company Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="authavtar" class="col-sm-3 text-right control-label col-form-label">Avatar</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="authavtar" placeholder="Profile Image Here">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"></span>
                                    </div>
                                </div>

                                <!--  -->
                                <div id="roxyCustomPanel2" style="display: none;">
                                    <iframe src="deps/fileman/media.html?integration=custom&type=files&txtFieldId=authavtar" style="width:100%;height:100%" frameborder="0">
                                    </iframe>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="authpass" class="col-sm-3 text-right control-label col-form-label">New
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="authpass" placeholder="Password Here" style="padding-right: 30px;" required>
                                <div toggle="#authpass" class="fa fa-fw fa-eye eyefield-icon toggle-password"></div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="authcmpass" class="col-sm-3 text-right control-label col-form-label">Conform
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="authcmpass" placeholder="Reenter Password Here" required>
                                <div toggle="#authcmpass" class="fa fa-fw fa-eye eyefield-icon toggle-password"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Select Role</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" id="authrole" required>
                                    <option selected="selected" value="" disabled>Select User Role</option>
                                    <option value="superadmin">Super Admin</option>
                                    <option value="author">Author</option>
                                </select>
                                <small class="text-muted know-more-doc"><a href="#">Click to Know More About User
                                        Rights</a></small>
                            </div>
                        </div>

                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" id="authsubmit" value="submit" class="btn badge-info">Create</button>
                            <div id="ar-loader" class="reverse-spinner"></div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    //arSubmitResponse('alert', 'Not valid username!');
    //file browser init
    $('#authavtar').click(function() {
        $('#roxyCustomPanel2').dialog({
            modal: true,
            width: 700,
            height: 500
        });

    });

    function closeCustomRoxy2() {
        $('#roxyCustomPanel2').dialog('close');
    };

    $("#authusername").on('focus', function() { //remove invalid class if exists
        if ($(this).hasClass('is-invalid')) {
            $(this).removeClass('is-invalid');
        }
    });

    $("#authemail").on('focus', function() { //remove invalid class if exists
        if ($(this).hasClass('is-invalid')) {
            $(this).removeClass('is-invalid');
        }
    });

    function arPasswordMatch() { // change password box focus color if not match
        var authpass = $("#authpass").val();
        var authcmpass = $("#authcmpass").val();
        if (authpass != authcmpass) {
            $("#authcmpass").addClass("is-invalid");
        } else {
            $("#authcmpass").removeClass("is-invalid");
        }
    }
    $("#authcmpass").keyup(arPasswordMatch);


    $(".toggle-password").click(function() { // Password  visibility

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

<?php require_once("footer.php"); ?>