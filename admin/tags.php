<?php
/*
 * Tags page
 * This page used for managing tags
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title= "Tags"; //page-title
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
            <form id="cat_in_form" class="form-horizontal" method="POST">
                <div class="card-body">
                    <h4 class="card-title">Add New Tag</h4>
                    <div class="form-group row">
                        <label for="catname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="catname" id="catname" placeholder="Category Name Here" required>
                            <span class="f-span-text">The tag name is how it appears on your site.</span>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button id="cat_submit" type="submit" value="insert" class="btn btn-info">Add New</button>
                    </div>
                    
                </div>
                
            </form>
        </div>
        <div class="alert alert-success alert-dismissible" id="cat_success" style="display:none;"></div>
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
                             <button type="submit" value='Delete' name='cat_delete' id="cat_delete" class="btn btn-light btn-sm ar-bt-pos">Delete</button>
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
                               
                                <tbody  class="customtable">
                                 
                                <?php
                                //Php script for retriving data from database
                                
                                    $cat_query = "SELECT * FROM ar_categories ORDER BY id DESC";
                                    $cat_final_all_data = $conn->query($cat_query);

                                    if ($cat_final_all_data->num_rows > 0) {
                                        // output data of each row
                                        while($row = $cat_final_all_data->fetch_assoc()) {
                                        ?>

                                            <tr>
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" name='delete[]' id="catdel" value="<?php echo $row["id"]; ?>" class="listCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td><?php echo $row["cat_name"]; ?></td>
                                                <td>1</td>
                                                <th><a href="edit.php?type=category&id=<?php echo $row["id"]; ?>" class="btn btn-dark btn-sm">Edit</a></th>
                                                
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
$(document).ready(function(){

    //for page reload call
    function catupdateDiv(){ 
        setTimeout(function() {
            location.reload(true);
        }, 1000);
    }

     

    //For Submitting categories data to database
    $('#cat_submit').on('click', function(e) {
        e.preventDefault();
        $("#cat_submit").attr("disabled", "disabled");
		var catname = $('#catname').val();
		var catslgname = $('#catslgname').val();
        var catinsertbtn = $('#cat_submit').val();

		
		if(catname!="" && catslgname!=""){
			$.ajax({
                type: "POST",
                url:'inc/ajax-handler.php',
				data: {
                    "catinsertbtn": catinsertbtn,
					"catname": catname,
					"catslgname": catslgname	
                },

				success: function(response){
					
						$("#cat_submit").removeAttr("disabled");
						$('#cat_in_form').find('input:text').val('');
						$("#cat_success").show();
                        $('#cat_success').html(response); 
                        //$('#cat_success').fadeOut(3000).delay(1000);
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
    // End of submitting data to database


    //For delete categories data in database
    $(".customtable :checkbox").change(function () {
        $(this).parent().parent().parent().toggleClass('ar_cs_del');
     });
     $("#mainCheckbox:checkbox").change(function () {
        $(".customtable tr").toggleClass('ar_cs_del');
     });//Functions for toggle classes during checkbox select

    $('#cat_delete').on('click', function(e) {
        e.preventDefault();
		var catdelbtn = $('#cat_delete').val();
		var catcheckbx = [];
        $("#catdel:checked").each(function(){
            catcheckbx.push(this.value);
        });
            if(catcheckbx.length !== 0){
			$.ajax({
                type: "POST",
                url:'inc/ajax-handler.php',
				data: {
					"catdelbtn": catdelbtn,
					"catcheckbx": catcheckbx	
                },

				success: function(response){
                    //$( "#catdel:checked" ).addClass( "catdelcolor" );
					if(response == "YES"){
                        $( ".ar_cs_del" ).addClass( "catdelcolor" );
                        catupdateDiv();
                    }else{
                        alert(response);
                    }

                },
                cache: false,
            });
             return false;
            }
            else {
                alert("Please select one to delete");
            }
		
		
	});
    //End of delete categories data in database



});

</script>

<?php require_once("footer.php"); ?>