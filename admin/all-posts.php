<?php
/*
 * Add new post page
 * This page used for managing add Posts
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "All Posts"; //page-title
require_once("header.php");

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
            <h4 class="page-title">All Your Posts</h4>
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
            <form id="pos_in_form" class="form-horizontal" method="POST">
                <div class="card">
                    <div class="card-body row">
                        <div class="col" style="max-width: 35px; padding-top: 4px;">
                            <!-- Check Box parent -->
                            <label class="customcheckbox m-b-20">
                                <input type="checkbox" id="mainCheckbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col">
                            <button type="submit" value="Delete" name="pos_delete" id="pos_delete" class="btn btn-light btn-sm">Delete</button>
                        </div>
                        <div class="col">
                            <div class="sf-left">
                                <input type="text" placeholder="search" data-search />
                            </div>
                        </div>
                    </div>
                    <div class="comment-widgets scrollable">
                        <!-- Post Row -->
                        <?php
                        //Php script for retriving data from database

                        $post_query = "SELECT * FROM ar_posts ORDER BY post_id DESC";
                        $post_final_all_data = mysqli_query($conn, $post_query);

                        if (mysqli_num_rows($post_final_all_data) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($post_final_all_data)) {
                        ?>
                                <div class="d-flex flex-row comment-row" data-filter-item data-filter-name="<?php echo strtolower($row["post_title"]); ?>">
                                    <!-- Check Box Child -->
                                    <label class="customcheckbox cs-child">
                                        <input type="checkbox" name='delete[]' id="posdel" value="<?php echo $row["post_id"]; ?>" class="listCheckbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <div class="p-2">
                                        <img src="<?php echo $row["post_img"]; ?>" alt="<?php echo $row["post_imgalt"]; ?>" width="50" height="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100">
                                        <h5 class="font-medium"><?php echo $row["post_title"]; ?></h5>
                                        <span class="m-b-15 d-block"><?php echo arLimitExcerpt($row["post_exp"], 10); ?></span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">
                                                <?php //echo $row["post_date"]; 

                                                $dis_date = new DateTime($row["post_date"]);
                                                $date = $dis_date->format("F d, Y");
                                                echo $date;

                                                ?><br>
                                                By: <?php echo $row["post_author"]; ?>
                                            </span>
                                            <a href="post-edit.php?type=post&id=<?php echo $row["post_id"]; ?>" class="btn btn-cyan btn-sm">Edit</a>
                                            <a href="post-view.php?id=<?php echo $row["post_id"]; ?>" target="_blank" class="btn btn-success btn-sm">View</a>
                                            <button type="submit" id="del_btn_single" name="del_btn_single" value="<?php echo $row["post_id"]; ?>" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }

                        ?>
                    </div>
                </div>
            </form>
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
<script>
    pageSize = "<?php arFn($appdboard['dashbpl'], 5); ?>";
</script>
<?php require_once("footer.php"); ?>