<?php
/*
 * Profile page
 * This page used for managing Author profile
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "My Profile"; //page-title
require_once("header.php");

$user_update_sql = "SELECT * FROM ar_admin WHERE ar_username= '$loginuser' limit 1";
$userupdate_result = mysqli_query($conn, $user_update_sql);

if (mysqli_num_rows($userupdate_result) > 0) {

    $userupdata =  mysqli_fetch_assoc($userupdate_result);
} else {
    echo "<script>alert('Somethng Wrong! Please try Again.');location.href = 'add-new-profile.php';</script>";
}

?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb" style="margin-bottom: 15px;">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title"><span><?php arUserIdentifier($conn, $loginuser, 0); ?> Profile</span></h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- My Profile Section -->
<!-- ============================================================== -->

<div class="container-fluid">
    <!-- Button trigger modal -->

    <div class="row justify-content-center">

        <div class="col-md-6 ar-common-minheight">

            <div class="card">
                <form id="authform" class="form-horizontal" method="POST">
                    <input type="hidden" id="authid" value="<?php echo $userupdata['ar_userid']; ?>" required>
                    <div id="profilefm" class="card-body">
                        <h4 class="card-title mb-4">Your Personal Info</h4>
                        <div class="form-group row">
                            <label for="authname" class="col-sm-3 text-right control-label col-form-label">Author
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="authname" value="<?php echo $userupdata['ar_authorname']; ?>" placeholder="New Author Name Here" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="authusername" class="col-md-3 text-right control-label col-form-label">User Name
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="authusername" value="<?php echo $userupdata['ar_username']; ?>" placeholder="User Name Here" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="authemail" class="col-sm-3 text-right control-label col-form-label">Email
                                Id</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="authemail" value="<?php echo $userupdata['ar_authemail']; ?>" placeholder="Author Email Here" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="authcompany" class="col-sm-3 text-right control-label col-form-label">Company</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="authcompany" value="<?php echo $userupdata['ar_company']; ?>" placeholder="Company Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="authavtar" class="col-sm-3 text-right control-label col-form-label">Avatar</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="authavtar" placeholder="Select to Update Image">
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
                        <div class="chngwrapper">
                            <span id="chngpass" class="badge badge-pill badge-secondary">Change Password</span>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                    <!-- Change Password fields -->
                    <!-- ============================================================== -->
                    <div id="changepsfm" class="card-body">
                        <h4 class="card-title mb-4">Change Your Password</h4>
                        <div class="form-group row">
                            <label for="authpass" class="col-sm-3 text-right control-label col-form-label">Current
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="authcurnpass" value="" placeholder="Password Here" style="padding-right: 30px;" required>
                                <div toggle="#authcurnpass" class="fa fa-fw fa-eye eyefield-icon toggle-password"></div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="authpass" class="col-sm-3 text-right control-label col-form-label">New
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="authpass" value="" placeholder="Password Here" style="padding-right: 30px;" required>
                                <div toggle="#authpass" class="fa fa-fw fa-eye eyefield-icon toggle-password"></div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="authcmpass" class="col-sm-3 text-right control-label col-form-label">Conform
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="authcmpass" value="" placeholder="Reenter Password Here" required>
                                <div toggle="#authcmpass" class="fa fa-fw fa-eye eyefield-icon toggle-password"></div>
                            </div>
                        </div>
                        <div class="chngwrapper">
                            <span id="chngprof" class="badge badge-pill badge-secondary">Back to Profile</span>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!--End Change Password fields -->
                    <!-- ============================================================== -->

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" id="authorupdate" value="submit" class="btn badge-info">Update</button>
                            <button type="submit" id="passupdate" value="submit" class="btn badge-info">Change</button>
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

    $('#chngpass').on("click", function() {
        passupdate
        $("#profilefm").hide();
        $("#authorupdate").hide();
        $("#changepsfm").fadeIn();
        $("#passupdate").fadeIn();
    });
    $('#chngprof').click(function() {

        $("#changepsfm").hide();
        $("#passupdate").hide();
        $("#profilefm").fadeIn();
        $("#authorupdate").fadeIn();
    });
</script>

<?php require_once("footer.php"); ?>