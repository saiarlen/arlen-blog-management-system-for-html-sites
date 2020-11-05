<?php
/*
 * Tag edits page
 * This page used for editing tag page fields
 * @author    Saiarlen
 * @version   1.0.0
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "Edit-" . ucfirst($_GET["type"]); //page-title
require_once("header.php");

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
<!-- tag edit -->
<!-- ============================================================== -->

<?php
if ($_GET["type"] == "tag") :

    $tag_id = $_GET["id"];
    $tag_update_sql = "SELECT * FROM ar_tags WHERE tag_id=" . $tag_id;
    $tagupdate_result = mysqli_query($conn, $tag_update_sql);

    if (mysqli_num_rows($tagupdate_result) > 0 && mysqli_num_rows($tagupdate_result) <= 1) {
        // output data of each row
        while ($tag_update_row = mysqli_fetch_assoc($tagupdate_result)) {
            $tag_update_name =  $tag_update_row['tag_name'];
            $tag_update_id = $tag_update_row['tag_id'];
        }
    } else {
        echo "<script>alert('Selected Tag not found! Please try Again.');location.href = 'tags.php';</script>";
    }
    mysqli_close($conn);

?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="container-fluid">
                <div class="card" style="margin-bottom:0">
                    <form id="tag_in_form" class="form-horizontal" method="POST">
                        <div class="card-body">
                            <h4 class="card-title">Edit the Tag</h4>
                            <div class="form-group row">
                                <label for="tagname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tagname" id="tagname" value="<?php echo $tag_update_name ?>" required>
                                    <input type="hidden" class="form-control" name="tagid" id="tagid" value="<?php echo $tag_update_id ?>" required>

                                    <span class="f-span-text">The name is how it appears on your site. Special characters
                                        not allowed</span>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button id="tagup_submit" type="submit" value="tag_update" class="btn btn-info">Update</button>
                                <a href="tags.php" class="btn btn-secondary">Return</a>
                                <div id="ar-loader" class="reverse-spinner"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="ar-min-ht-tag"></div>

<?php
else :
    echo "<script>alert('Something Went Wrong! Please try Again.');location.href = 'tags.php';</script>";
endif;
?>

<!-- ============================================================== -->
<!-- End of tag edit -->
<!-- ============================================================== -->
<?php require_once("footer.php"); ?>