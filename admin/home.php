<?php
/*
 * Home page
 * This page used for Admin dashboard
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "Dashboard"; //page-title
require_once("header.php");
require_once("inc/visits-counter.php");
?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Welcome <?php arUserIdentifier($conn, $loginuser, 0); ?></h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                    <h6 class="text-white">Dashboard</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-note-multiple"></i></h1>
                    <h6 class="text-white">Posts: <?php arhomePage($conn, true, false, false) ?></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                    <h6 class="text-white">Categories: <?php arhomePage($conn, false, true, false) ?></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                    <h6 class="text-white">Tags: <?php arhomePage($conn, false, false, true) ?></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Posts</h4>
                </div>

                <div class="comment-widgets scrollable">
                    <?php
                    $post_query = "SELECT * FROM ar_posts ORDER BY post_id DESC LIMIT 3";
                    $post_final_all_data = mysqli_query($conn, $post_query);

                    if (mysqli_num_rows($post_final_all_data) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($post_final_all_data)) {
                    ?>
                            <div class="d-flex flex-row comment-row-dsh m-t-0">
                                <div class="p-2"><img src="<?php echo $row["post_img"]; ?>" alt="<?php echo $row["post_imgalt"]; ?>" width="50" height="50" class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><?php echo $row["post_title"]; ?></h6>
                                    <span class="m-b-15 d-block"><?php echo arLimitExcerpt($row["post_exp"], 10); ?></span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right"><?php //echo $row["post_date"]; 
                                                                                $dis_date = new DateTime($row["post_date"]);
                                                                                $date = $dis_date->format("F d, Y");
                                                                                echo $date;
                                                                                ?></span>
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

        </div>
        <div class="col-md-5">
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">Blog Stats</h4>
                    <div class="row m-t-20">
                        <div class="col-6">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="fa fa-users m-b-5 font-16"></i>
                                <h5 class="m-b-0 m-t-5"><?php echo arTotalViews($conn); ?></h5>
                                <small class="font-light">Total Visits</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="fas fa-bullseye m-b-5 font-16"></i>
                                <h5 class="m-b-0 m-t-5"><?php echo arUniqueView($conn); ?></h5>
                                <small class="font-light">unique Visits</small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">Top News</h4>
                    <div class="row m-t-20">
                        <div class="col-12">
                            <iframe src="http://us1.rssfeedwidget.com/getrss.php?time=1603044527284&amp;x=<?php arFn($appdboard['rssurl'], 'http%3A%2F%2Fnews.google.com%2Fnews%3Fned%3Dus%26topic%3Dt%26output%3Drss'); ?>&amp;w=100%&amp;h=700&amp;bc=333333&amp;bw=1&amp;bgc=transparent&amp;m=15&amp;it=false&amp;t=(default)&amp;tc=333333&amp;ts=15&amp;tb=transparent&amp;il=true&amp;lc=222222&amp;ls=14&amp;lb=false&amp;id=false&amp;dc=333333&amp;ds=14&amp;idt=true&amp;dtc=284F2D&amp;dts=12" border="0" hspace="0" vspace="0" frameborder="no" marginwidth="0" marginheight="0" style="border:0; padding:0; margin:0; width:100%; height:auto; min-height:188px;" id="rssOutput" class="feed-scbar">Reading RSS Feed ...</iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<?php require_once("footer.php"); ?>