<?php
/*
 * Single User page
 * This page used for managing single user profile
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "Single User"; //page-title
require_once("header.php");
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb" style="margin-bottom: 15px;">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title"><span>You are Managing <?php echo ucfirst($_GET["name"]); ?> Profile</span></h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Single Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Single Profile Section -->
<!-- ============================================================== -->
<?php
if ($_GET["type"] == "user") :
    $fuser_id = $_GET["id"];
    $user_update_sql = "SELECT * FROM ar_admin WHERE ar_userid='$fuser_id' limit 1";
    $userupdate_result = mysqli_query($conn, $user_update_sql);

    if (mysqli_num_rows($userupdate_result) > 0) {
        // output data of each row
        $usrupdata = mysqli_fetch_assoc($userupdate_result);
    } else {
        echo "<script>alert('Selected User not found! Please try Again.');location.href = 'manage-users.php';</script>";
    }
    mysqli_close($conn);
?>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 ar-common-minheight">
                <div class="card">
                    <form id="authform" class="form-horizontal" method="POST">
                        <input type="hidden" id="authid" value="<?php echo $usrupdata['ar_userid']; ?>" required>
                        <div id="profilefm" class="card-body">
                            <h4 class="card-title mb-4">Personal Info</h4>
                            <div class="form-group row">
                                <label for="authname" class="col-sm-3 text-right control-label col-form-label">Author
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="authname" value="<?php echo $usrupdata['ar_authorname']; ?>" placeholder="New Author Name Here" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="authusername" class="col-md-3 text-right control-label col-form-label">User Name
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="authusername" value="<?php echo $usrupdata['ar_username']; ?>" placeholder="User Name Here" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="authemail" class="col-sm-3 text-right control-label col-form-label">Email
                                    Id</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="authemail" value="<?php echo $usrupdata['ar_authemail']; ?>" placeholder="Author Email Here" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="authcompany" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="authcompany" value="<?php echo $usrupdata['ar_company']; ?>" placeholder="Company Name Here">
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
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" id="authorupdate" value="submit" class="btn badge-info">Update</button>
                                <a href="manage-users.php" class="btn btn-secondary">Return</a>
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
    </script>
<?php
else :
    echo "<script>alert('Something Went Wrong! Please try Again.');location.href = 'manage-users.php';</script>";
endif;
require_once("footer.php"); ?>