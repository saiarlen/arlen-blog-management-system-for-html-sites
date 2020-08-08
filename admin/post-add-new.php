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
    <form class="form-horizontal">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="p-title">Add Title</label>
                            <input type="text" class="form-control" name="p-title" id="p-title" placeholder="Post Title"> 
                        </div>
                        <div class="form-group row">
                            <label>Select Categories</label>
                            <select class="select2 form-control m-t-15" multiple="multiple" name="p-cat[]" id="p-cat" style="height: 36px;width: 100%;">
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                
                            </select>
                        </div>
                            <div class="form-group row">
                            <label>Select Tags</label>
                            <select class="select2 form-control m-t-15" multiple="multiple" name="p-tag[]" id="p-tag" style="height: 36px;width: 100%;">
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                
                            </select>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="col-md-6">
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
                        <h4 class="card-title">Quill Editor</h4>
                        <!-- Create the editor container -->
                        <div id="editor" style="height: 300px;">
                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- submit button-->
        <div class="card">
            <div class="card-body">
                <div class="row ">
            
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label>Set Featured Image</label>
                           
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="all-posts.php" class="btn btn-secondary post-btn">View All Posts</a>
                        <button id="post_submit" type="submit" value="post_insert" class="btn btn-info post-btn">Add New</button>
                        
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
<script>
    $(".select2").select2();
    $('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
</script>



<?php require_once("footer.php"); ?>