<?php
/*
 * Settings page
 * This page used for app settings
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "Media"; //page-title
require_once("header.php");
if (arUserIdentifier($conn, $loginuser, 3) !== "superadmin") { //role test
    echo "<script>location.href='home.php'</script>";
    die();
}

//initing settings 
// dashboard array added in header
$appfrontend = json_decode($appSettings[1], true);
$appfmail = json_decode($appSettings[2], true);
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">ABMS v1.0</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Settings Section -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 ar-common-minheight">
            <form id="settings-form" class="form-horizontal" method="POST">
                <div class="card">
                    <div class="card-body">
                        <!-- ------------------------Dashboard --------------------- -->
                        <div id="db-data">
                            <h5 class="card-title m-b-0">Dashboard Settings</h5>
                            <!-- Row Start -->
                            <div class="row">
                                <!-- Logo1 Input -->
                                <div class="col-md-4">
                                    <div class="form-group m-t-20">
                                        <label>Icon Logo <small class="text-muted">Recommended Size
                                                40x34</small></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $appdboard['iconlogo'] ?>" name="iconlogo" id="iconlogo" placeholder="Select Your Icon Logo">
                                            <div class="input-group-append">
                                                <span class="input-group-text basic-addon2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Logo2 Input -->
                                <div class="col-md-4">
                                    <div class="form-group m-t-20">
                                        <label>Text Logo <small class="text-muted">Recommended Size
                                                148x32</small></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $appdboard['txtlogo'] ?>" name="txtlogo" id="txtlogo" placeholder="Select Your Text Logo">
                                            <div class="input-group-append">
                                                <span class="input-group-text basic-addon2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Favicon Input -->
                                <div class="col-md-4">
                                    <div class="form-group m-t-20">
                                        <label>Favicon <small class="text-muted">Recommended Size 32x32</small></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $appdboard['favic'] ?>" name="favic" id="favic" placeholder="Select Your Favicon">
                                            <div class="input-group-append">
                                                <span class="input-group-text basic-addon2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <div id="roxyCustomPanel2" style="display: none;">
                                    <iframe src="deps/fileman/media.html?integration=custom&type=files&txtFieldId=iconlogo" style="width:100%;height:100%" frameborder="0">
                                    </iframe>
                                </div>
                                <div id="roxyCustomPanel3" style="display: none;">
                                    <iframe src="deps/fileman/media.html?integration=custom&type=files&txtFieldId=txtlogo" style="width:100%;height:100%" frameborder="0">
                                    </iframe>
                                </div>
                                <div id="roxyCustomPanel4" style="display: none;">
                                    <iframe src="deps/fileman/media.html?integration=custom&type=files&txtFieldId=favic" style="width:100%;height:100%" frameborder="0">
                                    </iframe>
                                </div>
                                <!--  -->
                            </div>
                            <!-- Row End -->
                            <!-- Row Start -->
                            <div class="row m-t-10">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title Prefix <small class="text-muted">Comman Prefix of Page
                                                Title</small></label>
                                        <input type="text" class="form-control" value="<?php echo $appdboard['titlepfx'] ?>" name="titlepfx" id="titlepfx" placeholder="Prefix Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Post Limit <small class="text-muted">Limit the Number of Posts in All
                                                Posts
                                                Page</small></label>
                                        <input type="number" class="form-control" value="<?php echo $appdboard['dashbpl'] ?>" name="dashbpl" id="dashbpl" placeholder="Enter Value">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Disqus URL <small class="text-muted">Create a Free Disqus Account <a href="https://disqus.com/home/" target="_blank">Here</a></small></label>
                                        <input type="text" class="form-control" id="disqusurl" value="<?php echo $appdboard['disqusurl'] ?>" name="disqusurl" placeholder="Paste Url">
                                    </div>
                                </div>
                            </div>
                            <!-- Row End -->
                            <!-- Row Start -->
                            <div class="row m-t-10">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Help Tab <small class="text-muted">Display/Hide Help Menu
                                                Item</small></label>

                                        <select class="select2 form-control custom-select" name="htab" id="htab">
                                            <?php
                                            if ($appdboard['htab'] == "1") {

                                            ?>
                                                <option selected="selected" value="1">Enable</option>
                                                <option value="0">Disable</option>
                                            <?php
                                            } elseif ($appdboard['htab'] == "0") {

                                            ?>
                                                <option value="1">Enable</option>
                                                <option selected="selected" value="0">Disable</option>
                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Custom RSS URL<small class="text-muted"> For News Feed on
                                                Dashboard</small></label>
                                        <input type="text" class="form-control" value="<?php echo $appdboard['rssurl'] ?>" name="rssurl" id="rssurl" placeholder="Paste Url">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>App Key Status <small class="text-success">Active</a></small></label>
                                        <input type="text" class="form-control" id="fapikey" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row End -->
                        <!-- ------------------------Frontend --------------------- -->
                        <div class="border-top m-b-20 m-t-10"></div>

                        <h5 class="card-title m-b-20">User Frontend Settings</h5>
                        <div id="fn-data">
                            <!-- Row Start -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Post Limit <small class="text-muted">Limit the Number of Posts on
                                                Website</small></label>
                                        <input type="number" class="form-control" value="<?php echo $appfrontend['frontpl'] ?>" name="frontpl" id="frontpl" placeholder="Enter Value">
                                        <input type="hidden" id="disqusurlf" name="disqusurlf">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Post Order <small class="text-muted">Display Post Order on
                                                Website</small></label>
                                        <select class="select2 form-control custom-select" name="fpsorder" id="fpsorder">
                                            <?php if ($appfrontend['fpsorder'] == "DESC") {
                                            ?>
                                                <option selected="selected" value="DESC">New</option>
                                                <option value="ASC">Old</option>
                                            <?php
                                            } elseif ($appfrontend['fpsorder'] == "ASC") {
                                            ?>
                                                <option value="DESC">New</option>
                                                <option selected="selected" value="ASC">Old</option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Comments <small class="text-muted">On/Off Disqus Comments</small></label>
                                        <select class="select2 form-control custom-select" name="fcomments" id="fcomments">
                                            <?php if ($appfrontend['fcomments'] == "1") {
                                            ?>
                                                <option selected="selected" value="1">On</option>
                                                <option value="0">Off</option>
                                            <?php
                                            } elseif ($appfrontend['fcomments'] == "0") {
                                            ?>
                                                <option value="1">On</option>
                                                <option selected="selected" value="0">Off</option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- ------------------------Mail Settings--------------------- -->
                        <div class="border-top m-b-20 m-t-10"></div>
                        <h5 class="card-title m-b-20">Mail SMTP Settings</h5>
                        <div id="ml-data">

                            <!-- Row Start -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SMTP Type</label>
                                        <select class="select2 form-control custom-select" name="smtptype" id="smtptype">
                                            <?php if ($appfmail['smtptype'] == "google") {
                                            ?>
                                                <option selected="selected" value="google">Gmail SMTP</option>
                                                <option value="other">Other</option>
                                            <?php
                                            } elseif ($appfmail['smtptype'] == "other") {
                                            ?>
                                                <option value="google">Gmail SMTP</option>
                                                <option selected="selected" value="other">Other</option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SMTP User Name</label>
                                        <input type="text" class="form-control" value="<?php echo $appfmail['smtpuser'] ?>" name="smtpuser" id="smtpuser" placeholder="Enter Value">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SMTP User Password</label>
                                        <input type="password" class="form-control" value="<?php echo $appfmail['smtppass'] ?>" name="smtppass" id="smtppass" placeholder="Enter Value">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SMTP From Id</label>
                                        <input type="text" class="form-control" value="<?php echo $appfmail['smtpfrom'] ?>" name="smtpfrom" id="smtpfrom" placeholder="Enter Id">
                                    </div>
                                </div>
                            </div>
                            <!-- Row End -->
                            <!-- Row Start -->
                            <div id="smtypebase" class="row m-t-10 dlogic">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>SMTP Host Name</label>
                                        <input type="text" class="form-control" value="<?php echo $appfmail['smtphost'] ?>" name="smtphost" id="smtphost" placeholder="Enter Value">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>SMTP Secure </label> <small class="text-muted">SSL/TLS</small>
                                        <input type="text" class="form-control" value="<?php echo $appfmail['smtpsec'] ?>" name="smtpsec" id="smtpsec" placeholder="Enter Value">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>SMTP Port</label>
                                        <input type="text" class="form-control" value="<?php echo $appfmail['smtpport'] ?>" name="smtpport" id="smtpport" placeholder="Enter Value">
                                    </div>
                                </div>
                            </div>
                            <!-- Row End -->
                        </div>

                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" id="config-save" value="submit" class="btn badge-info">Save
                                Settings</button>
                            <div id="ar-loader" class="reverse-spinner"></div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    //file browser init
    $('#iconlogo').click(function() {
        $('#roxyCustomPanel2').dialog({
            modal: true,
            width: 700,
            height: 500
        });

    });
    $('#txtlogo').click(function() {
        $('#roxyCustomPanel3').dialog({
            modal: true,
            width: 700,
            height: 500
        });

    });
    $('#favic').click(function() {
        $('#roxyCustomPanel4').dialog({
            modal: true,
            width: 700,
            height: 500
        });

    });

    function closeCustomRoxy2() {
        $('#roxyCustomPanel2').dialog('close');
    };

    function closeCustomRoxy3() {
        $('#roxyCustomPanel3').dialog('close');
    };

    function closeCustomRoxy4() {
        $('#roxyCustomPanel4').dialog('close');
    };

    //for Smtp type Logic
    $("#smtptype").change(function() {
        if ($(this).val() == "other") {
            $("#smtypebase").removeClass("dlogic");
        } else {
            $("#smtypebase").addClass("dlogic");
        }

    })
    if ($("#smtptype").val() == "other") {
        $("#smtypebase").removeClass("dlogic");
    }

    $('#disqusurl').change(function() {
        $('#disqusurlf').val($(this).val());
    });
</script>

<?php require_once("footer.php"); ?>