<?php
/*
 * All edits page
 * This page used for editing fields
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title= "Edit-" . ucfirst($_GET["type"]); //page-title
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
                        <li class="breadcrumb-item active" aria-current="page">Edit <?php echo ucfirst($_GET["type"]) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- categories edit -->
<!-- ============================================================== -->
<?php
if($_GET["type"] == "category"){

$cat_id = $_GET["id"];
$cat_update_sql = "SELECT * FROM ar_categories WHERE id=" . $cat_id;
$catupdate_result = mysqli_query($conn, $cat_update_sql);

if (mysqli_num_rows($catupdate_result) > 0 && mysqli_num_rows($catupdate_result) <= 1) {
  // output data of each row
  while($cat_update_row = mysqli_fetch_assoc($catupdate_result)) {
    $cat_update_name =  $cat_update_row['cat_name'];
    $cat_update_slug = $cat_update_row['cat_slug'];
    $cat_update_id = $cat_update_row['id'];
  }
} else {
    echo "<script>alert('Selected Category not found! Please try Again.');location.href = 'categories.php';</script>";
}

mysqli_close($conn);

?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="container-fluid">
            <div class="card" style="margin-bottom:0">
                <form id="cat_in_form" class="form-horizontal" method="POST">
                    <div class="card-body">
                        <h4 class="card-title">Edit the Category</h4>
                        <div class="form-group row">
                            <label for="catname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="catname" id="catname" value="<?php echo $cat_update_name ?>" required>
                                <input type="hidden" class="form-control" name="catid" id="catid" value="<?php echo $cat_update_id ?>" required>

                                <span class="f-span-text">The name is how it appears on your site.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="catslgname" class="col-sm-3 text-right control-label col-form-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="catslgname" id="catslgname" value="<?php echo $cat_update_slug ?>" autocomplete="off" required>
                                <span class="f-span-text">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens. it can be same name as category.</span>

                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button id="cat_submit" type="submit" value="cat_update" class="btn btn-info">Update</button>
                            <a href="categories.php" class="btn btn-secondary">Return</a>
                        </div>
                        
                    </div>
                    
                </form>
            </div>
            <div class="alert alert-success alert-dismissible" id="cat_success" style="display:none;"></div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="ar-min-ht"></div>


<script>
$(document).ready(function(){

    //for page reload call
    function catupdateDiv(){ 
        setTimeout(function() {
            location.reload(true);
        }, 1000);
    }

    //For updating categories data to database
    $('#cat_submit').on('click', function(e) {
        e.preventDefault();
        $("#cat_submit").attr("disabled", "disabled");
        var catid = $('#catid').val();
		var catname = $('#catname').val();
		var catslgname = $('#catslgname').val();
        var cat_update = $('#cat_submit').val();
		
		if(catname!="" && catslgname!=""){
			$.ajax({
                type: "POST",
                url:'inc/ajax-handler.php',
				data: {
                    "catid": catid,
                    "cat_update": cat_update,
					"catname": catname,
					"catslgname": catslgname	
                },

				success: function(response){
					
						$("#cat_submit").removeAttr("disabled");
						$('#cat_in_form').find('input:text').val('');
						$("#cat_success").show();
                        $('#cat_success').html(response); 
                        $('#cat_success').fadeOut(3000).delay(1000);
                        catupdateDiv();
                
                },
                cache: false,
            });
             return false;
		}
		else{
            alert('Please Enter Category or Slug Name !');
            $("#cat_submit").removeAttr("disabled");
		}
	});
    // End of Updating data to database

});

</script>
<?php
}else{
    echo "<script>alert('Something Went Wrong! Please try Again.');location.href = 'categories.php';</script>";
}
?>
<!-- ============================================================== -->
<!-- End of categories edit -->
<!-- ============================================================== -->



<?php require_once("footer.php"); ?>