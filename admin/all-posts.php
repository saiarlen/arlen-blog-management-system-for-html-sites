<?php
/*
 * Add new post page
 * This page used for managing add Posts
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title= "All Posts";//page-title
require_once("header.php");
$page_scripts = TRUE; //For Enabling Custom Scripts in footer


?>
<style>
@Media(min-width: 769px) {
    #all-posts {
        min-height: 80vh;
    }
}

.comment-widgets .comment-row {
    padding-left: 21px;
}

.customcheckbox {
    padding-left: 28px;
}

.cs-child {
    margin-top: 22px;
}

.d-flex.flex-row.comment-row {
    border-bottom: solid 1px #e4e0e0;
}

.comment-widgets:first-child {
    margin-top: 0;
}

.d-flex.flex-row.comment-row {
    margin-bottom: 0;
    margin-top: 0;
}

span.text-muted.float-right {
    margin-top: -10px;
    margin-bottom: 10px;
}

.sf-left {
    float: right;
}

@media (max-width:767px) {
    img.rounded-circle {
        display: none;
    }

    button.btn {
        margin-bottom: 3px;
    }

    .sf-left {
        float: left;
        margin-top: 15px;
    }
}

input.form-control.form-control-sm {
    display: inline-block !important;
    width: auto;
    margin-left: 6px;

}

.pg-nav {
    float: right;
}

ul.pagination {
    margin-bottom: 0;
}

nav.pg-nav {
    display: flex;
}

.pag-disable {
    z-index: 2;
    color: #381be7;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}
</style>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb" style="margin-bottom: 15px;">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">All Posts</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Posts</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div id="all-posts" class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="page-pag row">
        <div class="col-md-12">
            <div class="info-none-text">
                <h5>No Posts Avaliable</h5>
            </div>
            <div class="card">
                <div class="card-body row">

                    <div class="col" style="max-width: 35px;">
                        <!-- Check Box parent -->
                        <label class="customcheckbox m-b-20">
                            <input type="checkbox" id="mainCheckbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="col">
                        <h4 class="card-title m-b-0">Your Posts</h4>
                    </div>
                    <div class="col">
                        <div class="sf-left">
                            <input type="text" placeholder="search" data-search />
                        </div>
                    </div>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Post Row -->
                    <div class="d-flex flex-row comment-row" data-filter-item data-filter-name="apple">
                        <!-- Check Box Child -->
                        <label class="customcheckbox cs-child">
                            <input type="checkbox" name='delete[]' id="catdel" value="" class="listCheckbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="p-2">
                            <img src="https://dummyimage.com/600x600/666666/fff" alt="user" width="50"
                                class="rounded-circle">
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">James Anderson</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type
                                setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-right">
                                    April 14, 2016<br>
                                    By: Admin
                                </span>
                                <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                <button type="button" class="btn btn-success btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </div>
                        </div>
                    </div>
                    <!-- Post Row -->
                    <div class="d-flex flex-row comment-row" data-filter-item data-filter-name="mango">
                        <label class="customcheckbox cs-child">
                            <input type="checkbox" name='delete[]' id="catdel" value="" class="listCheckbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="p-2">
                            <img src="https://dummyimage.com/600x600/666666/fff" alt="user" width="50"
                                class="rounded-circle">
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">James Anderson Lorem Ipsm</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type
                                setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-right">
                                    April 14, 2016<br>
                                    By: Admin
                                </span>
                                <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                <button type="button" class="btn btn-success btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </div>
                        </div>
                    </div>
                    <!-- Post Row -->
                    <div class="d-flex flex-row comment-row" data-filter-item data-filter-name="mango">
                        <label class="customcheckbox cs-child">
                            <input type="checkbox" name='delete[]' id="catdel" value="" class="listCheckbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="p-2">
                            <img src="https://dummyimage.com/600x600/666666/fff" alt="user" width="50"
                                class="rounded-circle">
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">James Anderson Lorem Ipsm1</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type
                                setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-right">
                                    April 14, 2016<br>
                                    By: Admin
                                </span>
                                <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                <button type="button" class="btn btn-success btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </div>
                        </div>
                    </div>
                    <!-- Post Row -->
                    <div class="d-flex flex-row comment-row" data-filter-item data-filter-name="mango">
                        <label class="customcheckbox cs-child">
                            <input type="checkbox" name='delete[]' id="catdel" value="" class="listCheckbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="p-2">
                            <img src="https://dummyimage.com/600x600/666666/fff" alt="user" width="50"
                                class="rounded-circle">
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">James Anderson Lorem Ipsm2</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type
                                setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-right">
                                    April 14, 2016<br>
                                    By: Admin
                                </span>
                                <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                <button type="button" class="btn btn-success btn-sm">View</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">

            <nav class="pg-nav" aria-label="Page navigation">
                <span class="page-item">
                    <a class="pre page-link" href="javascript:void(0)" aria-label="Previous" disabled>
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </span>
                <ul class="pagination">

                </ul>
                <span class="page-item">
                    <a class="nex page-link" href="javascript:void(0)" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span>
                    </a>
                </span>
            </nav>

        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<!-- Only This page Script -->
<?php 
function csAllposts(){
    echo '<script src="deps/js/all-posts.js"></script>';
}
   
?>

<?php require_once("footer.php"); ?>