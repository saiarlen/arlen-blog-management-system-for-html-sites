<?php
/*
 * Tags page
 * This page used for managing tags
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "Tags"; //page-title
require_once("header.php");

?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb" style="margin-bottom: 15px;">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tags</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tags</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="container-fluid">
            <div class="card" style="margin-bottom:0">
                <form id="tag_in_form" class="form-horizontal" method="POST">
                    <div class="card-body">
                        <h4 class="card-title">Add New Tag</h4>
                        <div class="form-group row">
                            <label for="tagname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tagname" id="tagname" placeholder="Tag Name Here" required>
                                <span class="f-span-text">The tag name is how it appears on your site. Special
                                    characters not allowed</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button id="tag_submit" type="submit" value="insert" class="btn btn-info">Add New</button>
                            <div id="ar-loader" class="reverse-spinner"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="min-height: 600px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <button type="submit" value='Delete' name='tag_delete' id="tag_delete" class="btn btn-light btn-sm ar-bt-pos">Delete</button>
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="customcheckbox m-b-20">
                                                        <input type="checkbox" id="mainCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Count</strong></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody class="customtable">
                                            <?php
                                            arCountQuery($conn, 'catoff', 'tagon'); //init count of categories in posts 
                                            //Php script for retriving data from database

                                            $tag_query = "SELECT * FROM ar_tags ORDER BY tag_id DESC";
                                            $tag_final_all_data = mysqli_query($conn, $tag_query);

                                            if (mysqli_num_rows($tag_final_all_data) > 0) {
                                                // output data of each row
                                                while ($row = mysqli_fetch_assoc($tag_final_all_data)) {
                                            ?>
                                                    <tr>
                                                        <th>
                                                            <label class="customcheckbox">
                                                                <input type="checkbox" name='delete[]' id="tagdel" value="<?php echo $row["tag_id"]; ?>" class="listCheckbox">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </th>
                                                        <td><?php echo $row["tag_name"]; ?></td>
                                                        <td><?php arCount($tcontary, $row["tag_id"]) ?></td>
                                                        <th><a href="tag-edit.php?type=tag&id=<?php echo $row["tag_id"]; ?>" class="btn btn-dark btn-sm">Edit</a></th>
                                                    </tr>
                                            <?php
                                                }
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Js For the Above form -->
<script>
    //For delete tags data in database
    $(".customtable :checkbox").change(function() {
        $(this).parent().parent().parent().toggleClass('ar_cs_del');
    });
    $("#mainCheckbox:checkbox").change(function() {
        $(".customtable tr").toggleClass('ar_cs_del');
    }); //Functions for toggle classes during checkbox select
</script>

<?php require_once("footer.php"); ?>