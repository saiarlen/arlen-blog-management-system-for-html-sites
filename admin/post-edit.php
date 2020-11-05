<?php
/*
 * Post edits page
 * This page used for editing post fields
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "Edit-" . ucfirst($_GET["type"]); //page-title
require_once("header.php");
require_once("inc/post-handle.php");

?>


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb" style="margin-bottom: 15px;">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit <?php echo ucfirst($_GET["type"]) ?></h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit <?php echo ucfirst($_GET["type"]) ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Post edit -->
<!-- ============================================================== -->
<?php

if ($_GET["type"] == "post") :

    arUpdatePost($conn); //update handle
    $response_msg =  arUpdatePost($conn);

    //retrieve data
    $pos_id = $_GET["id"];
    $pos_update_sql = "SELECT * FROM ar_posts WHERE post_id=" . $pos_id . " LIMIT 1";
    $posupdate_result = mysqli_query($conn, $pos_update_sql);

    if (mysqli_num_rows($posupdate_result) == 1) {
        // output data of each row
        while ($pos_update_row = mysqli_fetch_assoc($posupdate_result)) {

            $pos_update_id = $pos_update_row['post_id'];
            $pos_update_title =  $pos_update_row['post_title'];
            $pos_update_url = $pos_update_row['post_url'];
            $pos_update_cats = $pos_update_row['post_category'];
            $pos_update_tags =  $pos_update_row['post_tags'];
            $pos_update_kws = $pos_update_row['post_kws'];
            $pos_update_des = $pos_update_row['post_des'];
            $pos_update_date =  $pos_update_row['post_date'];
            $pos_update_content = $pos_update_row['post_content'];
            $pos_update_img = $pos_update_row['post_img'];
            $pos_update_exp =  $pos_update_row['post_exp'];
            $pos_update_alt =  $pos_update_row['post_imgalt'];
            $pos_update_author =  $pos_update_row['post_author'];
        }

        //Changing date format
        $pos_dis_date = new DateTime($pos_update_date);
        $pos_up_date = $pos_dis_date->format("d-m-Y");

        //Converting into arrays
        $ar_pos_update_cats = explode(",", $pos_update_cats);
        $ar_pos_update_tags = explode(",", $pos_update_tags);
    } else {

        echo  '<script>arSubmitResponse("error", "Something went wrong! Please try again.")</script>';
    }

?>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div id="post_res" class="alert alert-success" role="alert" style="display:none;">Post Updated Successfully</div>
        <form id="post_form" class="form-horizontal" method="POST">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="p-title">Add Title</label>
                                <input type="text" class="form-control" name="p-title" value="<?php echo $pos_update_title; ?>" id="p-title" placeholder="Post Title">
                                <input type="hidden" name="post-uniq-id" value="<?php echo $pos_update_id; ?>">
                            </div>
                            <div class="form-group row">
                                <label>Select Categories</label>
                                <select class="select2 form-control m-t-15" multiple="multiple" name="p-cat[]" id="p-cat" style="height: 36px;width: 100%;">
                                    <?php
                                    $cat_query = "SELECT * FROM ar_categories ORDER BY cat_id DESC";
                                    $cat_final_all_data = mysqli_query($conn, $cat_query);
                                    if (mysqli_num_rows($cat_final_all_data) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($cat_final_all_data)) {
                                            $ar_catup_sel = "selected";

                                            if (in_array($row["cat_id"], $ar_pos_update_cats)) {

                                                $ar_catup_sel = "selected";
                                            } else {
                                                $ar_catup_sel = "";
                                            }
                                    ?>
                                            <option value="<?php echo $row["cat_id"]; ?>" <?php echo $ar_catup_sel; ?>>
                                                <?php echo $row["cat_name"]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label>Select Tags</label>
                                <select class="select2 form-control m-t-15" multiple="multiple" name="p-tag[]" id="p-tag" style="height: 36px;width: 100%;">
                                    <?php
                                    $tag_query = "SELECT * FROM ar_tags ORDER BY tag_id DESC";
                                    $tag_final_all_data = mysqli_query($conn, $tag_query);

                                    if (mysqli_num_rows($tag_final_all_data) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($tag_final_all_data)) {

                                            if (in_array($row["tag_id"], $ar_pos_update_tags)) {

                                                $ar_tagup_sel = "selected";
                                            } else {
                                                $ar_tagup_sel = "";
                                            }
                                    ?>
                                            <option value="<?php echo $row["tag_id"]; ?>" <?php echo $ar_tagup_sel; ?>>
                                                <?php echo $row["tag_name"]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="p-keywords">Add Page Keywords <small class="text-muted">Optional</small></label>
                                <input type="text" class="form-control" name="p-keywords" value="<?php echo $pos_update_kws; ?>" id="p-keywords" placeholder="Keywords">
                            </div>
                            <div class="form-group row m-t-20">
                                <label for="p-des">Add Page Description <small class="text-muted">Optional</small></label>
                                <textarea class="form-control" name="p-des" id="p-des"><?php echo $pos_update_des; ?></textarea>
                            </div>
                            <div class="row">
                                <label>Select Post Date <small class="text-muted">Optional</small></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="datepicker-autoclose" value="<?php echo $pos_up_date; ?>" id="datepicker-autoclose" placeholder="yyyy/dd/mm">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- editor -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <textarea name="editor1"><?php echo $pos_update_content; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Post Iamge and Excerpt Section-->
            <div class="card">
                <div class="card-body">
                    <div class="row ">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Set Featured Image</label>
                                    <div class="input-group">
                                        <input type="text" id="txtSelectedFile" name="p-image" value="<?php echo $pos_update_img; ?>" placeholder="Post Image" class="form-control">

                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"></span>
                                        </div>
                                        <div id="roxyCustomPanel2" style="display: none;">
                                            <iframe src="deps/fileman/media.html?integration=custom&type=files&txtFieldId=txtSelectedFile" style="width:100%;height:100%" frameborder="0">
                                            </iframe>
                                        </div>
                                    </div>
                                    <input class="alt-input" type="text" name="img-alt" value="<?php echo $pos_update_alt; ?>" id="img-alt" placeholder="Image Alt Text">
                                </div>
                                <div class="col-md-4">
                                    <img src="deps/img/tumb.jpg" id="postTumb" alt="post">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="p-des">Post Excerpt <small class="text-muted">Optional</small></label>
                                <textarea class="form-control" name="p-exp" id="p-exp"><?php echo $pos_update_exp; ?></textarea>
                                <span class="f-span-text">Excerpt is a short description about the post. You can use first
                                    para of post content</span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Post Submit -->
            <div class="card">
                <div class="card-body">
                    <div class="row ">

                        <div class="col-md-12">
                            <input type="hidden" name="pauthor" value="<?php arUserIdentifier($conn, $loginuser, 0) ?>">
                            <span class="badge badge-light m-t-10">Added By <?php echo $pos_update_author ?></span>

                            <a href="all-posts.php" class="btn btn-secondary post-btn">View All Posts</a>
                            <button id="post_submit" type="submit" name="post_submit" value="post_insert" class="btn btn-info post-btn">Update</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    <!-- This page Scripts all -->

    <script src="deps/js/select2.full.min.js"></script>
    <script src="deps/js/select2.min.js"></script>
    <script src="deps/js/bootstrap-datepicker.min.js"></script>
    <script src="deps/ckeditor/ckeditor.js"></script>

    <script>
        $(".select2").select2();
        $('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
        });

        if ($('#txtSelectedFile').val().length !== 0) {
            var imginputVal = $('#txtSelectedFile').val(); //for testing image input val empty or not 
            $('#postTumb').attr('src', imginputVal);
        }

        //file browser init

        $('#txtSelectedFile').click(function() {
            $('#roxyCustomPanel2').dialog({
                modal: true,
                width: 700,
                height: 500
            });

        });

        function closeCustomRoxy2() {
            $('#roxyCustomPanel2').dialog('close');
            var inputVal = $('#txtSelectedFile').val();
            $('#postTumb').attr('src', inputVal);
        };


        //CKEDIT init
        var roxyFileman = 'deps/fileman/media.html';
        $(function() {
            CKEDITOR.replace('editor1', {
                filebrowserBrowseUrl: roxyFileman,
                filebrowserImageBrowseUrl: roxyFileman + '?type=image',
                removeDialogTabs: 'link:upload;image:upload'
            });
        });
    </script>

    <?php



    ?>

<?php
else :
    echo "<script>alert('Something Went Wrong! Please try Again.');location.href = 'all-posts.php';</script>";
endif;
//Close connection
mysqli_close($conn);
?>
<!-- ============================================================== -->
<!-- End of Post edit -->
<!-- ============================================================== -->

<?php require_once("footer.php");

if ($response_msg == "success") {

    echo '<script>arPostResponse(); arSubmitResponse("success", "Post Updated Successfully")</script>';
} elseif ($response_msg == "error") {
    echo '<script>arPostResponse(); arSubmitResponse("error", "Something went wrong! Please try again.")</script>';
}
?>