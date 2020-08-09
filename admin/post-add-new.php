<?php
/*
 * Add new post page
 * This page used for managing add Posts
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title= "Add New Post"; //page-title
require_once("header.php");

?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb" style="margin-bottom: 15px;">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add Post</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Post</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


 <!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <form class="form-horizontal" method="GET">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="p-title">Add Title</label>
                            <input type="text" class="form-control" name="p-title" id="p-title" placeholder="Post Title"> 
                        </div>
                        <div class="form-group row">
                            <label>Select Categories</label>
                            <select class="select2 form-control m-t-15" multiple="multiple" name="p-cat[]" id="p-cat" style="height: 36px;width: 100%;">
                             <?php 
                                $cat_query = "SELECT * FROM ar_categories ORDER BY id DESC";
                                $cat_final_all_data = $conn->query($cat_query);

                                if ($cat_final_all_data->num_rows > 0) {
                                    // output data of each row
                                    while($row = $cat_final_all_data->fetch_assoc()) {
                             ?>  
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["cat_name"]; ?></option>
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
                                    $tag_final_all_data = $conn->query($tag_query);

                                    if ($tag_final_all_data->num_rows > 0) {
                                        // output data of each row
                                        while($row = $tag_final_all_data->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row["tag_id"]; ?>"><?php echo $row["tag_name"]; ?></option>
                                
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
                            <input type="text" class="form-control" name="p-keywords" id="p-keywords" placeholder="Keywords"> 
                        </div>
                        <div class="form-group row m-t-20">
                            <label for="p-des">Add Page Description <small class="text-muted">Optional</small></label>
                            <textarea class="form-control" name="p-des" id="p-des"></textarea>
                        </div>
                        <div class="row">
                            <label>Select Post Date <small class="text-muted">Optional</small></label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="datepicker-autoclose" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
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
                       <textarea name="editor1"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- submit button-->
        <div class="card">
            <div class="card-body">
                <div class="row ">
            
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8">
                                <label>Set Featured Image</label>
                                <div class="input-group">
                                    <input type="text" id="txtSelectedFile" name="p-image" placeholder="Post Image" class="form-control">
                               
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"></span>
                                    </div>
                                    <div id="roxyCustomPanel2" style="display: none;">
                                        <iframe src="deps/fileman/media.html?integration=custom&type=files&txtFieldId=txtSelectedFile" style="width:100%;height:100%" frameborder="0">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="deps/img/tumb.jpg" id="postTumb" alt="post">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="all-posts.php" class="btn btn-secondary post-btn">View All Posts</a>
                        <button id="post_submit" type="submit" name="post_submit" value="post_insert" class="btn btn-info post-btn">Add New</button>
                        
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
        todayHighlight: true
    });

    //file browser init


    $('#txtSelectedFile').click(function(){
        $('#roxyCustomPanel2').dialog({modal:true, width:700,height:500});
         
    });
    function closeCustomRoxy2(){
    $('#roxyCustomPanel2').dialog('close');
      var inputVal = $('#txtSelectedFile').val();
      $('#postTumb').attr('src', inputVal);
    };

    //CKEDIT init
    var roxyFileman = 'deps/fileman/media.html'; 
    $(function(){
    CKEDITOR.replace( 'editor1',{filebrowserBrowseUrl:roxyFileman,
        filebrowserImageBrowseUrl:roxyFileman+'?type=image',
        removeDialogTabs: 'link:upload;image:upload'}); 
    });

</script>






<?php require_once("footer.php"); ?>